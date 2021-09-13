@extends('layouts.theam')

@section('title')
Add Application
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12">
        <div class="card">
                <div class="card-header">{{ __('Add Application') }}</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form method="POST" action="{{ route('Application.store') }}">
                        @csrf
                        <div class="row">
                            @include('application._application_form')
                            <div class="col-md-12 text-center">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <a href="{{route('Application.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                                
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $("#country").change(function(){
        $('#University option[value!="0"]').remove();
        let URL="{{ url('api/admin/getUniversityFromCountry/') }}/"+$(this).val();
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {   // success callback function
                    console.log(data);
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#University')
                            .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.name));
                    });
				},
				error: function (jqXhr, textStatus, errorMessage) { // error callback
					$('p').append('Error: ' + errorMessage);
				}
			});
    });
    $("#University").change(function(){
        $('#course_id option[value!="0"]').remove();
        let URL="{{ url('api/admin/getCourseFromUniversity/') }}/"+$(this).val();
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {   // success callback function
                    console.log(data);
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#course_id')
                            .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.name));
                    });
				},
				error: function (jqXhr, textStatus, errorMessage) { // error callback
					$('p').append('Error: ' + errorMessage);
				}
			});
    });
</script>

@endsection
