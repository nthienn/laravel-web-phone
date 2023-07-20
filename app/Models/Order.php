<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_taikhoan', 'id_seller', 'code_order', 'total', 'note', 'status'
    ];
    protected $primaryKey = 'id_order';
    protected $table = 'tbl_order';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_taikhoan', 'id_order');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
