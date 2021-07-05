<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('items.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Item::$rules);
        $item = new Item;
        $form= $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return redirect('/item');
    }
}
