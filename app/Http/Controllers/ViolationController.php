<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $violations = Violation::with('reports')->paginate(5);
        return view('dashboard.violation.index', compact('violations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.violation.create');
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
            'penalty' => 'required',
            'point' => 'required',
        ]);
  
        $input = $request->all();

        Violation::create($input);
     
        return redirect()->route('violations.index')
                        ->with('success','violation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function show(Violation $violation)
    {
        $violations = Violation::with(['reports.students'])->where('id', $violation->id)->get();
        $reports = count($violations[0]->reports);
        $student = $violations[0]->reports;
        return view('dashboard.violation.show', compact('violation','violations', 'reports','student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function edit(Violation $violation)
    {
        return view('dashboard.violation.edit', compact('violation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Violation $violation)
    {
        $request->validate([
            'name' => 'required',
            'penalty' => 'required',
            'point' => 'required',
        ]);

        $input = $request->all();
        $violation->update($input);
    
        return redirect()->route('violations.index')
                        ->with('success','violation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Violation $violation)
    {
        $violation->delete();
     
        return redirect()->route('violations.index')
                        ->with('success','violation deleted successfully');
    }

    
    public function trashed()
    {
    	$violations = Violation::onlyTrashed()->get();
    	return view('dashboard.violation.trashed', compact('violations'));
    }

    public function restore($id)
    {
        $violation = Violation::onlyTrashed()->findOrFail($id);

    	$violation->restore();
    	return redirect()->route('violations.trashed')
                         ->with('success','violation restored successfully');
    }

    public function forceDelete($id)
    {
        $violation = Violation::onlyTrashed()->findOrFail($id);

    	$violation->forceDelete();
    	return redirect()->route('violations.trashed')
                         ->with('success','violation deleted permanently successfully');
    }
}
