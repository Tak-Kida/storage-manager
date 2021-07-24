<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // 追加
use Illuminate\Support\Facades\DB; // 追加


class UserController extends Controller
{
    public function index() {
        $users = DB::select('select * from users where is_deleted = 0');
        $category_name = config('user_category');
        return view('user.index', ['users' => $users, 'category_name'=>$category_name]);
    }

    public function edit(Request $request) {
        $param = ['id' => $request->id];
        $user = DB::select('select * from users where id = :id', $param);
        return view('user.edit', ['form' => $user[0] ]);
    }

    public function update(Request $request) {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'user_category' => $request->user_category,
            'is_deleted' => $request->is_deleted
        ];
        DB::update('update users set name = :name,
        user_category = :user_category, is_deleted = :is_deleted where id = :id', $param);
        return redirect('/user');
    }

    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $user = DB::select('select * from users where id = :id', $param);
        return view('user.delete', ['form' => $user[0]]);
    }

    public function remove(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'user_category' => $request->user_category,
            'is_deleted' => 1
        ];
        DB::update('update users set name = :name,
        user_category = :user_category, is_deleted = :is_deleted where id = :id', $param);
        return redirect('/user');
    }
}
