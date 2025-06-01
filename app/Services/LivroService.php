<?php

namespace App\Services;

use App\Model\Livro;
use App\Repositories\LivroRepository;

class LivroService{

    private LivroRepository $livroRepository;

    public function __construct(LivroRepository $livroRepository){

        $this->livroRepository = $livroRepository;
    }

    public function get(){
        $livros = $this->livroRepository->get();

        return $livros;
    }

    public function store(array $data){
        $livro = $this->livroRepository->store($data);

        return $livro;
    }

    public function details(int $id){
        $livro = $this->livroRepository->details($id);

        return $livro;
    }

    public function update(int $id, array $data){
         $livro = $this->livroRepository->update($id, $data);

        return $livro;
    }

    public function delete(int $id){
        $livro = $this->livroRepository->delete($id);

        return $livro;
    }
}

