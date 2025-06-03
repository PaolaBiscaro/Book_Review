<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'titulo'=> $this->titulo,
            'autor' => new AutorResource($this->whenLoaded('autores')),
            'sinopse'=> $this->sinopse,
            'genero' => new GeneroResource($this->whenLoaded('generos')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),

        ];
    }
}
