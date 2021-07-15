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
        $status_name = config('order_status');
        return view('order.index', ['orders' => $orders])->with(['status_name' => $status_name]);;
    }

    public function add(Request $request)
    {
        $items = Item::all();
        $user = Auth::user();
        $param = ['items' => $items, 'user' => $user];
        return view('order.add', $param);
    }

    public function add_confirm(Request $request)
    {
        $item = Item::find($request->item_id);
        $user = Auth::user();
        $quantity = $request->item_amount;
        $unit_price = $item->price;
        $tax = 0.1;
        $total_price = ($unit_price * $quantity) * ($tax + 1) ;
        $param = ['item' => $item, 'user' => $user, 'request' => $request,
            'quantity' => $quantity, 'total_price' => $total_price];
        return view('order.add_confirm', $param);
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

    // public function check(Request $request)
    // {
    //     $items = Item::all();
    //     $user = Auth::user();
    //     $param = ['items' => $items, 'user' => $user];
    //     return view('order.check', $param);
    // }

    // public function checking(Request $request)
    // {
    //     $item = Item::find($request->item_id);
    //     $storage = $item->left_amount;
    //     $quantity = $request->item_amount;
    //     if($quantity <= $storage) {
    //         $result = $storage - $quantity;
    //     };
    //     $param = ['item' => $item, 'storage' => $storage, 'quantity' =>$quantity, 'result'=> $result];
    //     return view('order.result', $param);
    // }

    public function advance(Request $request)
    {
        $order = Order::find($request->id);
        $order->order_status ++;
        $order->save();
        return redirect('/order');
    }

    public function edit(Request $request)
    {
        $order = Order::find($request->id);
        $items = Item::all();
        $status_name = config('order_status');
        $param = ['order' => $order, 'items' => $items];
        return view('order.edit', $param)->with(['status_name' => $status_name]);
    }

    public function edit_confirm(Request $request)
    {
        $item = Item::find($request->item_id);
        $user = Auth::user();
        $order = $item = Item::find($request->id);
        $quantity = $request->item_amount;
        $unit_price = $item->price;
        $tax = 0.1;
        $total_price = ($unit_price * $quantity) * ($tax + 1) ;
        $order_status = $request->order_status;
        $status_name = config('order_status');
        $param = ['item' => $item, 'user' => $user, 'order' => $order, 'request' => $request,
            'quantity' => $quantity, 'total_price' => $total_price, 'order_status' => $order_status];
        return view('order.edit_confirm', $param)->with(['status_name' => $status_name]);
    }

    public function update(Request $request)
    {
        // itemの在庫量の調整
        $item = Item::find($request->item_id);  // 発注のあったitemの特定する
        $order = Order::find($request->id);
        $storage = $item->left_amount;  // itemのもともとの在庫量を取得する
        $pre_order_quantity = $order->item_amount;
        $quantity = $request->item_amount;  // 発注量を取得する
        if($quantity <= $storage) {  // 発注量と在庫量の比較
            $result = $storage - ($quantity - $pre_order_quantity);
        };
        $item->left_amount = $result; // 新しい在庫量を格納する
        $item->save();  // 商品の在庫量を更新する

        // orderの更新
        $this->validate($request, Order::$rules);
        $form= $request->all();
        unset($form['_token']);
        $order->fill($form)->save();
        return redirect('/order');
    }

    public function delete(Request $request)
    {
        // 在庫量の調整
        $item = Item::find($request->item_id);
        $order = Order::find($request->id);
        $storage = $item->left_amount;
        $pre_order_quantity = $order->item_amount;
        $result = $storage + $pre_order_quantity;
        $item->left_amount = $result;
        $item->save();

        // orderの発注量とorder_statusを変更する
        $order = Order::find($request->id);
        $order->order_status = 0;
        $order->item_amount = 0;
        $order->save();
        return redirect('/order');
    }
}
