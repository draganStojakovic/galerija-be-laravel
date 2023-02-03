<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Gallery;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'showSpecificGalleryComments']]);
    }

    public function index()
    {
        return Comment::orderBy('created_at', 'desc')->get();
    }

    public function show($id)
    {
        return Comment::with('user', 'gallery')->findOrFail($id);
    }

    public function showSpecificGalleryComments($id)
    {   
        return Comment::where('gallery_id', $id)->orderBy("created_at", "desc")->get();
    }

    public function store(CommentRequest $request, $id)
    {
        return Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'gallery_id' => $id,
        ]);
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return $comment;
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        Comment::destroy($id);
        return $comment;
    }
}
