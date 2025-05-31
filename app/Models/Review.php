<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['nota', 'texto', 'livro_id', 'usuario_id'];

    #Relação Review possui um livro
    public function livro() {
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }

    #Relação Review possui um Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

}
