<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'role_id',
    ];

    // Definir o atributo 'password' para 'senha'
    public function getAuthPassword()
    {
        return $this->senha;
    }

    // Definir o campo 'remember_token', se estiver usando
    protected $rememberTokenName = 'remember_token';

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
