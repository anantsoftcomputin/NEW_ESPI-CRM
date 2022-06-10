@extends('layouts.theam')

@section('title')
Edit Task
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12">
        <div class="card">
                <div class="card-header">{{ __('Edit Task') }}</div>
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
                        <form method="POST" action="{{ route('task.update',$Task->id) }}">
                        @csrf
                        @method("patch")
                        <div class="row">
                            @include('task._edit_form')
                            <div class="col-md-12 text-center">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <input type="button" class="btn btn-danger" value="{{ __('enquire.cancel_btn_btn') }}">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyAqL3O7-cgoFMxtuknhZRWC-jC3oGfHc9I",
        authDomain: "espi-crm.firebaseapp.com",
        projectId: "espi-crm",
        storageBucket: "espi-crm.appspot.com",
        messagingSenderId: "291781615758",
        appId: "1:291781615758:web:f8ae5478fbfe9983f969df",
        measurementId: "G-T0YPSL5YYH"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        $('#fcm_token').attr("value", "");
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        if($('#notification').prop("checked") == true){
                            console.log("Checkbox is checked.");
                            $("#fcm_token").val(response.token);
                        }
                        else if($('#notification').prop("checked") == false){
                            console.log("Checkbox is unchecked.");
                            $('#fcm_token').attr("value", "");
                        }
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });

            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
     }

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
</script>

