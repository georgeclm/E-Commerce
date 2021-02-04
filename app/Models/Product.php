<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //protected $fillable = ["name", "user_id", "price", "category", "description", "gallery"];
    protected $guarded = [];
    public $table = "products";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
