<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Resources\CourseResource;

class CoursesController extends Controller
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
        $curso = new Course();
        $curso->title = $request->title;
        $curso->description = $request->description;
        $curso->weeks = $request->weeks;
        $curso->average_cost = $request->average_cost;
        $curso->minimum_skill = $request->minimum_skill;
        $curso->bootcamp_id = $id;
        $curso->save();
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
        return response()->json(  [ "success" => true ,
                                   "data" => Course::find($id)
                                  ] , 200);
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
        $course = Course::find($id);
        $course->update(
            $request->all()
        );
        return response()->json(["sucess" => true,
                                 "data" => $course
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
            $course = course::find($id);
            $course->delete();

            return response()->json(["success" => true,
                                     "message" => "Curso eliminado",
                                     "data" => $course ], 200);
    }
}
