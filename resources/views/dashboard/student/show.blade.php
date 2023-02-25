@extends('layouts-dashboard.app')

@section('title', 'Student Detail')

@section('content')

<div class="mt-10">
    <a href="{{ route('students.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3 inline-flex items-center float-left"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
</div>

<section class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="px-4 lg:px-0">
        <div class="p-3 bg-white rounded shadow-md w-56">
          <div class="">
            <div class="mb-3 h-56 lg:mb-0">
                <img class="object-cover mx-auto h-full rounded" src="{{$student->getFirstMediaUrl('student')}}" onerror="this.src='https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png'">
            </div>
            <h2 class="text-center text-lg cursor-pointer hover:text-gray-900 ">
                {{ $student->name}}
            </h2>
          </div>
          </div>
        </div>
       </div>
    </div>
    <div class="grid md:grid-cols-4 sm:grid-cols-1 mr-16 mt-28 py-5 h-fit gap-10">
        <div class="text-center">
          <p class="text-sm text-primary">NIS</p>
          <i class="fa-solid fa-hashtag text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary">{{ $student->nis }}</p>
        </div>
        <div class="text-center">
          <p class="text-sm text-primary">Address</p>
          <i class="fa-solid fa-house text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary">{{ $student->address }}</p>
        </div>
        <div class="text-center">
          <p class="text-sm text-primary">Gender</p>
          <i class="fa-solid fa-venus-mars text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary capitalize">{{ $student->gender }}</p>
        </div>
        <div class="text-center">
          <p class="text-sm text-primary">Phone Number</p>
          <i class="fa-solid fa-phone text-primary text-xl py-1"></i>
          <p class="text-sm font-semibold text-primary">{{ $student->no_telp }}</p>
        </div>
        <div class="text-center">
            <p class="text-sm text-primary">Email</p>
            <i class="fa-solid fa-envelope text-primary text-xl py-1"></i>
            <p class="text-sm font-semibold text-primary">{{ $student->email }}</p>
          </div>
        <div class="text-center">
            <p class="text-sm text-primary">Teacher</p>
            <i class="fa-solid fa-chalkboard-user text-primary text-xl py-1"></i>
            @if ($students[0]->class)
                @if ($students[0]->class->teacher)
                    <p class="text-sm font-semibold text-primary">{{ $students[0]->class->teacher->name }}</p>
                @else
                    <p class="text-sm font-semibold text-primary">Doesn't have teacher</p>
                @endif
            @endif
        </div>
        <div class="text-center">
            <p class="text-sm text-primary">Class</p>
            <i class="fa-solid fa-school text-primary text-xl py-1"></i>
            @if ($students[0]->class)
            <p class="text-sm font-semibold text-primary">{{ $students[0]->class->name }}</p>
            @else
            <p class="text-sm font-semibold text-primary">Doesn't have classes</p>
            @endif
        </div>
        <div class="text-center">
            <p class="text-sm text-primary">Point</p>
            <i class="fa-solid fa-star text-primary text-xl py-1"></i>
            <p class="text-sm font-semibold text-primary">{{ $student->point }}</p>
        </div>
        <table class="w-full text-sm text-left text-gray-500 ml-32 mt-7">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                  <th scope="col" class="py-3 px-6">
                      No
                  </th>
                  <th scope="col" class="py-3 px-6">
                      Violation
                  </th>
                  <th scope="col" class="py-3 px-6">
                      Date
                  </th>
                  <th scope="col" class="py-3 px-6">
                      Point
                  </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($students as $item)
                @foreach ($item->reports as $report)
              <tr class="bg-white border-b hover:bg-gray-50">
                  <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                      {{ $loop->iteration }}
                  </th>
                  <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                      <p class="whitespace-nowrap text-ellipsis overflow-hidden w-80">{{ $report->violation->name }}</p>
                  </th>
                  <td class="py-4 px-6 whitespace-nowrap">
                      {{ $report->created_at }}
                  </td>
                  <td class="py-4 px-6">
                      - {{ $report->violation->point }}
                  </td>
              </tr>
                @endforeach
              @endforeach

          </tbody>
      </table>
      </div>
</section>
@endsection