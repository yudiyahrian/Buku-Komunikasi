<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['class.teacher'])->paginate(5);
        return view('dashboard.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = ClassRoom::all();
        return view('dashboard.student.create',compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'class_id' => 'required',
        ]);
  
        $input = $request->all();
        $upload = Student::create($input);

        $tmp_image = TemporaryImage::where('folder', $request->image)->first();

        if ($tmp_image) {
            $upload->addMedia(storage_path('app/images/tmp/' . $request->image . '/' . $tmp_image->file_name))
                   ->toMediaCollection('student');
            rmdir(storage_path('app/images/tmp/' . $request->image));
            $tmp_image->delete();
        }
    
     
        return redirect()->route('students.index')
                        ->with('success','student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $students = Student::with(['class.teacher', 'reports.violation'])->where('id', $student->id)->get();
        return view('dashboard.student.show',compact('students', 'student'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $class = ClassRoom::all();
        return view('dashboard.student.edit',compact(['class','student']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'class_id' => 'required',
        ]);
  
        $input = $request->all();
        $student->update($input);

        $tmp_image = TemporaryImage::where('folder', $request->image)->first();

        if ($tmp_image) {
            $student->clearMediaCollection('student');
            $student->addMedia(storage_path('app/images/tmp/' . $request->image . '/' . $tmp_image->file_name))
            ->toMediaCollection('student');
            rmdir(storage_path('app/images/tmp/' . $request->image));
            $tmp_image->delete();
        }
    
        return redirect()->route('students.index')
                        ->with('success','student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        if($file = $student->getMedia('student')->first()){
        $file->move($student, 'trash');
        }
     
        return redirect()->route('students.index')
                        ->with('success','student deleted successfully');
    }

    public function trashed()
    {
    	$students = Student::onlyTrashed()->get();
    	return view('dashboard.student.trashed', compact('students'));
    }

    public function restore($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);

        if($file = $student->getMedia('trash')->first()){
        $file->move($student, 'student');
        }
    	$student->restore();
    	return redirect()->route('students.trashed')
                         ->with('success','student restored successfully');
    }

    public function forceDelete($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);

        $student->reports()->detach();

        if($student->getMedia('trash')){
        $student->clearMediaCollection('trash');
        }
    	$student->forceDelete();
    	return redirect()->route('students.trashed')
                         ->with('success','student deleted permanently successfully');
    }
}
