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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Maritial Status</label>
                                    <Select class="form-control" name="marital_status" required>
                                        <option value="unmarried" selected>Unmarried</option>
                                        <option value="married">married</option>
                                    </Select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Passport</label>
                                    <Select class="form-control" name="passport" required>
                                        <option value="yes" selected>Yes</option>
                                        <option value="no">no</option>
                                    </Select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Country Intrested</label>
                                    <input type="text" name="country_intrusted" id="name" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Reference Name</label>
                                    <input type="text" name="reference_name" id="name" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Reference Phone</label>
                                    <input type="number" name="reference_phone" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Reference Code</label>
                                    <input type="text" name="reference_code" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                        </div>

                    </section>
                    <h3>Education Summary</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Select Last Educatuion</label>
                                    <select class="form-control" name="last_education" onchange="toggle_last_education(this)">
                                       <option value="">Select Last Educatuion</option>
                                       <option value="10th">10th</option>
                                       <option value="Diploma">Diploma</option>
                                       <option value="12th">12th</option>
                                       <option value="Graduate">Graduate</option>
                                       <option value="Master">Master</option>
                                       <option value="PHD">PHD</option>
                                   </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Year of passing </label>
                                    <input type="text" name="educatuion_year_of_passing" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Percentage</label>
                                    <input type="text" name="educatuion_percentage" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name of Institute/School</label>
                                    <input type="text" name="educatuion_institute" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Medium of Education</label>
                                    <input type="number" name="educatuion_medium" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Board</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Backlogs</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Gap Information if You Have</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Gap Details During Education</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                        </div>

                    </section>
                    <h3>Work Experience</h3>
                    <section>
                        <h1>Work Experience</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name of the company</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">From</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">To</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Work Profile</label>
                                    <input type="text" name="work_profile" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <h1>Travel History</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name of the company</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Visit Purpose</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Duration Of Stay</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                        </div>

                    </section>
                    <h3>Online Exam Details</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Exam Status</label>
                                    <select class="form-control" id="exam_status" name="exam_status" onchange="toggle_exam_status(this)">
                                        <option value="">Select Exam Status</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Planing">Planing</option>
                                    </select>
                                    {{-- <select class="form-control" name="last_education" onchange="toggle_last_education(this)">
                                       <option value="">Select Last Educatuion</option>
                                       <option value="10th">10th</option>
                                       <option value="Diploma">Diploma</option>
                                       <option value="12th">12th</option>
                                       <option value="Graduate">Graduate</option>
                                       <option value="Master">Master</option>
                                       <option value="PHD">PHD</option>
                                   </select> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Type of Exam</label>
                                    <select name="exam_status1" class="form-control">
                                            <option value="">Type of exam</option>
                                            <option value="IELTS">IELTS</option>
                                            <option value="TOELF">TOELF</option>
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
                        </div>
                        <div class="row hiddan_data" style="display:none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Year of passing </label>
                                        <input type="text" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Percentage</label>
                                        <input type="text" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name of Institute/School</label>
                                        <input type="text" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Medium of Education</label>
                                        <input type="number" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Board</label>
                                        <input type="text" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Backlogs</label>
                                        <input type="text" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Gap Information if You Have</label>
                                        <input type="text" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Gap Details During Education</label>
                                        <input type="text" name="name" id="name" value="" class="form-control" required="">
                                    </div>
                                </div>
                        </div>
                    </section>
                    <h3>Applying Details</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Occupation of Father</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Annual Income</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Rejection If any</label>
                                    <select class="form-control">
                                        <option selected disabled>Rejection If any</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Next follow-up/Purpose/Notes</label>
                                    <input type="text" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Next follow-up Date</label>
                                    <input type="date" name="name" id="name" value="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">How is the Enquiry?</label>
                                    <select name="enquiry_review" class="form-control">
                                        <option value="">Select Enquiry Review</option>
                                        <option value="Below Average">Below Average</option>
                                        <option value="Average">Average</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Not Suitable">Not Suitable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Upload Documents</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Photographs</label>
                                    <input type="file" name="photographs" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Passport</label>
                                    <input type="file" name="Passport" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">10th Documents</label>
                                    <input type="file" name="10TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">12th Documents</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Diploma Documents</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Bachlor Degree Documents</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Master Degree Documents</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">PhD / Doctorate Degree Documents</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">SOP</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Marksheets (IELTS/TOFEL/PTE/GRE/GMAT/SAT)</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Transcript Document(University)</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Work Experience Documents</label>
                                    <input type="file" name="12TH" class="form-control">
                                </div>
                            </div>
                        </div>
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
<script>

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
@endsection
