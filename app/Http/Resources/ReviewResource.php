<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nota'=> $this->nota,
            'texto'=> $this->texto,
            'usuario_id'=> $this->usuario_id,
            'livro_id'=> $this->livro_id
        ];
    }
}
