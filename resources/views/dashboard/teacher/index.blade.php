@extends('layouts-dashboard.app')

@section('title', 'Teacher Home')

@section('content')

<div class="mt-10 mb-5">
    <a href="{{ route('teachers.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3"><i class="fa-solid fa-plus"></i>ADD DATA</a>
    <a href="{{ route('teachers.trashed') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 -mb-3">Tempat Sampah</a>
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
                    NIP
                </th>
                <th scope="col" class="py-3 px-6">
                    Gender
                </th>
                <th scope="col" class="py-3 px-6">
                    Class
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $item)
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900">
                    <p class="whitespace-nowrap text-ellipsis overflow-hidden w-56">{{ $item->name }}</p>
                </th>
                <td class="py-4 px-6">
                    {{ $item->nip }}
                </td>
                <td class="py-4 px-6">
                    {{ $item->gender }}
                </td>
                <td class="py-4 px-6">
                    @if ($item->class)
                        {{ $item->class->name }}
                    @else
                        Doesn't have classes
                    @endif
                </td>
                <td class="py-4 px-6">
                    <a href="{{ route('teachers.edit', $item->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                    <a href="{{ route('teachers.show', $item->id) }}" class="font-medium text-blue-600 hover:underline mx-1">view</a>
                    <form action="{{ route('teachers.destroy',$item->id) }}" method="POST"
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
{{ $teachers->links() }}
{{-- table end --}}
    

@endsection