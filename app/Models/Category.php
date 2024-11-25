<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    public function products()
    {
        return $this->hasMany(Product::class, 'categoria_id');
    }
}

