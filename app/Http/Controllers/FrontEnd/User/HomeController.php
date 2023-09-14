<?php

namespace App\Http\Controllers\FrontEnd\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        return Inertia::render('User/Home');
    }

    public function product()
    {
        return Inertia::render('User/Product');
    }

    public function category()
    {
        return Inertia::render('User/Category');
    }
    
    public function search()
    {
        return Inertia::render('User/Search');
    }

    public function flashSale()
    {
        return Inertia::render('User/FlashSale');
    }

    public function cart()
    {
        return Inertia::render('User/Cart');
    }

    public function payment()
    {
        return Inertia::render('User/Payment/Pay');
    }
}
