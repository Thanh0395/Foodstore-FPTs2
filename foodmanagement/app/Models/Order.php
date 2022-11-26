<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "O_id";
    protected $fillable = [ 
        'status','created_at','U_id'
    ];

    public function users(){
        return $this->belongsTo(Category::class,'U_id','U_id');
    }
    public function order_detail(){
        return $this->hasMany(OrderDetail::class);
    }
}
