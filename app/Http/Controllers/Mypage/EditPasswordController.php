<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EditPasswordController extends Controller
{
    public function showPasswordForm()
    {
        return view('mypage.password');
    }

    public function update(PasswordRequest $request)
    {
        $params = $request->only(['current_password', 'new_password', 'new_password_confirmation']);
        $user = Auth::user();
        $user->password = Hash::make($params['new_password']);
        $user->save();
        return redirect('mypage');
    }
}
