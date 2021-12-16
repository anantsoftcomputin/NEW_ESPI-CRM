
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

<div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
    <hr>
    <p class="lead">Store you UniqId <strong>{{ $enq->enquiry_id }}</strong> for further reference.</p>
    <hr>
    <p>
      Having trouble? <a href="">Contact us</a>
    </p>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="{{ route('join_espi',$branch) }}" role="button">Continue to homepage</a>
    </p>
  </div>

  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('bootstrap/js/popper.min.j') }}s"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
