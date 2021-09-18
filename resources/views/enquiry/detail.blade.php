@extends('layouts.theam')

@section('title')
Enquiry Detail
@endsection


<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="col-lg-12 layout-spacing">
    <form method="post" action="{{ route('EnquiryDetail.store',$id) }}" id="form-detail">
        @csrf
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Default</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div id="example-basic">
                    <h3>Personal<br>information</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_1')
                    </section>
                    <h3>Education<br>Summary</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_2')
                    </section>
                    <h3>Work<br>Experience</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_3')
                    </section>
                    <h3>Online<br>Exam Details</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_4')
                    </section>
                    <h3>Applying<br>Details</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_5')
                    </section>
                    <h3>Upload<br>Documents</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_6')
                    </section>
                </div>


            </div>
        </div>
    </form>
</div>

@endsection



@section('js')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
<script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        width: 100%;
        height: 100%;
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

      }

      progress {
        width: 100%;
        margin: 0.2em;
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
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script id="details-template" type="text/x-handlebars-template">
    <div class="row" id="colam_@{{ id }}">
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Name of the company</label>
                <input type="text" name="work_company[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">From</label>
                <input type="date" name="work_from[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">To</label>
                <input type="date" name="to_work_from[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Work Profile</label>
                <input type="text" name="work_profile[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="name">Remove</label>
                <a href='#' class='btn btn-danger remove_exp' id='NAME' data-id="colam_@{{ id }}" onclick="delete_row('colam_@{{ id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </div>
        </div>
    </div>
</script>
<script id="details-template-travel" type="text/x-handlebars-template">
    <div class="row" id="colam_@{{ id }}">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Name of the country</label>
                <input type="text" name="travel_country[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Visit Purpose</label>
                <input type="text" name="travel_purpose[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Duration Of Stay</label>
                <input type="text" name="travel_stay[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="name">Remove</label>
                <a href='#' class='btn btn-danger remove_exp' id='NAME' data-id="colam_@{{ id }}" onclick="delete_row('colam_@{{ id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </div>
        </div>
    </div>
</script>
<script id="details-template-refusal" type="text/x-handlebars-template">
    <div class="row" id="colam_@{{ id }}">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Refusal Country</label>
                <input type="text" name="refusal_country[]" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Visa Catagory</label>
                <input type="text" name="refusal_catagory[]" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Refusal Resion</label>
                <input type="text" name="refusal_resion[]" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Refusal Date</label>
                <input type="date" name="refusal_date[]" class="form-control">
            </div>
        </div>
    </div>
</script>
<script>
  
    var cout=1;

    $("#add_more_expiriance").click(function(e){
        e.preventDefault();
        var data = {
            'id': cout
        };
        var template = Handlebars.compile($("#details-template").html());
        console.log(template);
        var row = $("#experience_detail_history");
        row.append(template(data));
        cout=cout+1;
    });

    function delete_row(type)
    {
        $("#"+type).remove();
    }

    $("#add_more_history").click(function(e){
        var data = {
            'id': cout
        };
        e.preventDefault();
        var template = Handlebars.compile($("#details-template-travel").html());
        console.log(template);
        var row = $("#travel_detail_history");
        row.append(template(data));
    });

    function toggle_last_education(e)
    {
        if(e=="master")
        {
            $(".education").hide();
            $("#ssc_detail").show();
            $("#hsc_detail").show();
            $("#degree_detail").show();
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
            $("#ssc_detail").show();
            $("#hsc_detail").show();
            $("#diploma_detail").show();
            $("#degree_detail").show();
        }

    }

    $(".tagging").select2({
        tags: false,
        transitionEffect: "slideLeft",
    });
    // END SELECT2 PAGE JS


    // Stap 6
    $("#add_more_file").click(function(){
        alert("ADD MORE FILE ");
    });
    // End Stap 6


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
            $(".hiddan_data_data").hide();

        }
        else
        {
            $(".hiddan_data_data").show();
            $(".hiddan_data").hide();
        }

    }

    $("#rejection_if_any").change(function(){
        console.log($(this).find(":selected").text());
        if($(this).find(":selected").text()=="Yes")
        {
            $(".refusal_hide").show();
        }
        else
        {
            $(".refusal_hide").hide();
        }
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

    $("#refusal_add").click(function(e){
        var data = {
            'id': cout
        };
        e.preventDefault();
        var template = Handlebars.compile($("#details-template-refusal").html());
        console.log(template);
        var row = $("#example-basic-p-4");
        row.append(template(data));
    });

</script>
@endsection
