@extends('layouts.theam')

@section('title')
Enquiries
@endsection

@section('js')
<script>
    $("#country").change(function(){
        $('#state option[value!="0"]').remove();
        $(this).val();
        let URL="{{ url('api/admin/getState/') }}/"+$(this).val();
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {   // success callback function
                    console.log(data);
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#state')
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

    $("#state").change(function(){
        $('#city option[value!="0"]').remove();
        $(this).val();
        let URL="{{ url('api/admin/getCity/') }}/"+$(this).val();
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {   // success callback function
                    console.log(data);
                    $.each(data, function(key, value) {
                        console.log(value);
                        $('#city')
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

<script>
   $("#generate_otp").click(function(){
        $('.error_message').html("");
        var email=$("#email").val();
        if(email==""){
            $('.error_message').html("Please enter email id");
        }else{
            let URL="{{ url('api/admin/otp_send/') }}/"+email;
            $.ajax(URL,
                {
                    dataType: 'json', // type of response data
                    success: function (data,status,xhr) {   // success callback function
                        console.log(data);
                    },
                    error: function (jqXhr, textStatus, errorMessage) { // error callback
                        $('p').append('Error: ' + errorMessage);
                    }
                });
        }
        
    });
</script>
@endsection

@section('css')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">{{ __('enquire.heading') }}</div>
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
                    <form method="POST" action="{{ route('Enquires.store') }}">
                        @csrf
                        <div class="row">
                            @include('enquiry._enquiris')
                            <div class="col-md-12 text-center">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <input type="button" class="btn btn-danger" value="{{ __('enquire.cancel_btn_btn') }}">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
