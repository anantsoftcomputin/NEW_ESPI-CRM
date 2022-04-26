@extends('layouts.theam')

@section('title')
Edit university
@endsection

@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">{{ __('Edit University') }}</div>
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
                    <form method="POST" action="{{ route('University.update',$university->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            @include('university._edit_form')
                            <div class="col-md-12 text-center">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <a href="{{route('University.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script id="details-template" type="text/x-handlebars-template">
    <div class="row" id="colam_@{{ id }}">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Campus Name</label>
                <input type="text" name="campus_name[]" value="" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="country">Campus Country</label>
                <select name="campus_country[]" class="form-control" required>
                    @forelse ( get_country() as $country)
                        <option value="{{ $country->id }}">{{ ucfirst($country->name) }}</option>
                    @empty
                        <option value="#">No Country Available </option>
                    @endforelse
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Campus Address</label>
                <textarea cols="1" rows="1" name="campus_address[]" value="" class="form-control" required=""></textarea>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="name">Campus Fees</label>
                <input type="text" id="txtnum" onkeypress="return isNumber(event)" name="campus_fees[]" value="" class="form-control">
            </div>
        </div>

        <div class="col-md-1">
            <div class="form-group">
                <label for="name">Remove</label><br>
                <a class='btn btn-danger remove_exp ' id='NAME' data-id="colam_@{{ id }}" onclick="delete_row('colam_@{{ id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </div>
        </div>
    </div>
</script>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var cout=1;
    $("#add_more_campus").click(function(e){
        e.preventDefault();
        var data = {
            'id': cout
        };
        var template = Handlebars.compile($("#details-template").html());
        console.log(template);
        var row = $("#campus_detail");
        row.append(template(data));
        cout=cout+1;
    });

    function delete_row(type)
    {

        $("#"+type).remove();
    }

function isNumber(evt)
  {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
  }

  jQuery(document).delegate('a.delete-record', 'click', function(e) {

     e.preventDefault();
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');

      var targetDiv = jQuery(this).attr('targetDiv');
      var course_requirementid=jQuery('#cr_' + id).val();
      let URL="{{ url('api/admin/university_campus/delete/') }}/"+course_requirementid;
      if(course_requirementid){
         $.ajax(URL,
            {
                dataType: 'json', // type of response data
				success: function (data,status,xhr) {

                }
            }
         );
      }
      $("#campus_row_"+id).remove();
      jQuery('#campus_row_' + id).remove();

    //regnerate index number on table
    return true;
  } else {
    return false;
  }
});

</script>


@endsection
