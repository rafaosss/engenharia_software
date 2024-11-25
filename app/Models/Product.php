<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'descricao', 'preco', 'categoria_id', 'nivel_estoque', 'nivel_reposicao'
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
}

