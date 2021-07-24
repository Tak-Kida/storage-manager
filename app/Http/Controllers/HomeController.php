<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $order_unconfirm = Order::where('order_status', '1')->get();
        $order_undone = Order::where('order_status', '2')->get();
        $order_unreceive = Order::where('order_status', '3')->get();
        $param = ['user' => $user, 'order_unconfirm'=>$order_unconfirm, 'order_undone'=>$order_undone, 'order_unreceive'=>$order_unreceive];
        return view('home', $param);
    }
}
