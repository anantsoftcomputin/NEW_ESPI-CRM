@extends('layouts.theam')

@section('title')
Add Enquiry
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
<script src="{{ asset('plugins/ocr/js/mrz-worker.bundle-min-wrapped.js')}}"></script>
<script src="{{ asset('plugins/ocr/js/demo.bundle-min.js')}}"></script>

<style>
.refusal_hide
{
    display: none;
}
.select2-search__field {
    display: block;
    border: 0px solid #ccc!important;
}

div.progress.visible {
        visibility: visible;
      }

      div.progress {
        visibility: hidden;
        margin: 0;
        padding: 0;
        position: fixed;
        top: 0;
        background-color: white;
        width: 50%;
        height: 50%;
        z-index: 999999;
        margin-left:10%;
        margin-top:10%;
      }

      div.gradient {
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;
        display: fixed;
        top: 0;
        left: 0;

        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0+0,0.32+100 */
        background: -moz-radial-gradient(center, ellipse cover, rgba(0,0,0,0) 0%, rgba(0,0,0,0.25) 100%); /* FF3.6-15 */
        background: -webkit-radial-gradient(center, ellipse cover, rgba(0,0,0,0) 0%,rgba(0,0,0,0.25) 100%); /* Chrome10-25,Safari5.1-6 */
        background: radial-gradient(ellipse at center, rgba(0,0,0,0) 0%,rgba(0,0,0,0.25) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#52000000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }
      div.progress-wrapper {
        font-size: 2em;
        padding: 2em;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 40%;
        border: 2px solid black;
        background: white;
        box-shadow: 0.5em 0.5em 0.5em rgba(0,0,0,0.25);
        border-radius: 0.2em;
        z-index: 999999;
      }

      progress {
        width: 100%;
        margin: 0.2em;
        z-index: 999999;
      }

      div.wrapper {
        padding: 5px;
      }

      div.wrapper, div.wrapper > div {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      #parsed .error {
        padding: 0px 1em;
        max-width: 60%;

      }

      div#detected{
        margin-bottom: 1em;
        flex-direction: column-reverse;
      }

      canvas {
        max-width: 100%;
        margin: 5px;
      }

      canvas[title=crop] {
        max-width: 100%;
        margin: 0px 5px;
      }

      @media screen and (orientation: landscape) {
      }

      @media screen and (orientation: portrait) {
      }
</style>
<script>

$(document).ready(function () {

    $( function() {
    $( ".disableFuturedate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1950:'+"{{date('Y')}}",
    });
  } );
    var currentDate = new Date();
   });

$(document).ready(function(){
    var country_id=$("#country").val();
    if(country_id)
    {
        $('#state option[value!="0"]').remove();
        let URL="{{ url('api/admin/getState/') }}/"+country_id;
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {   // success callback function
                    $('#state')
                            .append($("<option></option>")
                                    .attr("value", '0')
                                    .text("Select State"));
                    $.each(data, function(key, value) {
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
    }

    var state_id="{{old('state_id')}}";
    if(state_id)
    {
        alert("df");
        let URL="{{ url('api/admin/getStateById/') }}/"+state_id;
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {
                    $('#state').html("<option value="+data.id+" selected>"+data.name+"</option>");
				},
				error: function (jqXhr, textStatus, errorMessage) { // error callback
					$('p').append('Error: ' + errorMessage);
				}
			});
    }

    var city_id="{{old('city_id')}}";
    if(city_id)
    {
        let URL="{{ url('api/admin/getCityById/') }}/"+city_id;
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {
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

    $("#ref_name_label").html("Reference Name");
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

    $("#ref_code").focusout(function(){
        var refCode=$("#ref_code").val();
        $('#ref_phone').val("");
        $('#ref_name').val("");
        let URL="{{ url('api/admin/getReferralByCode/') }}/"+refCode;
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {
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

        // $('#state option[value!="0"]').remove();
        $(this).val();
        let URL="{{ url('api/admin/getState/') }}/"+$(this).val();
        $.ajax(URL,
			{
				dataType: 'json', // type of response data
				success: function (data,status,xhr) {   // success callback function

                    $('#state').append($("<option></option>").attr("value", "#").attr("disable", true).text("Select State"));
                    $.each(data, function(key, value) {
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
                    $.each(data, function(key, value) {
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

                    <form method="POST" action="{{ route('Enquires.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @include('enquiry._enquiris')
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
