@extends('layouts-dashboard.app')

@section('title', 'Violation Edit')

@section('content')
{{-- Content Start --}}

<form action="{{ route('violations.update', $violation->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="relative z-0 mb-6 min-w-[30rem] group mt-10">
            <input type="text" name="name" id="name" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $violation->name }}" required />
            <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Violation Name</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group mt-10">
            <input type="text" name="penalty" id="penalty" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $violation->penalty }}" required />
            <label for="penalty" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Penalty</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group mt-10">
            <input type="text" name="point" id="point" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $violation->point }}" required />
            <label for="point" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Point</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
      </form>
    {{-- content end --}} 
@endsection   
