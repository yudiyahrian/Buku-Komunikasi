@extends('layouts-dashboard.app')

@section('title', 'Violation Trashed')

@section('content')

<div class="mt-10 mb-10">
    <a href="{{ route('violations.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3">Back</a>
</div>

<section class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    No
                </th>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Penalty
                </th>
                <th scope="col" class="py-3 px-6">
                    Point
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($violations as $item)
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                    <p class="whitespace-nowrap">{{ $item->name }}</p>
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                    <p class="whitespace-nowrap">{{ $item->penalty }}</p>
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                    <p class="whitespace-nowrap">{{ $item->point }}</p>
                </th>
                <td class="py-4 px-6">
                    <a href="{{ route('violations.restore', $item->id) }}" onclick="return confirm('Yakin kah bang?')" class="font-medium text-blue-600 hover:underline">Restore</a>
                    <a href="{{ route('violations.forceDelete', $item->id) }}" onclick="return confirm('Yakin kah bang?')" class="font-medium text-blue-600 hover:underline mx-1">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>
{{-- table end --}}
    

@endsection