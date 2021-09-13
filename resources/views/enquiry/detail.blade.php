@extends('layouts.theam')

@section('title')
Enquiry Detail
@endsection


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
                    <h3>Personal information</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_1')
                    </section>
                    <h3>Education Summary</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_2')
                    </section>
                    <h3>Work Experience</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_3')
                    </section>
                    <h3>Online Exam Details</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_4')
                    </section>
                    <h3>Applying Details</h3>
                    <section>
                        @include('enquiry.detail_staps.stap_5')
                    </section>
                    <h3>Upload Documents</h3>
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
<style>
.select2-search__field {
    display: block;
    border: 0px solid #ccc!important;
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
                <label for="name">Name of the company</label>
                <input type="text" name="travel_company[]" id="name" value="" class="form-control" required="">
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
<script>
    // SELECT2 PAGE JS

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
</script>
@endsection
