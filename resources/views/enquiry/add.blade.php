@extends('layouts.theam')

@section('title')
Enquiries
@endsection

@section('js')
<script>

$(document).ready(function(){
    $("#general_assessment").hide();
    $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $("#general_assessment").show();
            }
            else if($(this).prop("checked") == false){
                $("#general_assessment").hide();
            }
        });

    $("#ref_name_label").html("Referance Name");
    $("#ref_phone_label").html("Reference Phone");
    $("#ref_code_label").html("Reference Code");
    $("#ref_name_div").hide();
    $("#ref_phone_div").hide();
    $("#ref_code_div").hide();

    $("#referance_source").change(function(){
        $("#ref_name_div").hide();
        $("#ref_phone_div").hide();
        $("#ref_code_div").hide();

        var rsource=$(this).val();
        if(rsource=="Reference")
        {
            $("#ref_name_label").html("Referance Name");
            $("#ref_phone_label").html("Reference Phone");
            $("#ref_code_label").html("Reference Code");
            $("#ref_name_div").show();
            $("#ref_phone_div").show();
            $("#ref_code_div").show();
        }
        if(rsource=="Agent")
        {
            $("#ref_name_label").html("Agent Name");
            $("#ref_phone_label").html("Agent Phone");
            $("#ref_code_label").html("Agent Code");
            $("#ref_name_div").show();
            $("#ref_phone_div").show();
            $("#ref_code_div").show();
        }
        if(rsource=="Classes")
        {
            $("#ref_name_label").html("Class Name");
            $("#ref_name_div").show();
            $("#ref_phone_div").hide();
            $("#ref_code_div").hide();
        }
    });

    $("#email").focusout(function(){
        $("#user_exist").empty();
        var email=$(this).val();
        let URL="{{ url('api/admin/checkemail/') }}/"+email;
        $.ajax(URL,
		{
			success: function (data) { 
                if(data)
                {
                    var otpRoute="{{url('admin/enquiryOtpSend/')}}/"+data.id;
                    $("#user_exist").html("This Email id already Exists ! Do you want to retrive data &nbsp; <a href='"+otpRoute+"' class='text-primary'>Yes</a>");
                }
            }
        });
    });

});

    function getdata(){
      var email=$("#email").val();
      let URL="{{ url('api/admin/getEnquiry/') }}/"+email;
      $.ajax(URL,
		{
			success: function (data,status,xhr) { 
                $("#name").val(data.name);
                $('#education option[value='+data.education+']').attr('selected','selected');
                $('#country option[value='+data.country_id+']').attr('selected','selected');
                $('#state option[value='+data.state_id+']').attr('selected','selected');
                $('#city option[value='+data.city_id+']').attr('selected','selected');
                $("#phone").val(data.phone);
                $("#pin_code").val(data.pin_code);
                $("#address").val(data.address);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback
					$('p').append('Error: ' + errorMessage);
            }
        });
    }

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
                    dataType: 'json',
                    method:"get", // type of response data
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
        <div class="col-md-12">
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
