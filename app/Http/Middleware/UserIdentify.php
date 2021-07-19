<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class UserIdentify
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
        /** @var User $user */
        $user = $request->user();

        if ($user->user_category == 3) {
            abort(403);
        }

        return $next($request);
    }
}
