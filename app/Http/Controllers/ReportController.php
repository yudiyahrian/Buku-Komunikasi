<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;

use App\Models\Violation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::with(['students.class.teacher','violation'])->paginate(5);
        return view('dashboard.report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_id = $request->student_id;
        $violation_id = $request->violation_id;
        $data = $request->all();
        $check = $this->make($data);
        $student = Student::findOrFail($student_id);
        $violation = Violation::findOrFail($violation_id);
        $pointS = $student->point;
        $pointV = $violation->point;
        $pointS-=$pointV;
        if ($check) {
            $student->reports()->attach($check->id);
            $student->update([
                'point'=>$pointS
            ]);
        }

        return redirect()->route('reports.index')
        ->with('success','report created successfully');
    }

    public function make(array $data)
    {
        return Report::create([
            'violation_id' => $data['violation_id'],
            'teacher_id' => $data['teacher_id'],
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
     
        return redirect()->route('reports.index')
                        ->with('success','report deleted successfully');
    }

    public function trashed()
    {
    	$reports = Report::onlyTrashed()->with(['students.class.teacher','violation'])->paginate(5);
    	return view('dashboard.report.trashed', compact('reports'));
    }

    public function restore($id)
    {
        $reports = Report::onlyTrashed()->findOrFail($id);

    	$reports->restore();
    	return redirect()->route('reports.trashed')
                         ->with('success','report restored successfully');
    }

    public function forceDelete($id)
    {
        $reports = Report::with('students')->onlyTrashed()->findOrFail($id);
        $student = Student::findOrFail($reports->students[0]->id);
        $student->reports()->detach($reports->id);
    	$reports->forceDelete();
    	return redirect()->route('reports.trashed')
        ->with('success','report deleted permanently successfully');
    }
}
