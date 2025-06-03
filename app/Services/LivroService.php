<?php

namespace App\Services;

use App\Model\Livro;
use App\Repositories\LivroRepository;
use App\Http\Resources\LivroResource;


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
    public function getComAutores()
    {
        return $this->livroRepository->getComAutores();
    }

    public function findAutor(int $id)
    {
        return $this->livroRepository->findAutor($id);
    }

    //Para os generos de livros
    public function getComGeneros()
    {
        return $this->livroRepository->getComGeneros();
    }

    public function findGenero(int $id)
    {
        return $this->livroRepository->findGenero($id);
    }

      public function findReview(int $id)
    {
        return $this->livroRepository->findReview($id);
    }

    public function getComGeneroAutorReview()
    {
        return $this->livroRepository->getComGeneroAutorReview();
    }

}

