@extends('layouts-dashboard.app')

@section('title', 'Student Edit')

@section('content')
{{-- Content Start --}}

<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="relative z-0 mb-6 min-w-[30rem] group mt-5">
            <input type="text" name="name" id="name" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $student->name }}" placeholder=" " required />
            <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Student Name</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group">
            <input type="number" name="nis" id="nis" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $student->nis }}" placeholder=" " required />
            <label for="nis" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIS</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group">
            <input type="text" name="address" id="address" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $student->address }}" placeholder=" " required />
            <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group">
            <input type="tel" name="no_telp" id="no_telp" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $student->no_telp }}" placeholder=" " required />
            <label for="no_telp" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone Number</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group">
            <select id="gender" name="gender" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                <option value="{{ $student->gender }}" selected>{{ $student->gender }}</option>
                    @if($student->gender == 'Male')
                        <option value="Female">Female</option>
                    @else
                        <option value="Male">Male</option>
                    @endif
            </select>
            <label for="gender" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Gender</label>
        </div>
        <div class="relative z-0 my-10 min-w-[30rem] group">
            <select id="findClass" name="class_id" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                
                @if($student->class)
                    <option value="{{ $student->class->id }}" selected>{{ $student->class->name }}</option>
                @else
                    <option selected value=""></option>
                @endif
            </select>
            <label for="findClass" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform left-0 -translate-y-6 scale-75 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Class</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $student->email }}" placeholder=" "/>
            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group">
            <input type="password" name="password" id="password" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $student->password}}" placeholder=" "/>
            <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group">
            <input type="file" name="image" id="image" class="block py-2.5 px-0 max-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
            <label for="image" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-0 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
      </form>
    {{-- content end --}} 
@endsection   

@section('scripts')
<script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="image"]');
    
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
        server:{
            process: '/upload_tmp',
            revert: '/delete_tmp',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            }
        });

        
        $(document).ready(function() {
            var path = "{{ route('findClass') }}";
            $('#findClass').select2({
            placeholder: 'Select an Class',
            ajax: {
                url: path,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
                },
                cache: true
            }
    }); 
});
</script>
@endsection