<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CollectionsController extends Controller
{
    public function index()
    {
        $users = User::all();

        return $users
                ->pluck('name')
                ->except('id', 49)
                ->forget('Bethany Parker')
                ->skip(45);
    }
}
