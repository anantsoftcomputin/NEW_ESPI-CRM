
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.svg') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/coming-soon/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
</head>
<body class="coming-soon">

    <div style="display: flex;">
        <img class="mt-3 mb-3" style="width: 300px; margin-right:auto; margin-left:auto;" src="{{ asset('logo.svg') }}" alt="">
    </div>

    <div class="coming-soon-container">
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

                <form method="POST" action="{{ route('join_espi_store',$branch) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @include('enquiry._enquiris_front')
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                            <a href="{{route('Enquires.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.j') }}s"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script>

    $("#country").change(function(){

// $('#state option[value!="0"]').remove();
$(this).val();
let URL="{{ url('api/admin/getState/') }}/"+$(this).val();
$.ajax(URL,
    {
        dataType: 'json', // type of response data
        success: function (data,status,xhr) {   // success callback function

            // $('#state').append($("<option></option>").attr("value", "#").attr("disable", true).text("Select State"));
            $("#state").empty();
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
            $("#city").empty();
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
</body>
</html>
