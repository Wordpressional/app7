<?php

Use App\User;
use App\Shop\Employees\Employee;
use App\Shop\Permissions\Permission;
use App\Shop\Roles\Repositories\RoleRepository;
use App\Shop\Roles\Role;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        $createProductPerm = factory(Permission::class)->create([
            'name' => 'ecom_create-product',
            'display_name' => 'Create product'
        ]);

        $viewProductPerm = factory(Permission::class)->create([
            'name' => 'ecom_view-product',
            'display_name' => 'View product'
        ]);

        $updateProductPerm = factory(Permission::class)->create([
            'name' => 'ecom_update-product',
            'display_name' => 'Update product'
        ]);

        $deleteProductPerm = factory(Permission::class)->create([
            'name' => 'ecom_delete-product',
            'display_name' => 'Delete product'
        ]);

        $updateOrderPerm = factory(Permission::class)->create([
            'name' => 'ecom_update-order',
            'display_name' => 'Update order'
        ]);

        $employee = factory(Employee::class)->create([
            'email' => 'john@doe.com'
        ]);

        $employee = factory(User::class)->create([
            'email' => 'john@doe.com'
        ]);

        $super = factory(Role::class)->create([
            'name' => 'ecom_superadmin',
            'display_name' => 'Super Admin'
        ]);

        $roleSuperRepo = new RoleRepository($super);
        $roleSuperRepo->attachToPermission($createProductPerm);
        $roleSuperRepo->attachToPermission($viewProductPerm);
        $roleSuperRepo->attachToPermission($updateProductPerm);
        $roleSuperRepo->attachToPermission($deleteProductPerm);
        $roleSuperRepo->attachToPermission($updateOrderPerm);

        $employee->roles()->save($super);

        $employee = factory(Employee::class)->create([
            'email' => 'admin@doe.com'
        ]);
        $employee = factory(User::class)->create([
            'email' => 'admin@doe.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'ecom_admin',
            'display_name' => 'Admin'
        ]);

        $roleAdminRepo = new RoleRepository($admin);
        $roleAdminRepo->attachToPermission($createProductPerm);
        $roleAdminRepo->attachToPermission($viewProductPerm);
        $roleAdminRepo->attachToPermission($updateProductPerm);
        $roleAdminRepo->attachToPermission($deleteProductPerm);
        $roleAdminRepo->attachToPermission($updateOrderPerm);

        $employee->roles()->save($admin);

        $employee = factory(Employee::class)->create([
            'email' => 'clerk@doe.com'
        ]);

        $employee = factory(User::class)->create([
            'email' => 'clerk@doe.com'
        ]);

        $clerk = factory(Role::class)->create([
            'name' => 'ecom_clerk',
            'display_name' => 'Clerk'
        ]);

        $roleClerkRepo = new RoleRepository($clerk);
        $roleClerkRepo->attachToPermission($createProductPerm);
        $roleClerkRepo->attachToPermission($viewProductPerm);
        $roleClerkRepo->attachToPermission($updateProductPerm);

        $employee->roles()->save($clerk);


       
        $employee = factory(User::class)->create([
            'email' => 'cmssuperadmin@cms.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'cms_superadministrator',
            'display_name' => 'CMS Superadministrator'
        ]);

        $employee->roles()->save($admin);

        $employee = factory(User::class)->create([
            'email' => 'cmsadmin@cms.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'cms_administrator',
            'display_name' => 'CMS Administrator'
        ]);

        $employee->roles()->save($admin);


        $employee = factory(User::class)->create([
            'email' => 'cmseditor@cms.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'cms_editor',
            'display_name' => 'CMS Editor'
        ]);

        $employee->roles()->save($admin);

        $employee = factory(User::class)->create([
            'email' => 'cmsauthor@cms.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'cms_author',
            'display_name' => 'CMS Author'
        ]);

        $employee->roles()->save($admin);

        $employee = factory(User::class)->create([
            'email' => 'cmssubscriber@cms.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'cms_subscriber',
            'display_name' => 'CMS Subscriber'
        ]);

        $employee->roles()->save($admin);
    }
}
