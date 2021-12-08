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
                        <h4>Detail > {{ Str::lower($enquiry->name) }} | <span class="badge badge-primary">#{{ Str::lower($enquiry->enquiry_id) }}</span></h4>
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

@yield('child_model')



@section('js')
{{-- start_child_js --}}
@yield('child_js')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css"') }}">
<script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('plugins/ocr/js/mrz-worker.bundle-min-wrapped.js')}}"></script>
<script src="{{ asset('plugins/ocr/js/demo.bundle-min.js')}}"></script>

<style>
    hr {
    margin-top: 12px;
    margin-bottom: 12px;
    border-top: 1px solid #000;
}
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
      .hide_col
      {
        display: none;
      }

      @media screen and (orientation: landscape) {
      }

      @media screen and (orientation: portrait) {
      }
</style>
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script id="details-template" type="text/x-handlebars-template">
    <div class="row" id="colam_@{{ id }}">
        <div class="col-md-3">
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
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Work Profile</label>
                <input type="text" name="work_profile[]" id="name" value="" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="name">Remove</label>
                <a  class='btn btn-danger remove_exp' id='NAME' data-id="colam_@{{ id }}" onclick="delete_row('colam_@{{ id }}')">
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
                <a class='btn btn-danger remove_exp' id='NAME' data-id="colam_@{{ id }}" onclick="delete_row('colam_@{{ id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </div>
        </div>
    </div>
</script>
<script id="details-template-refusal" type="text/x-handlebars-template">
    <div class="row" id="colam_@{{ id }}">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Refusal Country</label>
                <input type="text" name="refusal_country[]" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Visa Category</label>
                <input type="text" name="refusal_catagory[]" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Refusal Reason</label>
                <input type="text" name="refusal_resion[]" class="form-control">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="name">Refusal Date</label>
                <input type="date" name="refusal_date[]" class="form-control">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="name">Remove</label>
                <a class="btn btn-danger" onclick="refusal_remove(@{{ id }});">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </div>
        </div>
    </div>
