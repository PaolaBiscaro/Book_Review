<?php

namespace App\Repositories;
use App\Models\Genero;

class GeneroRepository{
    public function get(){
        return Genero::all();
    }

    public function store(array $data){
        return Genero::create($data);
    }

    public function details(int $id){
        return Genero::findOrFail($id);
    }

    public function update(int $id, array $data){
        $genero = Genero::find($id);
        $genero->update($data);

        return $genero;
    }

    public function delete(int $id){
        $genero = $this->details($id);
        $genero->delete();

        return $genero;
    }

}
