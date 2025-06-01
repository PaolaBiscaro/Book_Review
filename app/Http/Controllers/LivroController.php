<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return response()->json($livros);
    }

    public function details($id){
        $livro = $this->livroService->details($id);

        return response()->json($livro);
    }

    public function store(Request $request){
        $data = $request->all();
        $livro = $this->livroService->store($data);

        return response()->json($livro);
    }

    public function update(int $id, Request $request){
        $data = $request->all();
        $livro = $this->livroService->update($id, $data);

        return response()->json($livro);
    }

    public function delete($id){
        $livro = $this->livroService->delete($id);

        return response()->json($id);
    }
}



