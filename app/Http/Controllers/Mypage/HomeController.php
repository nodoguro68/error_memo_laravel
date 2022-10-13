<?php

namespace App\Http\Controllers\Mypage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $folders = Auth::user()->folders()->with('memos')->get();
        $memos = Auth::user()->memos()->latest()->get();
        $unsolved_memos = Auth::user()->memos()->where(['is_solved' => 0])->latest()->get();
        $solved_memos = Auth::user()->memos()->where(['is_solved' => 1])->latest()->get();
        $publish_memos = Auth::user()->memos()->where(['is_published' => 1])->latest()->get();
        return view('mypage.home', compact('folders', 'memos', 'unsolved_memos', 'solved_memos', 'publish_memos'));
    }
}
