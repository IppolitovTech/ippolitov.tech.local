<?php

namespace App\Http\Controllers;

class AdminAccessController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
}
