<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroResource;
use Illuminate\Http\JsonResponse;
use App\Services\LivroService;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\AutorResource;
use App\Http\Resources\GeneroResource;



class LivroController extends Controller
{
    //Injeção de Dependencia
    private LivroService $livroService;

    public function __construct(LivroService $livroService){
         $this->livroService = $livroService;
    }

     public function get(){
        $livros = $this->livroService->get();

        return LivroResource::collection($livros);
    }

    public function details($id){
        try{
            $livro = $this->livroService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Livro não encontrado'],404);
        }
        return new LivroResource($livro);
    }

    public function store(LivroStoreRequest $request){
        $data = $request->validated();
        $livro = $this->livroService->store($data);

        return new LivroResource($livro);
    }

    public function update(int $id, LivroUpdateRequest $request){
        $data = $request->validated();
        try{
            $livro = $this->livroService->update($id,$data);

        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Livro não encontrado'],404);
        }

        return new LivroResource($livro);
    }

    public function delete($id){
        try{
            $livro = $this->livroService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Livro não encontrado'],404);
        }
        return new LivroResource($livro);
    }

    //Retorno dos livros com os autores
    public function getComAutores()
    {
        $livros = $this->livroService->getComAutores();
        return LivroResource::collection($livros);
    }

    //Retorno de um autor de um livro especifico
    public function findAutor(int $id)
    {
        try{
            $autor = $this->livroService->findAutor($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Autor não encontrado'],404);
        }
        return new AutorResource($autor);
    }

    //Buscar livros com os generos
    public function getComGeneros()
    {
        $livros = $this->livroService->getComGeneros();
        return BookResource::collection($livros);
    }

    //Buscar livros de um genero especifico
    public function findGenero(int $id)
    {
        try{
            $genero = $this->livroService->findGenero($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Gênero não encontrado'],404);
        }
        return new GeneroResource($genero);
    }

    public function findReview(int $id)
    {
        try{
            $reviews = $this->livroService->findReview($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Review não  encontrada'],404);
        }
        if ($reviews->isEmpty()) {
            return response()->json(['message' => 'Nenhuma review encontrada'], 204);
        }
        return ReviewResource::collection($reviews);
    }


    public function getComGeneroAutorReview()
    {
        $livros = $this->livroService->getComGeneroAutorReview();
        return LivroResource::collection($livros);
    }



}



