@extends('layouts.theam')

@section('title')
Update Enquiry
@endsection


@section('js')

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
<script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
.select2-search__field {
    display: block;
    border: 0px solid #ccc!important;
}
</style>
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

<script>
    // SELECT2 PAGE JS


    var data = {
        'items': [
            {"id":"2", "comment": "xxxxxxxx"},
            {"id":"3", "comment": "yyyyyyy"}
        ]
    };
    $("#add_more_expiriance").click(function(e){
        e.preventDefault();
        var template = Handlebars.compile($("#details-template").html());
        console.log(template);
        var row = $("#experience_detail_history");
        row.append(template(data));
        console.log(row);
    });

    $("#add_more_history").click(function(e){
        e.preventDefault();
        var template = Handlebars.compile($("#details-template-travel").html());
        console.log(template);
        var row = $("#travel_detail_history");
        row.append(template(data));
        console.log(row);
    });

    function toggle_last_education(e)
    {
        if(e=="master")
        {
            $(".education").hide();
            $("#master_detail").show();
        }
        if(e=="10th")
        {
            $(".education").hide();
            $("#ssc_detail").show();
        }
        if(e=="12th")
        {
            $(".education").hide();
            $("#ssc_detail").show();
            $("#hsc_detail").show();
        }
        if(e=="diploma")
        {
            $(".education").hide();
            $("#ssc_detail").show();
            $("#diploma_detail").show();
        }
        if(e=="graduate")
        {
            $(".education").hide();
            $("#degree_detail").show();
        }

    }

    $(".tagging").select2({
        tags: false
    });
    // END SELECT2 PAGE JS


    $("a").click(function(){
        if($(this).text()=="Finish")
        {

            $('form').submit();
        }
    });
    function toggle_exam_status(val)
    {
        if($("#exam_status").val()=="Completed")
        {
            $(".hiddan_data").show();
        }
        else
        {
            $(".hiddan_data").hide();
        }

    }
</script>

<link rel="stylesheet" href="{{asset('plugins/datepicker/jquery-ui.css')}}">
<script src="{{asset('plugins/datepicker/jquery-ui.js')}}"></script>
<script>

$(document).ready(function () {
    var currentDate = new Date();
      $('.disableFuturedate').datepicker({
      changeMonth: true,
      changeYear: true,
      format: 'dd-mm-yyyy',
      autoclose:true,
      yearRange: '1950:'+"{{date('Y')}}",
      endDate: "currentDate",
      maxDate: currentDate
      }).on('changeDate', function (ev) {
         $(this).datepicker('hide');
      });
      $('.disableFuturedate').keyup(function () {
         if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
         }
      });
   });

$(document).ready(function(){

    var state_id="{{$enquiry->state_id}}";
    if(state_id)
    {
        let URL="{{ url('api/admin/getStateById/') }}/"+state_id;
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {
                    console.log(data);
                    $('#state').html("<option value="+data.id+" selected>"+data.name+"</option>");
				},
				error: function (jqXhr, textStatus, errorMessage) { // error callback
					$('p').append('Error: ' + errorMessage);
				}
			});
    }

    var city_id="{{$enquiry->city_id}}";
    if(city_id)
    {
        let URL="{{ url('api/admin/getCityById/') }}/"+city_id;
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {
                    console.log(data);
                    $('#city').html("<option value="+data.id+" selected>"+data.name+"</option>");
				},
				error: function (jqXhr, textStatus, errorMessage) { // error callback
					$('p').append('Error: ' + errorMessage);
				}
			});
    }

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

    $("#reference_source").change(function(){
        $("#ref_name_div").hide();
        $("#ref_phone_div").hide();
        $("#ref_code_div").hide();

        var rsource=$(this).val();
        if(rsource=="Reference")
        {
            $("#ref_name_label").html("Reference Name");
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

    $("#ref_code").focusout(function(){
        var refCode=$("#ref_code").val();
        $('#ref_phone').val("");
        $('#ref_name').val("");
        let URL="{{ url('api/admin/getReferralByCode/') }}/"+refCode;
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {
                    console.log(data);
                    $('#ref_phone').val(data.reference_phone);
                    $('#ref_name').val(data.reference_name);
				},
				error: function (jqXhr, textStatus, errorMessage) { // error callback
					$('#ref_phone').val("");
                    $('#ref_name').val("");
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
                    <form method="POST" action="{{ route('Enquires.update',$enquiry->id) }}">
                        @csrf
                        @method('patch')
                        <div class="row">
                            @include('enquiry._edit_form')
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <a href="{{route('Enquires.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
