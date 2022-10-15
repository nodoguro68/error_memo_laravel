<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Mail\EditEmailMail;
use App\Models\EmailReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditEmailController extends Controller
{
    public function showEditEmailForm()
    {
        return view('mypage.email');
    }

    public function send(EmailRequest $request, EmailReset $email_reset)
    {
        $params = $request->only('email');
        $params['user_id'] = Auth::id();
        $params['token'] = hash_hmac(
            'sha256',
            Str::random(40) . $params['email'],
            config('app.key')
        );

        $email_reset->fill($params)->save();

        $to = [
            [
                'email' => $params['email'],
                'name' => Auth::user()->name,
            ]
        ];

        Mail::to($to)->send(new EditEmailMail($params['token']));
        return redirect('mypage/email');
    }

    public function reset($token)
    {
        $email_reset = EmailReset::where('token', $token)->first();

        if($email_reset && !$this->tokenExpired($email_reset->created_at)) {

            DB::beginTransaction();

            try {
                $user = User::find($email_reset->user_id);
                $user->email = $email_reset->email;
                $user->save();
    
                $email_reset->delete();
    
                DB::commit();
    
                return redirect('mypage');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        } else {

            if($email_reset) {
                $email_reset->delete();
            }
        }
    }

    public function tokenExpired($created_at)
    {
        $expires = 60 * 60;
        return Carbon::parse($created_at)->addSeconds($expires)->isPast();
    }
}
