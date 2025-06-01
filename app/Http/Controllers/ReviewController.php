<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\ReviewService;


class ReviewController extends Controller
{
    //Injeção de Dependencia
    private ReviewService $reviewService;

    public function __construct(ReviewService $reviewService){
         $this->reviewService = $reviewService;
    }

     public function get(){
        $reviews = $this->reviewService->get();

        return response()->json($reviews);
    }

    public function details($id){
        $review = $this->reviewService->details($id);

        return response()->json($review);
    }

    public function store(Request $request){
        $data = $request->all();
        $review = $this->reviewService->store($data);

        return response()->json($review);
    }

    public function update(int $id, Request $request){
        $data = $request->all();
        $review = $this->reviewService->update($id, $data);

        return response()->json($review);
    }

    public function delete($id){
        $review = $this->reviewService->delete($id);

        return response()->json($id);
    }
}



