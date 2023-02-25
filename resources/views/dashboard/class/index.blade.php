@extends('layouts-dashboard.app')

@section('title', 'Class Home')

@section('content')

<div class="mt-10 mb-5">
    <a href="{{ route('classes.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3"><i class="fa-solid fa-plus"></i>ADD DATA</a>
    <a href="{{ route('classes.trashed') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3">Tempat Sampah</a>
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
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $item)
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                    <p class="whitespace-nowrap">{{ $item->name }}</p>
                </th>
                <td class="flex py-4 px-6">
                    <a href="{{ route('classes.edit', $item->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                    <a href="{{ route('classes.show', $item->id) }}" class="font-medium text-blue-600 hover:underline mx-3">View</a>
                    <form action="{{ route('classes.destroy',$item->id) }}" method="POST"
                        onsubmit="return confirm('Yakin kah bang?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>
{{ $classes->links() }}
{{-- table end --}}
    

@endsection