</script>
<script id="detail-mal-online-exam" type="text/x-handlebars-template">
    <div class="col-md-12">
        <hr>
        <hr>
    </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Exam Status</label>
                <select class="form-control" id="exam_status_@{{ id }}" name="exam_status" onchange="toggle_exam_status(this,@{{ id }})">
                    <option value="">Select Exam Status</option>
                    <option value="Completed">Completed</option>
                    <option value="Planning">Planning</option>
                    <option value="NotPlanned">Still Not Planned</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Type of Exam</label>
                <select name="exam_type" id="exam_type_@{{ id }}" class="form-control" onchange="change_exam_type(@{{ id }});">
                        <option value="">Type of exam</option>
                        <option value="IELTS">IELTS</option>
                        <option value="TOEFL">TOEFL</option>
                        <option value="SAT">SAT</option>
                        <option value="GRE">GRE</option>
                        <option value="GMAT">GMAT</option>
                        <option value="PTE">PTE</option>
                        <option value="UKVI">UKVI</option>
                        <option value="IELTS GENERAL">IELTS GENERAL</option>
                        <option value="DUOLINGO">DUOLINGO</option>
                        <option value="SPOKEN ENGLISH">SPOKEN ENGLISH</option>
                </select>
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-12" style="display:none" id="communication_skill_msg_@{{ id }}">
            <div id="communication_skill_msg">
                Communication Skills
                <hr>
            </div>
        </div>
        <div class="col-md-6 hide_col " id="exam_listening_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Listening</label>
                <input type="text" name="exam_listening" id="exam_listening" class="form-control">
            </div>
        </div>
        <div class="col-md-6 hide_col " id="exam_speaking_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Speaking</label>
                <input type="text" name="exam_speaking" id="exam_speaking" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_reading_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Reading</label>
                <input type="text" name="exam_reading" id="exam_reading" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_writing_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Writing</label>
                <input type="text" name="exam_writing" id="exam_writing" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_math_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Math</label>
                <input type="text" name="exam_math" id="exam_math" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_evidence_based_reading_writing_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Evidence-Based Reading and Writing</label>
                <input type="text" name="exam_evidence_based_reading_writing" id="exam_evidence_based_reading_writing" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_essay_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Essay (optional)</label>
                <input type="text" name="exam_essay" id="exam_essay" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_verbal_reasoning_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Verbal Reasoning</label>
                <input type="text" name="exam_verbal_reasoning" id="exam_verbal_reasoning" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_quantitative_reasoning_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Quantitative Reasoning</label>
                <input type="text" name="exam_quantitative_reasoning" id="exam_quantitative_reasoning" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_analytical_writing_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Analytical Writing</label>
                <input type="text" name="exam_analytical_writing" id="exam_analytical_writing" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col " id="exam_integrated_reasoning_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Integrated Reasoning</label>
                <input type="text" name="exam_integrated_reasoning" id="exam_integrated_reasoning" class="form-control">
            </div>
        </div>

        <div class="col-md-12" style="display:none" id="enable_skill_msg_@{{ id }}">
            Enabling Skills
            <hr>
        </div>

        <div class="col-md-6 hide_col" id="exam_grammar_div_@{{ id }}">

            <div class="form-group">
                <label for="name">Grammar</label>
                <input type="text" name="exam_grammar" id="exam_grammar" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_fluency_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Fluency</label>
                <input type="text" name="exam_fluency" id="exam_fluency" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_pronunciation_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Pronunciation</label>
                <input type="text" name="exam_pronunciation" id="exam_pronunciation" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_spelling_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Spelling</label>
                <input type="text" name="exam_spelling" id="exam_spelling" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id='exam_vocabulary_div_@{{ id }}'>
            <div class="form-group">
                <label for="name">Vocabulary</label>
                <input type="text" name="exam_vocabulary" id="exam_vocabulary" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_written_disclosure_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Written Disclosure</label>
                <input type="text" name="exam_written_disclosure" id="exam_written_disclosure" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_literacy_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Literacy</label>
                <input type="text" name="exam_literacy" id="exam_literacy" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_conversation_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Conversation</label>
                <input type="text" name="exam_conversation" id="exam_conversation" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_comprehension_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Comprehension</label>
                <input type="text" name="exam_comprehension" id="exam_comprehension" class="form-control">
            </div>
        </div>

        <div class="col-md-6 hide_col" id="exam_production_div_@{{ id }}">
            <div class="form-group">
                <label for="name">Production</label>
                <input type="text" name="exam_production" id="exam_production" class="form-control">
            </div>
        </div>

        <div class="hiddan_data_data_@{{ id }}" style="display:none;">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Planning Date</label>
                    <input type="date" name="planning_date" id="name" class="form-control" required="">
                </div>
            </div>
        </div>
</script>
<script>
    var route_prefix = "/filemanager";
</script>
<script>
    (function( $ ){

  $.fn.filemanager = function(type, options) {
    type = type || 'file';

    this.on('click', function(e) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      var target_input = $('#' + $(this).data('input'));
      var target_preview = $('#' + $(this).data('preview'));
      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
      window.SetUrl = function (items) {
        var file_path = items.map(function (item) {
          return item.url;
        }).join(',');

        // set the value of the desired input to image url
        target_input.val('').val(file_path).trigger('change');

        // clear previous preview
        target_preview.html('');

        // set or change the preview image src
        items.forEach(function (item) {
          target_preview.append(
            $('<img>').css('height', '5rem').attr('src', item.thumb_url)
          );
        });

        // trigger change event
        target_preview.trigger('change');
      };
      return false;
    });
  }

})(jQuery);

  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm1').filemanager('image', {prefix: route_prefix});
    $('#diploma_file').filemanager('image', {prefix: route_prefix});
    $('#master_file').filemanager('image', {prefix: route_prefix});
    $('#bachelor_file').filemanager('image', {prefix: route_prefix});
    $('#phd_file').filemanager('image', {prefix: route_prefix});
    $('#transcript_file').filemanager('image', {prefix: route_prefix});
    $('#experience_file').filemanager('image', {prefix: route_prefix});
    $('#resume_file').filemanager('image', {prefix: route_prefix});
    $('#lor_file').filemanager('image', {prefix: route_prefix});

