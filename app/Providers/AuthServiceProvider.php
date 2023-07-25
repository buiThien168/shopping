<?php

namespace App\Providers;

use App\Models\Product;
use App\Services\PermissionGateAndPolicyAccess as ServicesPermissionGateAndPolicyAccess;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        //category
        $PermissionGateAndPolicyAccess = new ServicesPermissionGateAndPolicyAccess();
        $PermissionGateAndPolicyAccess->setGateAndPolicy();

        // kiểm tra user tạo ra sản phẩm đấy mới dc edit
        // Gate::define('product-edit', function ($user, $id) {
        //     $product = Product::find($id);
        //     if ($user->checkPermissionAccess(config('permissions.access.product-edit')) && $user->id === $product->user_id) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // });
        //edit
        // Gate::define('category-edit', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.category-edit'));
        // });
    }
}
