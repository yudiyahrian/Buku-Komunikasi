@extends('layouts-dashboard.app')

@section('title', 'Report Add')

@section('content')
{{-- Content Start --}}

<form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="relative z-0 mt-10 mb-6 min-w-[30rem] group">
            <select id="findViolation" name="violation_id" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
            </select>
            <label for="findViolation" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform left-0 -translate-y-6 scale-75 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Violation</label>
        </div>
        <div class="relative z-0 mt-10 mb-6 min-w-[30rem] group">
            <select id="findStudent" name="student_id" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
            </select>
            <label for="findStudent" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform left-0 -translate-y-6 scale-75 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Student</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group mt-10">
            <input type="text" id="class" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required disabled
            />
            <label for="class" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Class Name</label>
        </div>
        <div class="relative z-0 mb-6 min-w-[30rem] group mt-10">
            <input type="text" id="teacher" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required disabled/>
            <label for="teacher" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Home Teacher Name</label>
        </div>
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" id="student_point" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required disabled/>
                <label for="student_point" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Student Point</label>
            </div>          
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" id="violation_point" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required disabled/>
                <label for="violation_point" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Violation Point</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" id="total_point" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required disabled/>
                <label for="total_point" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Results</label>
            </div>
        </div>
        <div class="relative z-0 mt-10 mb-6 min-w-[30rem] group">
            <select id="findTeacher" name="teacher_id" class="block py-2.5 px-0 min-w-[30rem] text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
            </select>
            <label for="findTeacher" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform left-0 -translate-y-6 scale-75 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Teacher</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
      </form>
    {{-- content end --}} 
@endsection   

@section('scripts')
<script>
    $(document).ready(function() {
        var pathV = "{{ route('findViolation') }}";
        $('#findViolation').select2({
            placeholder: 'Select an violation',
            ajax: {
                url: pathV,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id,
                        }
                    })
                };
                },
                cache: true
            }
    }); 

        var pathS = "{{ route('findStudent') }}";
        $('#findStudent').select2({
            placeholder: 'Select an student',
            ajax: {
                url: pathS,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id,
                        }
                    })
                };
                },
                cache: true
            }
    }); 

        var  pathDS = "{{ route('getDetailS', ':id') }}";
        $('#findStudent').change(function() {
         var id = $(this).val();
         var point = $('#total_point').val();
         var pointV = $('#violation_point').val();
         var url = pathDS;
         url = url.replace(':id', id);

         $.ajax({
             url: url,
             type: 'get',
             dataType: 'json',
             success: function(response) {
                 if (response != null) {
                     $('#class').val(response.class.name);
                     $('#teacher').val(response.class.teacher.name);
                     $('#student_point').val(response.point)
                     $('#total_point').val(response.point - pointV)
                 }
             }
         });
     });

        var  pathDV = "{{ route('getDetailV', ':id') }}";
        $('#findViolation').change(function() {
         var id = $(this).val();
         var pointS = $('#student_point').val();
         var url = pathDV;
         url = url.replace(':id', id);

         $.ajax({
             url: url,
             type: 'get',
             dataType: 'json',
             success: function(response) {
                 if (response != null) {
                    $('#violation_point').val(response.point)
                    $('#total_point').val(pointS - response.point)
                 }
             }
         });
     });


        var pathT = "{{ route('findTeacher') }}";
        $('#findTeacher').select2({
            placeholder: 'Select an teacher',
            ajax: {
                url: pathT,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id,
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