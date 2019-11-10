<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveOrdersController extends Controller
{
    public function get_index(){
        return view('pages.orders.live');
    }
}
