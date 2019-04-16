<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\Http\Controllers\Controller;
use App\Shop\Permissions\Repositories\PermissionRepository;
use App\Http\Traits\EcommTrait;

class PermissionController extends Controller
{
    use EcommTrait;
    /**
     * @var PermissionRepository
     */
    private $permRepo;

    /**
     * PermissionController constructor.
     *
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permRepo = $permissionRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->ebrandsAll();
        $list = $this->permRepo->listPermissions();

        $permissions = $this->permRepo->paginateArrayResults($list->all());

        return view('admin.permissions.list', compact('permissions', 'data'));
    }
}
