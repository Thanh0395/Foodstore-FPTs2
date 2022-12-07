<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $primaryKey = "P_id";
    protected $fillable = [
        'U_id','title','content','feature_image_path','status','created_at'
    ];

    public function users(){
        return $this->belongsTo(User::class,'U_id','U_id');
    }
}
