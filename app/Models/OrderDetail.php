<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_order', 'id_sanpham', 'price', 'quantity'
    ];
    protected $primaryKey = 'id_order_detail';
    protected $table = 'tbl_order_detail';

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'id_order', 'id_order_detail');
    }
}
