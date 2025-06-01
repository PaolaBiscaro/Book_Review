<?php

namespace App\Services;

use App\Model\Usuario;
use App\Repositories\UsuarioRepository;

class UsuarioService{

    private UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository){

        $this->usuarioRepository = $usuarioRepository;
    }

    public function get(){
        $usuarios = $this->usuarioRepository->get();

        return $usuarios;
    }

    public function store(array $data){
        $usuario = $this->usuarioRepository->store($data);

        return $usuario;
    }

    public function details(int $id){
        $usuario = $this->usuarioRepository->details($id);

        return $usuario;
    }

    public function update(int $id, array $data){
         $usuario = $this->usuarioRepository->update($id, $data);

        return $usuario;
    }

    public function delete(int $id){
        $usuario = $this->usuarioRepository->delete($id);

        return $usuario;
    }
}

