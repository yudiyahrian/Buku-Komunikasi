@extends('layouts-dashboard.app')

@section('title', 'Teacher Detail')

@section('content')

<div class="mt-10">
    <a href="{{ route('teachers.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3 inline-flex items-center float-left"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
</div>

<section class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="px-4 lg:px-0">
        <div class="p-3 bg-white rounded shadow-md w-56">
          <div class="">
            <div class="mb-3 h-56 lg:mb-0">
                <img class="object-cover mx-auto h-full rounded" src="{{$teacher->getFirstMediaUrl('teacher')}}" onerror="this.src ='https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png'">
            </div>
            <h2 class="text-center text-lg cursor-pointer hover:text-gray-900 ">
                {{ $teacher->name}}
            </h2>
          </div>
          </div>
        </div>
       </div>
    </div>
    <div class="grid md:grid-cols-4 sm:grid-cols-1 mr-16 mt-28 py-5 h-fit gap-10">
        <div class="text-center">
          <p class="text-sm text-primary">NIP</p>
          <i class="fa-solid fa-hashtag text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary">{{ $teacher->nip }}</p>
        </div>
        <div class="text-center">
          <p class="text-sm text-primary">Address</p>
          <i class="fa-solid fa-house text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary">{{ $teacher->address }}</p>
        </div>
        <div class="text-center">
          <p class="text-sm text-primary">Gender</p>
          <i class="fa-solid fa-venus-mars text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary capitalize">{{ $teacher->gender }}</p>
        </div>
        <div class="text-center">
          <p class="text-sm text-primary">Phone Number</p>
          <i class="fa-solid fa-phone text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary">{{ $teacher->no_telp }}</p>
        </div>
        <div class="text-center">
            <p class="text-sm text-primary">Email</p>
            <i class="fa-solid fa-envelope text-primary text-xl py-1"></i>
            <p class="text-sm font-semibold text-primary">{{ $teacher->email }}</p>
          </div>
        <div class="text-center">
            <p class="text-sm text-primary">Students</p>
            <i class="fa-solid fa-users text-primary text-xl py-1"></i>
            @if ($teachers[0]->class)
            @foreach($teachers as $data)
              @foreach($data->class->students as $key)
                <p class="text-sm font-semibold text-primary">{{ $key->name }}</p>
              @endforeach
            @endforeach
            @else
              <p class="text-sm font-semibold text-primary">Doesn't have students</p>
            @endif
        </div>
        <div class="text-center">
            <p class="text-sm text-primary">Class</p>
            <i class="fa-solid fa-school text-primary text-xl py-1"></i>
            @if ($teachers[0]->class)
              <p class="text-sm font-semibold text-primary">{{ $teachers[0]->class->name }}</p>
            @else
              <p class="text-sm font-semibold text-primary">Doesn't have classes</p>
            @endif
        </div>
      </div>
</section>
{{-- table end --}}

@endsection