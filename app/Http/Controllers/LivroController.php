<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroResource;
use Illuminate\Http\JsonResponse;
use App\Services\LivroService;


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
}



