<?php

namespace App\Providers;

use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Carts\ShoppingCart;
use App\Shop\Categories\Category;
use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Employees\Employee;
use App\Shop\Employees\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

/**
 * Class GlobalTemplateServiceProvider
 * @package App\Providers
 * @codeCoverageIgnore
 */
class GlobalTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'layoutsecom.admin.app',
            'layoutsecom.front.mythemeapp',
            'layoutsecom.admin.sidebar',
            'admin.shared.products'
        ], function ($view) {
            $view->with('admin', Auth::guard('employee')->user());
        });

        view()->composer(['layoutsecom.front.menu', 
            'layoutsecom.front.mythemeapp', 'front.categories.sidebar-category'], function ($view) {
            $view->with('categories', $this->getCategories());
            $view->with('cartCount', $this->getCartCount());
        });

        view()->composer(['layoutsecom.front.app',
            'layoutsecom.front.mythemeapp', 'front.categories.sidebar-category'], function ($view) {
            $view->with('categories', $this->getCategories());
            $view->with('cartCount', $this->getCartCount());
        });

        /**
         * breadcumb
         */
        view()->composer([
            "layoutsecom.admin.app","layoutsecom.front.mythemeapp"
        ], function ($view) {
            $breadcumb = [
                ["name" => "Dashboard", "url" => route("admin.dashboard"), "icon" => "fa fa-dashboard"],
            ];
            $paths = request()->segments();
            if (count($paths) > 1) {
                foreach ($paths as $key => $pah) {
                    if ($key == 1)
                        $breadcumb[] = ["name" => ucfirst($pah), "url" => request()->getBaseUrl() . "/" . $paths[0] . "/" . $paths[$key], 'icon' => config("module.admin." . $pah . ".icon")];
                    elseif ($key == 2)
                        $breadcumb[] = ["name" => ucfirst($pah), "url" => request()->getBaseUrl() . "/" . $paths[0] . "/" . $paths[1] . "/" . $paths[$key], 'icon' => config("module.admin." . $pah . ".icon")];
                }
            }
            $view->with(
                [
                    "breadcumbs" => $breadcumb
                ]
            );
        });


        view()->composer(['layoutsecom.front.category-nav'], function ($view) {
            $view->with('categories', $this->getCategories());
        });
    }

    /**
     * Get all the categories
     *
     */
    private function getCategories()
    {
        $categoryRepo = new CategoryRepository(new Category);
        return $categoryRepo->listCategories('name', 'asc', 1)->whereIn('parent_id', [1]);
    }

    /**
     * @return int
     */
    private function getCartCount()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        return $cartRepo->countItems();
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    private function isAdmin(Employee $employee)
    {
        $employeeRepo = new EmployeeRepository($employee);
        return $employeeRepo->hasRole('admin');
    }
}
