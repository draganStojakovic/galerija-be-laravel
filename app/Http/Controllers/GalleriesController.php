<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use App\Models\User;

class GalleriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show', 'showUserGallery']]);
    }

    public function index()
    {
        return Gallery::with('user')->orderBy('created_at', 'desc')->paginate(10);
    }

    public function show($id)
    {
        return Gallery::with('comments', 'user')->findOrFail($id);
    }

    public function showUserGallery($id)
    {
        return Gallery::where("user_id", $id)->orderBy("created_at", "desc")->paginate(10);
    }

    public function store(GalleryRequest $request)
    {
        return Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'user_id' => auth()->id(),
        ]);
    }

    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return $gallery;
    }

    public function destroy($id)
    {
        Gallery::destroy($id);
    }

    public function searchGalleries($term)
    {
        return Gallery::search($term);
    }

    public function searchUserGalleries()
    {
        $term = request()->input('term');
        $userId = request()->input('user_id');
        $page = request()->input('page');
        if ($page) {
            return Gallery::searchUserGalleries($term, $userId, $page);
        } else {
            return Gallery::searchUserGalleries($term, $userId);
        }
    }

}
