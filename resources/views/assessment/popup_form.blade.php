<input type="hidden" value="{{ $enquiry }}" name="enquiry_id">
<div class="col-md-4">
    <div class="form-group">
        <label for="selectcountry">Select Country</label>
        <select id="selectcountry" name="country_id[]" onchange="get_university(this)" class="form-control">
            <option value="">Select Country</option>
            @forelse ( get_country() as $uni)
                <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
            @empty
                <option value="#">No Country Available </option>
            @endforelse
        </select>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="selectUniversity_pop">Select University</label>
        <select name="university_id[]" class="form-control university" id="selectUniversity_pop" disabled onchange="get_course(this)">
            <option value="" selected>Select University</option>
            @forelse ( $university as $uni)
                <option value="{{ $uni->id }}">{{ ucfirst($uni->name) }}</option>
            @empty
                <option value="#">No University Avalible </option>
            @endforelse
        </select>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="selectlevel">Select Level</label>
        <select name="level[]" onchange="get_course(this)" class="level form-control" id="selectlevel">
            <option value="">Select Level</option>
            @foreach (get_level() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="col-md-4">
    <div class="form-group">
        <label for="selectcourse_pop">Select Course</label>
        <select name="course_id[]" onchange="get_course_details(this)" class="form-control course" id="selectcourse_pop" disabled>
            <option value="" selected>Select Course</option>
            @forelse ( $course as $city)
                <option value="{{ $city->id }}">{{ ucfirst($city->name) }}</option>
            @empty
                <option value="#">No Course Available </option>
            @endforelse
        </select>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="selectyear">Select Year</label>
        <select name="intact_year_id[]" class="form-control" id="selectyear">
            <option value="1">2021</option>
            <option value="2">2022</option>
            <option value="3">2023</option>
            <option value="4">2024</option>
        </select>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="selectmonth">Select Month</label>
        <select name="intact_month_id[]" class="form-control" id="selectmonth">
            @forelse ($intake as $item_intack)
                <option value="{{ $item_intack->id }}">{{ $item_intack->month }}</option>
            @empty
                <option value="01">Jan</option>
            @endforelse
        </select>
    </div>
</div>



<div class="col-md-4">
    <div class="form-group">
        <label for="selectspecialization">Specialization</label>
        <input type="text" name="specialization[]" class="specialization form-control" id="selectspecialization">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="selectduration">Duration</label>
        <input type="text" name="duration[]" class="duration form-control" id="selectduration">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label for="selectapp_fee">Application Fee</label>
        <input type="number" name="app_fee[]" class="app_fee form-control" id="selectapp_fee">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label for="tution_fee">Tuition Fee</label>
        <input type="number" name="tution_fee[]" class="tution_fee form-control" id="tution_fee">
    </div>
</div>
<div class="col-md-8">
    <div class="form-group">
        <label for="selectapp_course_link">Course Link</label>
        <input type="text" name="course_link[]" class="course_link form-control" id="selectapp_course_link">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="remarks">Remarks</label>
        <textarea name="remarks" class="form-control"></textarea>
    </div>
</div>
<script>
    function get_course_details(ele) {
        var course = $(ele).val();
        let URL = "{{ url('api/admin/getDetailsFromCourse/') }}/" + course;
        $.ajax(URL, {
            dataType: 'json', // type of response data
            success: function(data, status, xhr) { // success callback function
                console.log(data);
                $('.specialization').val(data.specialization);
                $('.course_link').val(data.course_link);
                $('.duration').val(data.duration);
                $('.app_fee').val(data.application_fees);
                $('.tution_fee').val(data.tuition_fees);
            },
            error: function(jqXhr, textStatus, errorMessage) { // error callback
                $('p').append('Error: ' + errorMessage);
            }
        });

    }

    function get_course(ele) {
        var level = $("#selectlevel").val();
        var university = $("#selectUniversity_pop").val();
        let URL = "{{ url('api/admin/getCourseFromLevel/') }}/" + level + '/' + university;
        $.ajax(URL, {
            dataType: 'json', // type of response data
            success: function(data, status, xhr) { // success callback function
                $("#selectcourse_pop").removeAttr("disabled");

                $("#selectcourse_pop")
                    .empty()
                    .append('<option value="">Select Course</option>');


                $.each(data, function(key, value) {
                    $("#selectcourse_pop")
                        .append($("<option></option>")
                            .attr("value", value.id)
                            .text(value.name));
                });

                if (data.length == 0)
                {
                    $('#selectcourse_pop').prop('disabled', true);
                    $("#selectcourse_pop").empty()
                        .append($("<option></option>")
                        .attr("value", '')
                        .text("No Course Avalable"));
                }
            },
            error: function(jqXhr, textStatus, errorMessage) { // error callback
                $('p').append('Error: ' + errorMessage);
            }
        });
    }

    function get_university(ele) {
        var country = $(ele).val();
        let URL = "{{ url('api/admin/getUniversityFromCountry/') }}/" + country;
        $.ajax(URL, {
            dataType: 'json', // type of response data
            success: function(data, status, xhr) { // success callback function
                $("#selectUniversity_pop").removeAttr("disabled");

                $("#selectUniversity_pop")
                    .empty()
                    .append('<option value="">Select University</option>');


                $.each(data, function(key, value) {
                    console.log(value);
                    $("#selectUniversity_pop")
                        .append($("<option></option>")
                            .attr("value", value.id)
                            .text(value.name));
                });

                if (data.length == 0)
                    {
                        $('#selectUniversity_pop').prop('disabled', true);

                        $("#selectUniversity_pop").empty()
                            .append($("<option></option>")
                            .attr("value", '')
                            .text("No University Avalable"));
                    }
            },
            error: function(jqXhr, textStatus, errorMessage) { // error callback
                $('p').append('Error: ' + errorMessage);
            }
        });
    }

    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'rec-' + size);
        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
    });

    jQuery(document).delegate('a.delete-record', 'click', function(e) {
        e.preventDefault();
        var didConfirm = confirm("Are you sure You want to delete");
        if (didConfirm == true) {
            var id = jQuery(this).attr('data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();
            $('#tbl_posts_body tr').each(function(index) {
                $(this).find('span.sn').html(index + 1);
            });
            return true;
        } else {
            return false;
        }
    });
</script>
