<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:api');
    }

    public function show($id)
    {
        return User::with('comments', 'galleries')->findOrFail($id);
    }

}
