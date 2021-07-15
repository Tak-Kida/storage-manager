<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ItemController extends Controller
{
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

    // CSVエクスポート
    public function csvExport(Request $request) {
        $post = $request->all();
        // $item = Item::all();
        $response = new StreamedResponse(function () use ($request, $post) {
            $stream = fopen('php://output','w');
            // 文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            $results = Item::all();
            if (empty($results[0])) {
                    fputcsv($stream, [
                        'データが存在しませんでした。',
                    ]);
            } else {
                fputcsv($stream, $this->_csvRowFirst());
                foreach ($results as $row) {
                    fputcsv($stream, $this->_csvRow($row));
                }
            }
            fclose($stream);
        });
        $today = date("Y-m-d");
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('content-disposition', "attachment; filename=[${today}]商品一覧.csv");

        return $response;
    }

    private function _csvRowFirst(){
        return [
            'ID',
            'Name',
            'Price',
            'Left'
        ];
    }

    private function _csvRow($row){
        return [
            'ID' => $row->id,
            'Name' => $row->name,
            'Price' => $row->price,
            'Left' => $row->left_amount
        ];
    }
}
