<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Exam Name</th>
                <th>Status</th>
                <th>Date</th>
                <th>Marks</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enquiry->ExamDetail as $item)
            <tr>
                <td class="text-center">{{ $loop->index+1 }}</td>
                <td>{{ $item->type_exam }}</td>
                <td>
                    {{ $item->status }}
                </td>
                <td><p class="text-info">{{ $item->exam_date }}</p></td>
                <td>

                    @if ($item->status!="planning")
                    @php
                        $exam=json_decode($item->exam_pattern_value);
                        $i=0;
                    @endphp
                        @foreach(json_decode($item->exam_pattern) as $item_pet)
                                                <a href="#" class="badge badge-success">{{ str_replace("_"," ",ucfirst($item_pet)) }} : {{ $exam[$i] ?? "-" }}</a>
                                                @php
                                                  $i++;
                                                @endphp
                        @endforeach

                        @else
                            <a href="#" class="badge badge-info">Not attempted</a>

                        @endif
                </td>
                <td class="text-center">
                         {{-- <a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a> --}}
                    <a href="{{ route('OnlineExam.remove',['id'=> $item->id]) }}" data-toggle="tooltip bs-tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                </td>
            </tr>
            @empty
                <tr>
                    <td class="text-center">#</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- <button id="exampleModal" type="button" class="btn btn-primary mb-2 mr-2">Play Youtube</button> --}}



<div class="text-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#OnlineExam">
        Added Exam
    </button>

</div>

<div class="modal fade" id="OnlineExam" tabindex="-1" role="dialog" aria-labelledby="OnlineExamLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OnlineExamLabel">Add Exam</h5>
            </div>
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label class="control-label">Type of Exam:</label>
                    {{-- <input type="text" name="type_exam" class="form-control" required> --}}
                    <select name="exam_type" id="exam_type_pop_model_jess" class="form-control">
                        <option value="IELTS">IELTS</option>
                        <option value="TOEFL">TOEFL</option>
                        <option value="SAT">SAT</option>
                        <option value="GRE">GRE</option>
                        <option value="GMAT">GMAT</option>
                        <option value="PTE">PTE</option>
                        <option value="UKVI">UKVI</option>
                        <option value="IELTS_GENERAL">IELTS GENERAL</option>
                        <option value="DUOLINGO">DUOLINGO</option>
                        <option value="SPOKEN_ENGLISH">SPOKEN ENGLISH</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="name">Exam Status</label>
                    <select class="form-control" id="ESDFRFTGTH" name="exam_status">
                        <option value="">Select Exam Status</option>
                        <option value="Completed">Completed</option>
                        <option value="Planning">Planning</option>
                    </select>
                </div>
                <div class="form-group" style="display: none;" id="planning_date_input">
                    <label for="name">Planning Date</label>
                    <input type="date" name="planning_date" id="planning_date_plan_jess" class="form-control" min="{{ date('Y-m-d') }}" value="0">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" id="next_step_mark_model" class="btn btn-primary">Next</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="OnlineExamExamMarks" tabindex="-1" role="dialog" aria-labelledby="OnlineExamExamMarksLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="detail-document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OnlineExamExamMarksLabel">Add Exam</h5>
            </div>
            <div class="modal-body">
                <div class="row" id="list_content">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" class="btn btn-primary" id="Sacve" onclick="storeExam();">Save</button>
            </div>
        </div>
    </div>
</div>

