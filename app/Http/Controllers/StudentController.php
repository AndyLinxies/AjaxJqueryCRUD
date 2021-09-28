<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        return view('pages.studentIndex');
    }

    public function readStudents()
    {
        $students= Student::all();
        //conversion des donnes vers qqch de comprehensible en js
        //on va retourner ce qu'on va prendre au format json. response.students contiendra toutes les données de notre table. voir read .js
        return response()->json([
            'students' => $students,
        ]);
    }
    
    public function store(Request $request )
    {
        //Validations
        $validator=Validator::make( $request->all(),[
            "name"=>"required",
            "email"=>"required|email",
            "course"=>"required",
            "phone"=>"required",
        ]);
        
        //Si tous les inputs n'ont pas été rempli on aura une erreur du type : 422 (Unprocessable Entity).
        //Si on veut un message plus explicite il faut mettre qqch du style
        
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        };

        //Doc: If validation fails during a traditional HTTP request, a redirect response to the previous URL will be generated. If the incoming request is an XHR request, a JSON response containing the validation error messages will be returned.
        //This JSON response will be sent with a 422 HTTP status code.


        $store= new Student;
        $store->name=$request->name;
        $store->email=$request->email;
        $store->course=$request->course;
        $store->phone=$request->phone;
        $store->save();
        //Quand ca reussi on affiche à la console que ca a réussi ex: {status: 200, message: 'Student Added Successfully'}
        return response()->json([
            'status'=>200,
            'message'=>'Student Added Successfully'
        ]);
    }
}
