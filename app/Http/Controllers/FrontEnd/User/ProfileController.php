<?php

namespace App\Http\Controllers\FrontEnd\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function account()
    {
        return Inertia::render('User/Profile/Account');
    }

    public function address()
    {
        return Inertia::render('User/Profile/AddressShip');
    }

    public function sell()
    {
        return Inertia::render('User/Maker/MySell');
    }

    public function purchaseOrder()
    {
        return Inertia::render('User/Maker/Purchase');
    }
}
