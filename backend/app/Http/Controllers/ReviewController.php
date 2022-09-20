<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Resources\ReviewResource;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json((Course::all())
        , 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       /* var_dump($request->all());
        echo "<hr />";
        var_dump($id);
        */

        //Izquierda: base de datos - Derecha: Postman
        $review = new Review();
        $review->id = $request->id;
        $review->text = $request->text;
        $review->rating = $request->rating;
        $review->bootcamp_id = $request->bootcamp_id;
        $review->user_id = $request->user_id;
        $review->save();
        //Enviar response
        return response()->json([
            "success" => true,
            "data" => $curso
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        $review->update(
            $request->all()
        );
        return response()->json(["sucess" => true,
                                 "data" => $review
                                ] , 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $review = review::find($id);
        $review->delete();

        return response()->json(["success" => true,
                                 "message" => "Review eliminado",
                                 "data" => $review ], 200);
}
}
