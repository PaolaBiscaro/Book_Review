<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeneroService;
use App\Http\Requests\GeneroUpdateRequest;
use App\Http\Requests\GeneroStoreRequest;
use App\Http\Resources\GeneroResource;
use App\Http\Resources\LivroResource;
use Illuminate\Http\JsonResponse;

class GeneroController extends Controller
{
    private GeneroService $generoService;

    public function __construct(GeneroService $generoService){
        $this->generoService = $generoService;
    }

    public function get(){
        $generos = $this->generoService->get();

        return GeneroResource::collection($generos);
    }

    public function store(GeneroStoreRequest $request){
        $data = $request->validated();
        $genero = $this->generoService->store($data);

        return new GeneroResource($genero);
    }

    public function details(int $id){
        try{
            $genero = $this->generoService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não existe'],404);
        }

        return new GeneroResource($genero);
    }


    public function update(int $id, GeneroUpdateRequest $request){
         $data = $request->validated();
        try{
            $genero = $this->generoService->update($id,$data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }
        return new GeneroResource($genero);
    }

    public function delete($id){
        try{
            $genero = $this->generoService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Genero não encontrado'],404);
        }

        return new GeneroResource($genero);
    }

    //Lista o livro com seu respectivo genero
    public function getComLivros()
    {
        $genero = $this->generoService->getComLivros();
        return GeneroResource::collection($genero);
    }

    //Listar todos os livros de um genero especifico
    public function findLivro(int $id){
        try {
            $livros = $this->generoService->findLivro($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Livro não existe'], 404);
        }
        return LivroResource::collection($livros);
    }
}

