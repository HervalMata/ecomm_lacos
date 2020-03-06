<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.admin_login');
    }
}
