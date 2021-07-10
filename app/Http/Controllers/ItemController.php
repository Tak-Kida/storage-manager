<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // dev用途
    public function dev(Request $request)
    {
        $user = Auth::user();
        $sort = $request->sort;
        $items = Item::all();
        $param = ['items' => $items, 'sort' => $sort,
            'user' => $user];
        return view('items.dev', $param);
    }

    public function index(Request $request)
    {
        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    public function find(Request $request)
    {
        return view('items.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Item::find($request->input);
        $param = ['input' => $request->input, 'item' => $item];
        return view('items.find', $param);
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

    public function edit(Request $request)
    {
        $item = Item::find($request->id);
        return view('items.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Item::$rules);
        $item = Item::find($request->id);
        $form= $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return redirect('/item');
    }

    public function delete(Request $request)
    {
        $item = Item::find($request->id);
        return view('items.delete', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        Item::find($request->id)->delete();
        return redirect('/item');
    }
}
