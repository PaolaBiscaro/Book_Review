<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;
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

        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['senha'] = Hash::make($data['senha']);
        $usuario = $this->usuarioService->store($data);

        return response()->json($usuario);
    }

    public function details(int $id)
    {
        $usuario = $this->usuarioService->details($id);

        return response()->json($usuario);
    }


    public function update(int $id, Request $request)
    {
        $data = $request->all();
        $usuario = $this->usuarioService->update($id, $data);

        return response()->json($usuario);
    }

    public function delete($id)
    {
        $usuario = $this->usuarioService->delete($id);

        return response()->json($usuario);

    }

}
