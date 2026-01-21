<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function showCurrentStock()
    {
        return view('admin.inventory.currentstock');
    }

    public function showProducts(){
        return view('admin.inventory.products');
    }
}
