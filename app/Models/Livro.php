<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    protected $fillable = ['titulo', 'sinopse', 'autor_id', 'genero_id'];

    #Relação Livro possui um Autor
    public function autor(){
        return $this->belongsTo(
            Autor::class, 'autor_id', 'id'
        );
    }

    #Relação Livro possui um Genero
    public function generos(){
        return $this->belongsTo(
            Genero::class, 'genero_id', 'id'
        );
    }

    #Relação Livro possui varias Reviews
    public function reviews(){
    return $this->hasMany(Review::class, 'livro_id', 'id');
}
}
