<?php

namespace App\Repositories;
use App\Models\Usuario;

class UsuarioRepository{
    public function get(){
        return Usuario::all();
        // return Usuario::select('id', 'nome', 'email',  'created_at', 'updated_at')->get();
    }

    public function details(int $id){
        return Usuario::findOrFail($id);
        // return Usuario::find($id, ['id', 'nome', 'email', 'created_at', 'updated_at']); //Seleciona apenas os campos que precisa retornar
    }

    public function store(array $data){
        return Usuario::create($data);
    }

    public function update(int $id, array $data){
        $usuario = Usuario::find($id);
        $usuario->update($data);

        return $usuario;
    }

    public function delete(int $id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return $usuario;
    }

    public function findReview(int $id)
    {
        $usuario = $this->details($id);
        $reviews = $usuario->reviews;
        return $reviews;
    }
}
