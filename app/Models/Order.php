<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'item_id' => 'filled',
        'item_amount' => 'filled',
        'order_total_price' => 'filled',
        'user_id' => 'filled',
        'order_status' => 'filled', 'max:4'
    );

    public function getData()
    {
        return $this ->name;
    }

    public function getStatusName() {
        return config('order_status.' . $this->order_status);
    }

    public function item()
    {
        return $this ->belongsTo('App\Models\Item');
    }

    public function user()
    {
        return $this ->belongsTo('App\Models\User');
    }
}
