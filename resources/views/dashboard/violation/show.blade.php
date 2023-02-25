@extends('layouts-dashboard.app')

@section('title', 'Violation Detail')

@section('content')

<div class="mt-10">
    <a href="{{ route('violations.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3 inline-flex items-center float-left"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
</div>

<h1 class="text-center text-xl">Violation Name : {{ $violation->name }}</h1>
<section class="overflow-x-auto relative shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
              <th scope="col" class="py-3 px-6">
                  Penalty
              </th>
              <th scope="col" class="py-3 px-6">
                  Point
              </th>
              <th scope="col" class="py-3 px-6">
                  Total Reports
              </th>
              <th scope="col" class="py-3 px-6">
                  Student
              </th>
          </tr>
      </thead>
      <tbody>
          <tr class="bg-white border-b hover:bg-gray-50">
              <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                  <p class="whitespace-nowrap">{{ $violation->penalty }}</p>
              </th>
              <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                  <p class="whitespace-nowrap">{{ $violation->point }}</p>
              </th>
              <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                  <p class="whitespace-nowrap">{{ $reports }}</p>
              </th>
              <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                @foreach ($student as $item)
                    @foreach($item->students as $value)
                        <p class="whitespace-nowrap">- {{ $value->name }}</p>
                    @endforeach
                @endforeach
              </th>
          </tr>
      </tbody>
  </table>

</section>
{{-- table end --}}

@endsection