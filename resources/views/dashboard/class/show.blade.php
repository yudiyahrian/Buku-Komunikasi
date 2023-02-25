@extends('layouts-dashboard.app')

@section('title', 'Class Detail')

@section('content')

<div class="mt-10">
    <a href="{{ route('classes.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3 inline-flex items-center float-left"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
</div>

<section class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <h1 class="text-center text-xl">Class Name : {{ $classes->name }}</h1>
    <div class="grid md:grid-cols-2 sm:grid-cols-1 mx-auto mt-28 py-5 h-fit gap-10">
        <div class="text-center">
          <p class="text-sm text-primary">Teacher</p>
          <i class="fa-solid fa-chalkboard-user text-primary text-xl py-1"></i>
          @if ($classes->teacher)
            <p class="text-sm font-semibold text-primary">{{ $classes->teacher->name }}</p>
          @else
            <p class="text-sm font-semibold text-primary">Doesn't have teacher</p>
          @endif
        </div>
        <div class="text-center">
          <p class="text-sm text-primary">Students</p>
          <i class="fa-solid fa-users text-primary text-xl py-1"></i>
          @foreach ($data as $key)
          <p class="text-sm font-semibold text-primary">{{ $key->name }}</p>
          @endforeach
        </div>
      </div>
</section>
{{-- table end --}}

@endsection