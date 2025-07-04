<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable = ['nome', 'dt_nasc', 'biografia'];

    #Relação Autor possui varios livros
    public function livros()
    {
        return $this->hasMany(Livro::class, 'autor_id', 'id');
    }
}
