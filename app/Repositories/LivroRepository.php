<?php

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{
    public function get()
    {
        return Livro::all();
    }

    public function details(int $id)
    {
        return Livro::findOrFail($id);
    }

    public function store(array $data)
    {
        return Livro::create($data);
    }

    public function update(int $id, array $data)
    {
        $livro = Livro::find($id);
        $livro->update($data);

        return $livro;
    }

    public function delete(int $id)
    {
        $livro = $this->details($id);
        $livro->delete();

        return $livro;
    }

    public function getComAutores()
    {
        $livros = Livro::with('autor')->get();
        return $livros;
    }

    public function findAutor(int $id)
    {
        $livro = $this->details($id);
        $autor = $livro->autor;
        return $autor;
    }

    public function getComGeneros()
    {
        $livros = Livro::with('generos')->get();
        return $livros;

    }
    public function findGenero(int $id)
    {
        $livro = $this->details($id);
        $genero = $livro->genero;
        return $genero;
    }

    public function findReview(int $id)
    {
        $livro = $this->details($id);
        $reviews = $livro->reviews;
        return $reviews;
    }

    public function getComGeneroAutorReview()
    {
        return Livro::with(['generos', 'autor', 'reviews'])->get();
    }
}
