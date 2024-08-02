<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $currentUser = null;
        if (auth('user')->check()) {
            $user = auth('user')->user();
            $profile = $user->profile;

            $currentUser = [
                'id' => $user->id,
                'fullname' => $profile->fullname,
                'image_url' => $profile->image_url,
            ];
        }

        return array_merge(parent::share($request), [
            'product_cart' => [
                [
                    'route' => route('product', 1),
                    'product_name' => 'Điện thoại máy tính xách tay',
                    'image' => '/images/devices/phone/dienthoai-1.webp',
                    'price' => 200000,
                    'quantity' => 5
                ]
            ],
            'auth' => [
                'user' => $currentUser,
            ],
        ]);
    }
}
