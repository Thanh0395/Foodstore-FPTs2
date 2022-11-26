<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = "rating";
    protected $primaryKey = "R_id";
    protected $fillable = [
        'U_id','F_id','rating','comment'
    ];

    public function users(){
        return $this->belongsTo(User::class,'U_id','U_id');
    }
    public function foods(){
        return $this->belongsTo(Food::class,'F_id','F_id');
    }
}
