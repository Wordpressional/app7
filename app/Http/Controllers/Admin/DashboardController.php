<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\EcommTrait;

class DashboardController extends Controller
{
	use EcommTrait;
    public function index()
    {
        $breadcumb = [
            ["name" => "Dashboard", "url" => route("admin.dashboard"), "icon" => "fa fa-dashboard"],
            ["name" => "Home", "url" => route("admin.dashboard"), "icon" => "fa fa-home"],

        ];

        populate_breadcumb($breadcumb);
        $data = $this->ebrandsAll();
        return view('admin.dashboard', ['data' => $data]);
    }
}
