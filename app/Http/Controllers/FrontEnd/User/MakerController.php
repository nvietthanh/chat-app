<?php

namespace App\Http\Controllers\FrontEnd\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MakerController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Maker');
    }
}
