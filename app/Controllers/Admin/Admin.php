<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'first_title' => 'Admin', 
            'second_title' => 'Dashboard'
        ];

        return view('admin/index', $data);
    }
}