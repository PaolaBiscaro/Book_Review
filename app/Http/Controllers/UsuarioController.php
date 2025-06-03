<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\Http\Resources\UsuarioResource;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Resources\ReviewResource;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    private UsuarioService $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }


    public function get()
    {
        $usuarios = $this->usuarioService->get();

        return UsuarioResource::collection($usuarios);
    }

    public function store(UsuarioStoreRequest $request)
    {
        $data = $request->validated();
        $data['senha'] = Hash::make($data['senha']);
        $usuario = $this->usuarioService->store($data);

        return new UsuarioResource($usuario);
    }

    public function details(int $id)
    {
        try{
            $usuario = $this->usuarioService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Usuario não encontrado'],404);
        }

        return new UsuarioResource($usuario);
    }


    public function update(int $id, UsuarioUpdateRequest $request)
    {
        $data = $request->validated();
        try{
            $usuario = $this->usuarioService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Usuario não encontrado'],404);
        }

        return new UsuarioResource($usuario);
    }

    public function delete($id)
    {
        try{
            $usuario = $this->usuarioService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Usuario não encontrado'],404);
        }
        return new UsuarioResource($usuario);
    }

    public function findReview(int $id)
    {
        try{
            $reviews = $this->usuarioService->findReview($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Review não encontrada'],404);
        }
        if ($reviews->isEmpty()) {
            return response()->json(['message' => 'Nenhuma review encontrada'], 204);
        }

        return ReviewResource::collection($reviews);
    }


}
