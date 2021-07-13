<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }

    public function add(Request $request)
    {
        $items = Item::all();
        $user = Auth::user();
        $param = ['items' => $items, 'user' => $user];
        return view('order.add', $param);
    }

    public function create(Request $request)
    {
        // 在庫量の調整
        $item = Item::find($request->item_id);  // 発注のあったitemの特定する
        $storage = $item->left_amount;  // itemのもともとの在庫量を取得する
        $quantity = $request->item_amount;  // 発注量を取得する
        if($quantity <= $storage) {  // 発注量と在庫量の比較
            $result = $storage - $quantity;
        };
        $item->left_amount = $result; // 新しい在庫量を格納する
        $item->save();  // 商品の在庫量を更新する

        // 注文の登録
        $this->validate($request, Order::$rules);
        $order = new Order;
        $form= $request->all();
        unset($form['_token']);
        $order->fill($form)->save();
        return redirect('/order');
    }

    public function check(Request $request)
    {
        $items = Item::all();
        $user = Auth::user();
        $param = ['items' => $items, 'user' => $user];
        return view('order.check', $param);
    }

    public function checking(Request $request)
    {
        $item = Item::find($request->item_id);
        $storage = $item->left_amount;
        $quantity = $request->item_amount;
        if($quantity <= $storage) {
            $result = $storage - $quantity;
        };
        $param = ['item' => $item, 'storage' => $storage, 'quantity' =>$quantity, 'result'=> $result];
        return view('order.result', $param);
    }
}
