<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FolderRequest;
use App\Models\Folder;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Auth::user()->folders()->with('memos')->get();
        $memos = Auth::user()->memos()->latest()->get();
        $unsolved_memos = Auth::user()->memos()->where(['is_solved' => 0])->latest()->get();
        $solved_memos = Auth::user()->memos()->where(['is_solved' => 1])->latest()->get();
        $publish_memos = Auth::user()->memos()->where(['is_published' => 1])->latest()->get();
        return view('folders.index', compact('folders', 'memos', 'unsolved_memos', 'solved_memos', 'publish_memos'));
    }

    public function show($id)
    {
        $auth_id = Auth::id();
        $folder = Folder::where(['id' => $id, 'user_id' => $auth_id])->first();
        $memos = Memo::where(['user_id' => $auth_id, 'folder_id' => $id])->get();
        return view('folders.show', compact('folder', 'memos'));
    }

    public function store(FolderRequest $request, Folder $folder)
    {
        $params = $request->only(['folder']);

        $folder->user_id = Auth::id();
        $folder->name = $params['folder'];
        $folder->save();

        return redirect('folder');
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        $folder = Folder::find($id);
        $folder->delete();
        return redirect('folder');
    }
}
