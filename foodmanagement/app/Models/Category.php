<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "Cate_id";
    protected $fillable = [
        'Cate_name'
    ];

    public function foods(){
        return $this->hasMany(Food::class);
    }
}
