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
        $folders = Auth::user()->folders()->get();
        return view('folders.index', compact('folders'));
    }

    public function show($id)
    {
        $auth_id = Auth::id();
        $folder = Folder::where(['id' => $id, 'user_id' => $auth_id])->first();
        $memos = Memo::where(['user_id' => $auth_id, 'folder_id' => $id])->get();
        // dd($memos);
        return view('folders.show', compact('folder', 'memos'));
    }

    public function store(FolderRequest $request, Folder $folder)
    {
        $params = $request->only(['folder']);

        $folder->user_id = Auth::id();
        $folder->name = $params['folder'];
        $folder->save();

        return redirect('folder/index');
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}
