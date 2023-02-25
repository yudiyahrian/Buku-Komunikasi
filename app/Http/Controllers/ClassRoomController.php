<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Class_;
use Illuminate\Support\Facades\Schema;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassRoom::with(['teacher','students'])->paginate(5);
        return view('dashboard.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.class.create');
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
            'name' => ['required','unique:class'],
        ]);
  
        $input = $request->all();

        ClassRoom::create($input);
     
        return redirect()->route('classes.index')
                        ->with('success','class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classes = ClassRoom::with(['students','teacher'])->findOrFail($id);
        $data = $classes->students;
        return view('dashboard.class.show',compact('classes','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = ClassRoom::findOrFail($id);
        return view('dashboard.class.edit',compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','unique:class'],
        ]);

        $classes = ClassRoom::findOrFail($id);
  
        $input = $request->all();
        $classes->update($input);
     
        return redirect()->route('classes.index')
                        ->with('success','class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classes = ClassRoom::findOrFail($id);
        $classes->delete();
     
        return redirect()->route('classes.index')
                        ->with('success','class deleted successfully');
    }

    
    public function trashed()
    {
    	$classes = ClassRoom::onlyTrashed()->get();
    	return view('dashboard.class.trashed', compact('classes'));
    }

    public function restore($id)
    {
        $classes = ClassRoom::onlyTrashed()->findOrFail($id);

    	$classes->restore();
    	return redirect()->route('classes.trashed')
                         ->with('success','class restored successfully');
    }

    public function forceDelete($id)
    {
        
        $classes = ClassRoom::onlyTrashed()->findOrFail($id);
        Schema::disableForeignKeyConstraints();
    	$classes->forceDelete();
        Schema::enableForeignKeyConstraints();
    	return redirect()->route('classes.trashed')
                         ->with('success','class deleted permanently successfully');
    }
}
