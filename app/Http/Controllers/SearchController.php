<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Violation;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function findTeacher(Request $request)
    {
        $data = [];
  
        if($request->filled('q')){
            $data = Teacher::select("name", "id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
    
        return response()->json($data);
    }
    public function findClass(Request $request)
    {
        $data = [];
  
        if($request->filled('q')){
            $data = ClassRoom::select("name", "id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
    
        return response()->json($data);
    }
    public function findViolation(Request $request)
    {
        $data = [];
  
        if($request->filled('q')){
            $data = Violation::select("name", "id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
    
        return response()->json($data);
    }
    public function findStudent(Request $request)
    {
        $data = [];
  
        if($request->filled('q')){
            $data = Student::select("name", "id","class_id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->with(['class' => function($query) {
                            $query->select('id', 'name');
                        }])
                        ->with(['class.teacher' => function($query) {
                            $query->select('id', 'name','class_id');
                        }])
                        ->get();
        }
    
        return response()->json($data);
    }

    public function getDetailS($id = 0)
    {
        $data = Student::with(['class.teacher'])->find($id);
        echo json_encode($data);

        exit;
    }
    public function getDetailV($id = 0)
    {
        $data = Violation::find($id);
        echo json_encode($data);

        exit;
    }
}
