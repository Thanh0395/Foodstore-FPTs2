<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = "wishlist";
    protected $primaryKey = "WL_id";
    protected $fillable = [
        'U_id','F_id','like'
    ];

    public function users(){
        return $this->belongsTo(User::class,'U_id','U_id');
    }
    public function foods(){
        return $this->belongsTo(Food::class,'F_id','F_id');
    }
}