</script>
<script>
    var lfm = function(id, type, options) {
      let button = document.getElementById(id);

      button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));

        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
          var file_path = items.map(function (item) {
            return item.url;
          }).join(',');

          // set the value of the desired input to image url
          target_input.value = "Storage/";
          target_input.dispatchEvent(new Event('change'));

          // clear previous preview
          target_preview.innerHtml = '';

          // set or change the preview image src
          items.forEach(function (item) {
            let img = document.createElement('img')
            img.setAttribute('style', 'height: 5rem')
            img.setAttribute('src', item.thumb_url)
            target_preview.appendChild(img);
          });

          // trigger change event
          target_preview.dispatchEvent(new Event('change'));
        };
      });
    };

    lfm('lfm2', 'file', {prefix: route_prefix});
  </script>
<script>

    var cout=1;

    $("#experience_status").change(function(){
        var status=$("#experience_status").val();
        if(status=='Yes')
        {
            $("#experience_detail_history").show();
            $("#add_more_expiriance").show();
        }else{
            $("#experience_detail_history").hide();
            $("#add_more_expiriance").hide();
        }

    });

    function travel_detail_history(e){
        $(".travel_detail_history").hide();
        var status=e;
        if(status=="Yes")
        {
            $(".travel_detail_history").show();
        }
        if(status=="No")
        {
            $(".travel_detail_history").hide();
        }

    }


    $("#exam_type").change(function()
    {
        var examType=$(this).val();
        var exam_status=$("#exam_status").val();
        $(".exam_score").show();
        $("#communication_skill_msg").hide();
        $("#enable_skill_msg").hide();
        $("#exam_listening_div").hide();
        $("#exam_speaking_div").hide();
        $("#exam_reading_div").hide();
        $("#exam_writing_div").hide();
        $("#exam_math_div").hide();
        $("#exam_evidence_based_reading_writing_div").hide();
        $("#exam_essay_div").hide();
        $("#exam_verbal_reasoning_div").hide();
        $("#exam_quantitative_reasoning_div").hide();
        $("#exam_analytical_writing_div").hide();
        $("#exam_integrated_reasoning_div").hide();
        $("#exam_grammar_div").hide();
        $("#exam_fluency_div").hide();
        $("#exam_pronunciation_div").hide();
        $("#exam_spelling_div").hide();
        $("#exam_vocabulary_div").hide();
        $("#exam_written_disclosure_div").hide();
        $("#exam_literacy_div").hide();
        $("#exam_conversation_div").hide();
        $("#exam_comprehension_div").hide();
        $("#exam_production_div").hide();

        if(examType=="IELTS" && exam_status !="Planning")
        {
            $("#exam_listening_div").show();
            $("#exam_speaking_div").show();
            $("#exam_reading_div").show();
            $("#exam_writing_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="IELTS GENERAL" && exam_status !="Planning")
        {
            $("#exam_listening_div").show();
            $("#exam_speaking_div").show();
            $("#exam_reading_div").show();
            $("#exam_writing_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="SPOKEN ENGLISH" && exam_status !="Planning")
        {
            $("#exam_listening_div").show();
            $("#exam_speaking_div").show();
            $("#exam_reading_div").show();
            $("#exam_writing_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="UKVI" && exam_status !="Planning")
        {
            $("#exam_listening_div").show();
            $("#exam_speaking_div").show();
            $("#exam_reading_div").show();
            $("#exam_writing_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="TOEFL" && exam_status !="Planning")
        {
            $("#exam_listening_div").show();
            $("#exam_speaking_div").show();
            $("#exam_reading_div").show();
            $("#exam_writing_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="SAT" && exam_status !="Planning")
        {
            $("#exam_math_div").show();
            $("#exam_evidence_based_reading_writing_div").show();
            $("#exam_essay_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="SAT" && exam_status !="Planning")
        {
            $("#exam_math_div").show();
            $("#exam_evidence_based_reading_writing_div").show();
            $("#exam_essay_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="GRE" && exam_status !="Planning")
        {
            $("#exam_verbal_reasoning_div").show();
            $("#exam_quantitative_reasoning_div").show();
            $("#exam_analytical_writing_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="GMAT" && exam_status !="Planning")
        {
            $("#exam_verbal_reasoning_div").show();
            $("#exam_quantitative_reasoning_div").show();
            $("#exam_analytical_writing_div").show();
            $("#exam_integrated_reasoning_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="PTE" && exam_status !="Planning")
        {
            $("#communication_skill_msg").show();
            $("#enable_skill_msg").show();
            $("#exam_listening_div").show();
            $("#exam_speaking_div").show();
            $("#exam_reading_div").show();
            $("#exam_writing_div").show();

            $("#exam_grammar_div").show();
            $("#exam_fluency_div").show();
            $("#exam_pronunciation_div").show();
            $("#exam_spelling_div").show();
            $("#exam_vocabulary_div").show();
            $("#exam_written_disclosure_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(examType=="DUOLINGO" && exam_status !="Planning")
        {
            $("#exam_literacy_div").show();
            $("#exam_conversation_div").show();
            $("#exam_analytical_writing_div").show();
            $("#exam_comprehension_div").show();
            $("#exam_production_div").show();
            $("#overall_band_div").show();
            $("#exam_date").show();
        }

        if(exam_status == "Planning")
        {

            $("#exam_listening_div").hide();
            $("#exam_speaking_div").hide();
            $("#exam_reading_div").hide();
            $("#exam_writing_div").hide();
            $("#overall_band_div").hide();
            $("#exam_date").hide();
        }

    });

    function refusal_remove(id)
    {
        $("#colam_"+id).remove();
    }

    function change_exam_type(id)
    {
        var examType=$("#exam_type_"+id).val();
        var exam_status=$("#exam_status_"+id).val();
        $(".exam_score").show();
        $("#communication_skill_msg_"+id).hide();
        $("#enable_skill_msg_"+id).hide();
        $("#exam_listening_div_"+id).hide();
        $("#exam_speaking_div_"+id).hide();
        $("#exam_reading_div_"+id).hide();
        $("#exam_writing_div_"+id).hide();
        $("#exam_math_div_"+id).hide();
        $("#exam_evidence_based_reading_writing_div_"+id).hide();
        $("#exam_essay_div_"+id).hide();
        $("#exam_verbal_reasoning_div_"+id).hide();
        $("#exam_quantitative_reasoning_div_"+id).hide();
        $("#exam_analytical_writing_div_"+id).hide();
        $("#exam_integrated_reasoning_div_"+id).hide();
        $("#exam_grammar_div_"+id).hide();
        $("#exam_fluency_div_"+id).hide();
        $("#exam_pronunciation_div_"+id).hide();
        $("#exam_spelling_div_"+id).hide();
        $("#exam_vocabulary_div_"+id).hide();
        $("#exam_written_disclosure_div_"+id).hide();
        $("#exam_literacy_div_"+id).hide();
        $("#exam_conversation_div_"+id).hide();
        $("#exam_comprehension_div_"+id).hide();
        $("#exam_production_div_"+id).hide();

        if(examType=="IELTS" && exam_status !="Planning")
        {
            $("#exam_listening_div_"+id).show();
            $("#exam_speaking_div_"+id).show();
            $("#exam_reading_div_"+id).show();
            $("#exam_writing_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="IELTS GENERAL" && exam_status !="Planning")
        {
            $("#exam_listening_div_"+id).show();
            $("#exam_speaking_div_"+id).show();
            $("#exam_reading_div_"+id).show();
            $("#exam_writing_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="SPOKEN ENGLISH" && exam_status !="Planning")
        {
            $("#exam_listening_div_"+id).show();
            $("#exam_speaking_div_"+id).show();
            $("#exam_reading_div_"+id).show();
            $("#exam_writing_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="UKVI" && exam_status !="Planning")
        {
            $("#exam_listening_div_"+id).show();
            $("#exam_speaking_div_"+id).show();
            $("#exam_reading_div_"+id).show();
            $("#exam_writing_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="TOEFL" && exam_status !="Planning")
        {
            $("#exam_listening_div_"+id).show();
            $("#exam_speaking_div_"+id).show();
            $("#exam_reading_div_"+id).show();
            $("#exam_writing_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="SAT" && exam_status !="Planning")
        {
            $("#exam_math_div_"+id).show();
            $("#exam_evidence_based_reading_writing_div_"+id).show();
            $("#exam_essay_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="SAT" && exam_status !="Planning")
        {
            $("#exam_math_div_"+id).show();
            $("#exam_evidence_based_reading_writing_div_"+id).show();
            $("#exam_essay_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="GRE" && exam_status !="Planning")
        {
            $("#exam_verbal_reasoning_div_"+id).show();
            $("#exam_quantitative_reasoning_div_"+id).show();
            $("#exam_analytical_writing_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="GMAT" && exam_status !="Planning")
        {
            $("#exam_verbal_reasoning_div_"+id).show();
            $("#exam_quantitative_reasoning_div_"+id).show();
            $("#exam_analytical_writing_div_"+id).show();
            $("#exam_integrated_reasoning_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="PTE" && exam_status !="Planning")
        {
            $("#communication_skill_msg_"+id).show();
            $("#enable_skill_msg_"+id).show();
            $("#exam_listening_div_"+id).show();
            $("#exam_speaking_div_"+id).show();
            $("#exam_reading_div_"+id).show();
            $("#exam_writing_div__"+id).show();

            $("#exam_grammar_div_"+id).show();
            $("#exam_fluency_div_"+id).show();
            $("#exam_pronunciation_div_"+id).show();
            $("#exam_spelling_div_"+id).show();
            $("#exam_vocabulary_div_"+id).show();
            $("#exam_written_disclosure_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(examType=="DUOLINGO" && exam_status !="Planning")
        {
            $("#exam_literacy_div_"+id).show();
            $("#exam_conversation_div_"+id).show();
            $("#exam_analytical_writing_div_"+id).show();
            $("#exam_comprehension_div_"+id).show();
            $("#exam_production_div_"+id).show();
            $("#overall_band_div"+id).show();
        }

        if(exam_status == "Planning")
        {

            $("#exam_listening_div").hide();
            $("#exam_speaking_div").hide();
            $("#exam_reading_div").hide();
            $("#exam_writing_div").hide();
            $("#overall_band_div").hide();
            $("#exam_date").hide();
        }

    }


    $("#add_exam_online").click(function(e){
        e.preventDefault();
        var data = {
            'id': cout
        };
        var template = Handlebars.compile($("#detail-mal-online-exam").html());
        console.log(template);
        var row = $(".exam_container");
        row.append(template(data));
        cout=cout+1;
    });

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
        cout=cout+1;
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
    function toggle_exam_status(val,el='0')
    {
        if(el==0)
        {
            if($("#exam_status").val()=="Completed")
            {
                $(".hiddan_data").show();
                $(".hiddan_data_data").hide();

            }
            else if($("#exam_status").val()=="Planning")
            {
                $(".exam_score").hide();
                $(".hiddan_data_data").show();
                $(".hiddan_data").hide();
                $(".hide_col").hide();

            }
            else if($("#exam_status").val()=="NotPlanning")
            {
                $(".exam_score").hide();
                $(".hiddan_data_data").hide();
                $(".hiddan_data").hide();
                $(".hide_col").hide();

            }
            else
            {
                $(".exam_score").hide();
                $(".hiddan_data_data").show();
                $(".hiddan_data").hide();
            }
        }
        else
        {
            if($("#exam_status_"+el).val()=="Completed")
            {
                $(".hiddan_data").show();
                $(".hiddan_data_data_"+el).hide();

            }
            else
            {
                $(".exam_score").hide();
                $(".hiddan_data_data_"+el).show();
                $(".hiddan_data").hide();
            }
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
        var row = $(".wallpappar");
        row.append(template(data));
        cout=cout+1;
    });

</script>

<script>
    // wizard = $("#example-basic").steps({
    //     headerTag: "h3",
    //     bodyTag: "section",
    //     transitionEffect: "slideLeft",
    //     autoFocus: true,
    //     cssClass: 'pill wizard',
    //     labels: {
    //         next: $('#next').html(),
    //         previous : $('#previous').html()

    //     },
    // });

    $.fn.steps.setStep = function (step)
    {
        var currentIndex = $(this).steps('getCurrentIndex');
            for(var i = 0; i < Math.abs(step - currentIndex); i++){
                if(step > currentIndex) {
                    $(this).steps('next');
                }
                else{
                    $(this).steps('previous');
                }
            }
    };

    @isset($step)
        $( document ).ready(function() {
            $("#example-basic").steps("setStep", {{ $step }});
        });
    @endisset
</script>
@endsection
