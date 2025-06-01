<?php

namespace App\Repositories;
use App\Models\Autor;

class AutorRepository{
    public function get(){
        return Autor::all();
    }

    public function store(array $data){
        return Autor::create($data);
    }

    public function details(int $id){
        return Autor::find($id);
    }

    public function update(int $id, array $data){
        $autor = Autor::find($id);
        $autor->update($data);

        return $autor;
    }

    public function delete(int $id){
        $autor = $this->details($id);
        $autor->delete();

        return $autor;
    }

}
