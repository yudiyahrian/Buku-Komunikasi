@extends('layouts-dashboard.app')

@section('title', 'Home')

@section('content')

    {{-- Content Start --}}

{{-- card start --}}
<section class="flex gap-10" id="home">
    <div class="max-h-[10rem] min-w-[10rem] mt-10 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <a href="{{ Route('students.index') }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center">Students</h5>
        </a>
        <h2 class="mb-3 text-lg font-bold text-gray-700 text-center">{{ $students }}</h2>
        <a href="{{ Route('students.index') }}" class="inline-flex items-center ml-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Visit
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
    <div class="max-h-[10rem] min-w-[10rem] mt-10 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <a href="{{ Route('teachers.index') }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center">Teachers</h5>
        </a>
        <h2 class="mb-3 text-lg font-bold text-gray-700 text-center">{{ $teachers }}</h2>
        <a href="{{ Route('teachers.index') }}" class="inline-flex items-center ml-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Visit
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
    <div class="max-h-[10rem] min-w-[10rem] mt-10 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <a href="{{ Route('classes.index') }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center">Classes</h5>
        </a>
        <h2 class="mb-3 text-lg font-bold text-gray-700 text-center">{{ $classes }}</h2>
        <a href="{{ Route('classes.index') }}" class="inline-flex items-center ml-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Visit
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
    <div class="max-h-[10rem] min-w-[10rem] mt-10 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <a href="{{ Route('reports.index') }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-center">Reports</h5>
        </a>
        <h2 class="mb-3 text-lg font-bold text-gray-700 text-center">{{ $reports }}</h2>
        <a href="{{ Route('reports.index') }}" class="inline-flex items-center ml-5 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Visit
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
    </section>
    {{-- card end --}}

@endsection