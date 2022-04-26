{{-- @component('mail::message')
# New Assesment Added
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

</style>

@component('mail::table')
| Country       | University         | Course  | Deail |
| ------------- |:-------------:| :--------:| --------:|
@foreach ($assessments as $item)
| {{ $item->University->Country->name }} | {{ $item->University->name }} |{{ $item->Course->name }}| [ Show ]({{ $item->Course->course_link."?target=_blank" ?? "#" }})|
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}


<!doctype html>
<html lang="en-US">

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>Notifications Email Template</title>
  <meta name="description" content="Notifications Email Template">
  <style type="text/css">
    a:hover {text-decoration: none !important;}
    :focus {outline: none;border: 0;}
  </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" bgcolor="#eaeeef"
  leftmargin="0">
  <!--100% body table-->
  <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
    <tr>
      <td>
        <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center"
          cellpadding="0" cellspacing="0">
          <tr>
            <td style="height:80px;">&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align:center;">
              <a href="https://espicrm.com" title="logo" target="_blank">
                <img width="120" src="https://espicrm.com/logo.svg" title="logo" alt="logo">
              </a>
            </td>
          </tr>
          <tr>
            <td height="20px;">&nbsp;</td>
          </tr>
          <tr>
            <td>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                style="max-width:600px; background:#fff; border-radius:3px; text-align:left;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                <tr>
                  <td style="padding:40px;">
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                            <h2>
                                Dear {{ $details->name }}
                            </h2>
                            <br>
                            <h4>
                                <strong>
                                    Greeting from ESPI !!!
                                </strong>
                                <br>
                                <br>
                                Please find the programs and colleges list and availability of programs.
                            </h4>
                            <hr>

                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

                            @foreach ($assessments as $item)
                                <tr style="border-bottom:1px solid #ebebeb; margin-bottom:26px; padding-bottom:29px; display:block;">
                                    <td style="vertical-align:top;">
                                    <h3 style="color: #4d4d4d; font-size: 20px; font-weight: 400; line-height: 30px; margin-bottom: 3px; margin-top:0;">
                                        <strong> {{ $item->University->name }} </strong> ( {{ $item->University->Country->name }} ) </h3>
                                        <span style="color:#737373; font-size:14px;"> <strong> Course : </strong>{{ $item->Course->name }}</span>
                                        <br>
                                        <span style="color:#757575; font-size:14px;"> <strong> Intake : </strong> {{ $item->IntactMonth->month }} / {{ $item->IntactMonth->year }} </span>
                                        <br>
                                        <span style="color:#757575; font-size:14px;"> <strong> Specialization : </strong> {{ $item->specialization ?? 'Not Specific' }} </span>
                                        <br>
                                        <span style="color:#757575; font-size:14px;"> <strong> Duration : </strong> {{ $item->duration }} </span>
                                        <br>
                                        @if ($item->campus)
                                        <span style="color:#757575; font-size:14px;"> <strong> Campus : </strong> {{ $item->campus }} </span>
                                        <br>
                                        @endif
                                        <span style="color:#757575; font-size:14px;"> <strong> Fees : </strong> {{ $item->app_fee }} </span>
                                        <br>
                                        <span style="color:#757575; font-size:14px;"> <strong> Level: </strong> {{ $item->level }} </span>
                                        <br>
                                        <span style="color:#757575; font-size:14px;"> <strong> Remarks: </strong> {{ $item->remarks }} </span>
                                        <br>
                                        @if ($item->program_link)
                                            <span style="color:#757575; font-size:14px;"> <strong> Link: </strong> {{ $item->program_link }} </span>
                                            <br>
                                            <a href="{{ $item->program_link }}" target="_blank">View in Detail</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                          </table>
                          <pre>
                              Thank You
                              Shweta 

                              ESPI Visa Consultants  Pvt. Ltd.
                              202/203, Galav Chambers, Nr.Sardar Statue
                              Sayajigunj, Vadodara, Gujarat 390005
                              +91-7574866577
                          </pre>
                        </td>
                      </tr>
                    </table>
                  </td>

                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="height:25px;">
              </td>

              {{-- <td style="height:25px;">&nbsp;</td> --}}
          </tr>
          <tr>
            <td style="height:80px;">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--/100% body table-->
</body>

</html>
