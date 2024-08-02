<?php

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if (!function_exists('get_file_url')) {
    /**
     * Convert file url by file path
     *
     * @param string $filePath
     * @return string|null
     */
    function get_file_url($filePath): ?string
    {
        if ($filePath && !parse_url($filePath, PHP_URL_SCHEME)) {
            return Storage::url($filePath);
        }

        return $filePath;
    }
}

if (!function_exists('get_file_private_url')) {
    /**
     * Convert file url by file path
     *
     * @param string $filePath
     * @param int $timePublic
     * @return string|null
     */
    function get_file_private_url($filePath, $timePublic = 30): ?string
    {
        if ($filePath && !parse_url($filePath, PHP_URL_SCHEME)) {
            return Storage::temporaryUrl($filePath, now()->addSeconds($timePublic));
        }

        return $filePath;
    }
}

if (!function_exists('format_date')) {
    /**
     * Formats a date string into the 'Y/m/d' format.
     *
     * @param string $date
     * @return string
     */
    function format_date($date): string
    {
        return Carbon::parse($date)->format('Y/m/d');
    }
}

if (!function_exists('format_datetime')) {
    /**
     * Formats a datetime string into the specified format.
     *
     * @param mixed $datetime
     * @return string
     */
    function format_datetime($datetime): string
    {
        return Carbon::parse($datetime)->format('Y/m/d H:i');
    }
}

if (!function_exists('format_date_time_utc')) {
    /**
     * Formats a given date and time in UTC format.
     *
     * @param mixed $time
     * @return string|null
     */
    function format_date_time_utc($time)
    {
        if (!$time) {
            return null;
        }

        return Carbon::parse($time)->timezone('UTC')->format('Y-m-d\TH:i:s.u\Z');
    }
}

if (!function_exists('get_current_user_login')) {
    /**
     * Retrieves the currently logged in user.
     *
     * @return mixed
     */
    function get_current_user_login()
    {
        if (auth()->check()) {
            return auth()->user();
        }

        if (auth('user')->check()) {
            return auth('user')->user();
        }

        if (auth('admin')->check()) {
            return auth('admin')->user();
        }

        return null;
    }
}

if (!function_exists('get_basic_user_info')) {
    /**
     * Retrieves basic user information.
     *
     * @param mixed $user The user object.
     * @return array Returns an array containing the user's ID, name, role, and avatar.
     */
    function get_basic_user_info($user): array
    {
        return [
            'id' => $user?->id,
            'nickname' => get_user_name($user),
            'avatar' => get_user_avatar($user),
        ];
    }
}

if (!function_exists('get_user_name')) {
    /**
     * Get the name of the user.
     *
     * @param mixed $user
     * @return string|null
     */
    function get_user_name($user): ?string
    {
        if (!$user || $user->status != 1) {
            return __('Deleted User');
        }

        return $user?->nickname ?? null;
    }
}

if (!function_exists('get_user_avatar')) {
    /**
     * Get the avatar of the user.
     *
     * @param User $user
     * @param mixed $user
     * @return string|null
     */
    function get_user_avatar($user): ?string
    {
        $defaultAvatar = env('APP_URL') . '/images/default-avatar.png';

        if ($user && $user->status == 1 && $user?->avatars && count($user?->avatars) > 0) {
            return get_file_url($user->getAvatar()->thumbnail_url ?? $user->getAvatar()->icon_url);
        }

        return $defaultAvatar;
    }
}

if (!function_exists('get_basic_product_info')) {
    /**
     * Get the data of product
     *
     * @param mixed $product
     * @return array
     */
    function get_basic_product_info($product): array
    {
        $productImage = $product->images()->first();

        return [
            'id' => $product->id,
            'code' => $product->code,
            'name' => $product->name,
            'price' => $product->price,
            'image_url' => $productImage->thumbnail_image_url,
        ];
    }
}
