<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Gallery;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return Comment::orderBy('created_at', 'desc')->get();
    }

    public function show($id)
    {
        return Comment::with('user', 'gallery')->findOrFail($id);
    }

    public function store(CommentRequest $request, $id)
    {
        $validated = $request->validated();
        $gallery = Gallery::findOrFail($id);
        $gallery->createComment($validated['content']);
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return $comment;
    }

    public function destroy($id)
    {
        Comment::destroy($id);
    }
}
