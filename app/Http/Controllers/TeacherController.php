<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Models\TemporaryImage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with(['class'])->paginate(5);
        return view('dashboard.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = ClassRoom::with('teacher')->get();
        return view('dashboard.teacher.create',compact('class'));
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
            'nip' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
        ]);
  
        $input = $request->all();
        $upload = Teacher::create($input);

        $tmp_image = TemporaryImage::where('folder', $request->image)->first();

        if ($tmp_image) {
            $upload->addMedia(storage_path('app/images/tmp/' . $request->image . '/' . $tmp_image->file_name))
                   ->toMediaCollection('teacher');
            rmdir(storage_path('app/images/tmp/' . $request->image));
            $tmp_image->delete();
        }
    
     
        return redirect()->route('teachers.index')
                        ->with('success','teacher created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $teachers = Teacher::with(['class.students'])->where('id', $teacher->id)->get();
        // $student = $teachers[0]->class->students;
        return view('dashboard.teacher.show',compact('teachers', 'teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $class = ClassRoom::with('teacher')->get();
        return view('dashboard.teacher.edit',compact('class', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'no_telp' => 'required',
            'class_id' => 'required',
        ]);
  
        $input = $request->all();
        $teacher->update($input);

        $tmp_image = TemporaryImage::where('folder', $request->image)->first();

        if ($tmp_image) {
            $teacher->clearMediaCollection('teacher');
            $teacher->addMedia(storage_path('app/images/tmp/' . $request->image . '/' . $tmp_image->file_name))
            ->toMediaCollection('teacher');
            rmdir(storage_path('app/images/tmp/' . $request->image));
            $tmp_image->delete();
        }
    
        return redirect()->route('teachers.index')
                        ->with('success','teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        if($file = $teacher->getMedia('teacher')->first()){
        $file->move($teacher, 'trash');
        }
     
        return redirect()->route('teachers.index')
                        ->with('success','teacher deleted successfully');
    }

    
    public function trashed()
    {
    	$teachers = Teacher::onlyTrashed()->get();
    	return view('dashboard.teacher.trashed', compact('teachers'));
    }

    public function restore($id)
    {
        $teacher = Teacher::onlyTrashed()->findOrFail($id);

        if($file = $teacher->getMedia('trash')->first()){
        $file->move($teacher, 'teacher');
        }
    	$teacher->restore();
    	return redirect()->route('teachers.trashed')
                         ->with('success','teacher restored successfully');
    }

    public function forceDelete($id)
    {
        $teacher = Teacher::onlyTrashed()->findOrFail($id);

        if($teacher->getMedia('trash')){
        $teacher->clearMediaCollection('trash');
        }
    	$teacher->forceDelete();
    	return redirect()->route('teachers.trashed')
                         ->with('success','teacher deleted permanently successfully');
    }
}
