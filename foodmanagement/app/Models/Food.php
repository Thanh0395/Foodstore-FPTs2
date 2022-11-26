<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = "foods";
    protected $primaryKey = "F_id";
    protected $fillable = [
        'F_name','Cate_id','Cate_name','image','price','description'
    ];

    public function categories(){
        return $this->belongsTo(Category::class,'Cate_id','Cate_id');
    }
}
