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
        return User::with('galleries')->findOrFail($id);
    }

    public function showOnlyUser($id)
    {
        return User::findOrFail($id);
    }
}
