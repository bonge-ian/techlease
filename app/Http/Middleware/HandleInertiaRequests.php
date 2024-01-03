<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Middleware;
use Laravel\Fortify\Features;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'config' => config()->get(['app.name']),
            'auth' => [
                'user' => $request->user(),
            ],
            'features' => collect(value: config(key: 'fortify.features'))
                ->mapWithKeys(callback: static fn ($key): array => [$key => true])
                ->merge(items: [
                    'security' => Features::hasSecurityFeatures(),
                ]),
            'status' => session(key: 'status'),
            'toast' => session(key: 'toast'),
            'ziggy' => [
                'current_route_name' => Route::currentRouteName(),
            ],
        ]);
    }
}
