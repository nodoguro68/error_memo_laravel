<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Memo;
use App\Models\Category;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::where(['is_published' => 1])->latest()->paginate(2);
        return view('memos.index', compact('memos'));
    }

    public function show($id)
    {
        $folders = Auth::user()->folders()->with('memos')->get();
        $memos = Auth::user()->memos()->latest()->get();
        $unsolved_memos = Auth::user()->memos()->where(['is_solved' => 0])->latest()->get();
        $solved_memos = Auth::user()->memos()->where(['is_solved' => 1])->latest()->get();
        $publish_memos = Auth::user()->memos()->where(['is_published' => 1])->latest()->get();
        $memo = Memo::where(['id' => $id, 'user_id' => Auth::id()])->first();
        if (!$memo) {
            abort(404);
        }
        return view('memos.show', compact('folders', 'memos', 'unsolved_memos', 'solved_memos', 'publish_memos', 'memo'));
    }

    public function create()
    {
        $categories = Category::all();
        $folders = Auth::user()->folders()->get();
        return view('memos.create', compact('categories', 'folders'));
    }

    public function store(MemoRequest $request, Memo $memo)
    {
        $params = $request->only(['category_id', 'folder_id', 'is_solved', 'is_published', 'title', 'content', 'attempt', 'solution', 'cause', 'reference']);

        $memo->user_id = Auth::id();
        $memo->fill($params)->save();

        return redirect('mypage');
    }

    public function edit($id)
    {
        $auth_id = Auth::id();
        $categories = Category::all();
        $folders = Auth::user()->folders()->get();
        $memo = Memo::where(['id' => $id, 'user_id' => $auth_id])->first();
        if (!$memo) {
            abort(404);
        }
        if ($memo->user_id !== $auth_id){
            abort(403);
        }
        return view('memos.edit', compact('categories', 'folders', 'memo'));
    }
    
    public function update($id, MemoRequest $request, Memo $memo)
    {
        $auth_id = Auth::id();
        $params = $request->only(['category_id', 'folder_id', 'is_solved', 'is_published', 'title', 'content', 'attempt', 'solution', 'cause', 'reference']);
        $memo = Memo::where(['id' => $id, 'user_id' => $auth_id])->first();
        if (!$memo) {
            abort(404);
        }
        if ($memo->user_id !== $auth_id) {
            abort(403);
        }
        $memo->fill($params)->save();
        return redirect('mypage');
    }

    public function delete($id)
    {
        $auth_id = Auth::id();
        $memo = Memo::find($id);
        if (!$memo) {
            abort(404);
        }
        if ($memo->user_id !== $auth_id) {
            abort(403);
        }
        $memo->delete();
        return redirect('mypage');
    }

    public function search(SearchRequest $request)
    {
        $params = $request->only(['keyword']);
        $keyword = $params['keyword'];
        $memos = Memo::where('title', 'like', "%$keyword%")->where('is_published', 1)->latest()->paginate(10);
        return view('memos.index', compact('memos'));
    }

    public function like()
    {
        
    }
    
    public function unlike()
    {
        
    }
}
