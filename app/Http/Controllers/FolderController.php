<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Http\Requests\FolderRequest;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Auth::user()->folders()->get();
        return view('folders.index', compact('folders'));
    }

    public function show()
    {
        
    }

    public function store(FolderRequest $request, Folder $folder)
    {
        $params = $request->only(['folder']);

        $folder->user_id = Auth::id();
        $folder->name = $params['folder'];
        $folder->save();

        return redirect('folders');
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}
