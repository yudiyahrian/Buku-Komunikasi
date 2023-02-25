<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $students = count(Student::all());
        $teachers = count(Teacher::all());
        $classes = count(ClassRoom::all());
        $reports = count(Report::all());

        return view('dashboard.index', compact('students', 'teachers', 'classes', 'reports'));
    }
}
