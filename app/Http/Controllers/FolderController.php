<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FolderRequest;
use App\Models\Folder;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function store(FolderRequest $request, Folder $folder)
    {
        $params = $request->only(['folder']);

        $folder->user_id = Auth::id();
        $folder->name = $params['folder'];
        $folder->save();

        return redirect('mypage');
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        $folder = Folder::find($id);
        $folder->delete();
        return redirect('mypage');
    }
}
