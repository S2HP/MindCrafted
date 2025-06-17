<?php

namespace App\Http;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Middleware\TrustProxies;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Middleware\EnsureUserHasRole;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     */
    protected function middleware(): array
    {
        return [
            TrustProxies::class,
            HandleCors::class,
            PreventRequestsDuringMaintenance::class,
            ValidatePostSize::class,
            TrimStrings::class,
            ConvertEmptyStringsToNull::class,
        ];
    }

    /**
     * Middleware groups for web and api.
     */
    protected function middlewareGroups(): array
    {
        return [
            'web' => [
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                SubstituteBindings::class,
                \App\Http\Middleware\VerifyCsrfToken::class,
            ],

            'api' => [
                // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                ThrottleRequests::class . ':api',
                SubstituteBindings::class,
            ],
        ];
    }

    
    protected function middlewareAliases(): array
    {
        return [
            // auth & verification
            'auth'     => \App\Http\Middleware\Authenticate::class,
            'guest'    => RedirectIfAuthenticated::class,
            'verified' => EnsureEmailIsVerified::class,

            // throttling
            'throttle' => ThrottleRequests::class,

            // custom role middleware
            'role'     => EnsureUserHasRole::class,
        ];
    }
}
