<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('User/Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $user = User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            unset($data['email'],  $data['password']);

            $user->profile()->create($data);
    
            Auth::guard('user')->login($user);

            DB::commit();
            return redirect(RouteServiceProvider::USER_HOME);
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
