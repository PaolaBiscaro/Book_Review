<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable = ['nome', 'dt_nasc', 'biografia'];

    #Relação Autor-Livro
    public function livros()
    {
        return $this->hasMany(Livro::class, 'livro_id', 'id');
    }
}
