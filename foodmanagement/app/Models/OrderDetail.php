<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    protected $primaryKey = "OD_id";
    protected $fillable = [
        'O_id','F_id','quantity'
    ];

    public function orders(){
        return $this->belongsTo(Order::class,'O_id','O_id');
    }
    public function foods(){
        return $this->belongsTo(Food::class,'F_id','F_id');
    }
}