@section('child_js')
<script>
    $('.bs-tooltip').tooltip();
    $( document ).ready(function() {
        var listofstuff = @json(config("espi.online_exam_pattern"), JSON_PRETTY_PRINT);
        $("#ESDFRFTGTH").change(function(e){
            if($(this).val()=="Planning")
            {
                $("#planning_date_input").show();
            }
            else
            {
                $("#planning_date_input").hide();
            }
        });
        $("#next_step_mark_model").click(function (e) {
            if($("#ESDFRFTGTH").val()=="Planning")
            {
                const data = new Array();
                const requestOptions = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'My-Custom-Header': 'foobar'
                    },
                    body: JSON.stringify({ type_exam:$("#exam_type_pop_model_jess").val(), status:$("#ESDFRFTGTH").val(),exam_date:$("#planning_date_plan_jess").val(),enquiry_id:'{{ $enquiry->id }}',marks:"notset" })
                };
                fetch('{{ url('api/admin/OnlineExam/Store') }}', requestOptions)
                    .then(response => response.json())
                    .then(data => {
                        if(data.status==1)
                        {
                            location.reload(true);
                        }
                        $.each(data.errors, function($key,$value) {
                            alert($value);
                        });
                    })
                    .catch(error => {
                        console.error('There was an error!', error);
                    });
                return false;
            }
            else
            {
                $("#OnlineExam").modal("hide");
                html=get_form_html($("#exam_type_pop_model_jess").val());
                $("#list_content").html(html);
                $("#OnlineExamExamMarks").modal("show");
            }
        });

        function get_form_html(params) {
            var form="";
            $.each(listofstuff[params], function(key, value) {
                display_value=capitalizeFirstLetter(value.replace("_"," "));
                form=form+`<div class="col-md-6">
                    <div class="form-group">
                        <label for="name">${display_value}</label>
                        <input type="number" name="${value}" value="0" class="form-control" required>
                    </div>
                </div>`;

            });
            @php
            $current = \Carbon\Carbon::now();
            $trialExpires = $current->subYears(2)->format('Y-m-d');
            @endphp
            return form+`<div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Exam Date</label>
                        <input type="date" id="exam_date_model_popup_jess" name="exam_date" class="form-control" min="{{ $trialExpires }}" max="{{ date('Y-m-d') }}" value="0" required>
                    </div>
                </div>`;
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

    });
    function json2array(json){
        var result = [];
        var keys = Object.keys(json);
        keys.forEach(function(key){
            result.push(json[key]);
        });
        return result;
    }

    function storeExam() {
// console.log("Actul_string");
// console.log(JSON.stringify({ type_exam:$("#exam_type_pop_model_jess").val(), status:$("#ESDFRFTGTH").val(),exam_date:$("#list_content #exam_date_model_popup_jess").val(),enquiry_id:'{{ $enquiry->id }}'}));

const data = new Array();
// data.push('type_exam', $("#exam_type_pop_model_jess").val());
// data.push('status', $("#ESDFRFTGTH").val());
// data.push('exam_date', $("#list_content #exam_date_model_popup_jess").val());
// data.push('enquiry_id', '{{ $enquiry->id }}');

$.each($("#list_content :input"), function() {
            if($(this).val()=="")
            {
                alert("Please fill the value of "+$(this).attr("name"));
                return false;
            }
            else
            {
                if($(this).attr("name")!="exam_date")
                {
                    data.push($(this).val());
                }
            }
        });
        // exam_type_pop_model_jess
        const requestOptions = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'My-Custom-Header': 'foobar'
                    },
                    body: JSON.stringify({ type_exam:$("#exam_type_pop_model_jess").val(), status:$("#ESDFRFTGTH").val(),exam_date:$("#list_content #exam_date_model_popup_jess").val(),enquiry_id:'{{ $enquiry->id }}',marks:data })
                };
                fetch('{{ url('api/admin/OnlineExam/Store') }}', requestOptions)
                    .then(response => response.json())
                    .then(data => {
                        if(data.status==1)
                        {
                            var member=window.location.href;
                            var last2 = member.slice(-2);
                            if(last2 != '/3')
                            {
                                window.location.replace(window.location.href += "/3");
                            }
                            else
                            {
                                window.location.replace(window.location.href);
                            }
                        }
                        $.each(data.errors, function($key,$value) {
                            alert($value);
                        });
                    })
                    .catch(error => {
                        console.error('There was an error!', error);
                    });

    }

</script>
@endsection
