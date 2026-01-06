<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwofactorController extends Controller
{
    public function showTwofactor()
    {
        return view('admin.2fa');
    }
}
