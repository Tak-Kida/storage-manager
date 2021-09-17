<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'price' => 'filled',
        'left_amount' => 'filled'
    );

    public function getData()
    {
        return $this ->name;
    }
}
