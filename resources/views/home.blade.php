@extends('layouts.theam')

@section('content')

{{-- colum 1 --}}
<style>

#table-wrapper {
  position:relative;
}
#table-scroll {
  height:200px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:100%;

}
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
}

</style>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="row widget-statistic">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                <a href="{{ route('Enquires.index') }}">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-title">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                            <div class="">
                                <p class="w-value">{{ count(\App\Models\Enquiry::all()) }}</p>
                                <h5 class="">Enquiry</h5>
                            </div>
                        </div>
                    </div>
                    
                </a>

                    <div id="table-wrapper">
  <div id="table-scroll">
                    <table id="example" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach  ($Enquiry as $Enquirys)
                    <tr>
                    <td>{{ $Enquirys->name }}</td>
                    <td>{{ $Enquirys->email }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
  </div></div>
                    <!-- <div class="widget-content">
                        <div class="w-chart">
                            <div id="hybrid_followers"></div>
                        </div>
                    </div> -->
                </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
            <a href="{{ route('assessments.index') }}">
            <div class="widget widget-one_hybrid widget-referral">
                <div class="widget-heading">
                    <div class="w-title">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>

                        </div>
                        <div class="">
                            <p class="w-value">{{ count(\App\Models\assessment::all()) }}</p>
                            <h5 class="">Assessment</h5>
                        </div>
                    </div>
                </div>
            </a>
            <div id="table-wrapper">
  <div id="table-scroll">
    <table id="example" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Enquiry Id</th>
                <th>Student Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach  ($assessment as $assessments)
                    <tr>
                    <!-- <td>{{ $assessments->course_id }}</td> -->
                    <td>{{ $assessments->enquiry_id }}</td>
                    <td>{{ $assessments->name }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
  </div>
            </div>

                <!-- <div class="widget-content">
                    <div class="w-chart">
                        <div id="hybrid_followers1"></div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
            <a href="{{ route('Application.index') }}">
                <div class="widget widget-one_hybrid widget-engagement">
                    <div class="widget-heading">
                        <div class="w-title">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            </div>
                            <div class="">
                                <p class="w-value">{{ count(\App\Models\Application::all()) }}</p>
                                <h5 class="">Application</h5>
                            </div>
                        </div>
                    </div>
            </a>

                    <div id="table-wrapper">
  <div id="table-scroll">
                    <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>University</th>

                </tr>
            </thead>
            <tbody>
            @foreach  ($Application as $transaction)
                    <tr>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->currency_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
  </div></div>
                    <!-- <div class="widget-content">
                        <div class="w-chart">
                            <div id="hybrid_followers3"></div>
                        </div>
                    </div> -->
                </div>
        </div>
    </div>
</div>


{{-- colum 2 --}}
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-activity-five">

        <div class="widget-heading">
            <h5 class="">Follow Up</h5>

        </div>

        <div class="widget-content">

            <div class="w-shadow-top"></div>

            <div class="mt-container mx-auto">
                <div class="timeline-line">


                    @foreach (today_follow_up() as $item)
                    {{-- <div class="dropdown-item">
                        <div class="media server-log">
                            <div class="media-body">
                                    <div class="data-info">
                                        <a href='{{ route('detail.nav',$item->enquiry_id) }}/8'><h6 class="">{{ $item->note }} </h6></a>
                                        <p class="">{{ $item->status }}</p>
                                    </div>
                                    <div class="icon-status">
                                        <a href="{{ route('detail.nav',$item->enquiry_id) }}/8">
                                            <svg style="color:#ffff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div> --}}
                    <div class="item-timeline timeline-new">
                        <div class="t-dot">
                            <div class="t-secondary"><svg style="color:#ffff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></div>
                        </div>
                        <div class="t-content">
                            <div class="t-uppercontent">
                                <h5>{{ \Str::limit($item->note,30,'...') }} : <a href="{{ route('detail.nav',$item->enquiry_id) }}/8"><span>{{ $item->status }}</span></a></h5>
                            </div>
                            <p>{{ date('d M Y',strtotime($item->date)) }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="w-shadow-bottom"></div>
        </div>
    </div>
</div>

<div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-three">
        <div class="widget-heading">
            <div class="">
                <h5 class="">Assesment and Applications Summary.</h5>
            </div>

            <div class="dropdown ">
                <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
        </div>

        <div class="widget-content">
            <div id="uniqueVisits"></div>
        </div>
    </div>
</div>

{{-- colum 3 --}}
<div class="di" style="display: none;">
    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-one">
            <div class="widget-heading">
                <h6 class="">Statistics</h6>

                <div class="task-action">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);">View</a>
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-chart">

                <div class="w-chart-section total-visits-content">
                    <div class="w-detail">
                        <p class="w-title">Total Visits</p>
                        <p class="w-stats">423,964</p>
                    </div>
                    <div class="w-chart-render-one">
                        <div id="total-users"></div>
                    </div>
                </div>


                <div class="w-chart-section paid-visits-content">
                    <div class="w-detail">
                        <p class="w-title">Paid Visits</p>
                        <p class="w-stats">7,929</p>
                    </div>
                    <div class="w-chart-render-one">
                        <div id="paid-visits"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-account-invoice-two">
            <div class="widget-content">
                <div class="account-box">
                    <div class="info">
                        <div class="inv-title">
                            <h5 class="">Total Balance</h5>
                        </div>
                        <div class="inv-balance-info">

                            <p class="inv-balance">$ 41,741.42</p>

                            <span class="inv-stats balance-credited">+ 2453</span>

                        </div>
                    </div>
                    <div class="acc-action">
                        <div class="">
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                        </div>
                        <a href="javascript:void(0);">Upgrade</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-header">
                    <div class="w-info">
                        <h6 class="value">Expenses</h6>
                    </div>
                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="w-content">

                    <div class="w-info">
                        <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                    </div>

                </div>

                <div class="w-progress-stats">
                    <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="">
                        <div class="w-icon">
                            <p>57%</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection

@section('css')
<link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" class="dashboard-analytics" />
@endsection

@section('js')

<script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>

<script>
      // Followers
  var array_d_1options3 = JSON.parse("{!! get_Inquiry_charts() !!}");

//     alert(array_d_1options3);
//   console.log(array_d_1options3);

  var d_1options3 = {
    chart: {
      id: 'sparkline1',
      type: 'area',
      height: 160,
      sparkline: {
        enabled: true
      },
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    series: [{
      name: 'Inquiry',
      data: array_d_1options3
    }],
    labels: ['1', '2', '3', '4', '5', '6', '7'],
    yaxis: {
      min: 0
    },
    colors: ['#4361ee'],
    tooltip: {
      x: {
        show: false,
      }
    },
  }

  var d_1C_5 = new ApexCharts(document.querySelector("#hybrid_followers"), d_1options3);
  d_1C_5.render()

  var array_d_1options4 = JSON.parse("{!! Get_Assessment_Charts() !!}");

  var d_1options4 = {
    chart: {
      id: 'sparkline1',
      type: 'area',
      height: 160,
      sparkline: {
        enabled: true
      },
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    series: [{
      name: 'Assessment',
      data: array_d_1options4
    }],
    labels: ['1', '2', '3', '4', '5', '6', '7'],
    yaxis: {
      min: 0
    },
    colors: ['#e7515a'],
    tooltip: {
      x: {
        show: false,
      }
    }
  }

  var d_1C_6 = new ApexCharts(document.querySelector("#hybrid_followers1"), d_1options4);
  d_1C_6.render()



  var array_d_1options5 = JSON.parse("{!! Get_Application_Charts() !!}");


  var d_1options5 = {
    chart: {
      id: 'sparkline1',
      type: 'area',
      height: 160,
      sparkline: {
        enabled: true
      },
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    fill: {
      opacity: 1,
    },
    series: [{
      name: 'Aplication',
      data: array_d_1options5
    }],
    labels: ['1', '2', '3', '4', '5', '6', '7'],
    yaxis: {
      min: 0
    },
    colors: ['#1abc9c'],
    tooltip: {
      x: {
        show: false,
      }
    }
  }

  var d_1C_7 = new ApexCharts(document.querySelector("#hybrid_followers3"), d_1options5);
  d_1C_7.render()

  var assesmenet_summary_chart = JSON.parse("{!! Get_Assessment_Charts() !!}");
var application_summary_chart = JSON.parse("{!! Get_Application_Charts() !!}");

  var d_1options1 = {
    chart: {
      height: 350,
      type: 'line',
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
          horizontal: false,
          columnWidth: '55%',
      },
    },
    legend: {
      offsetX: 0,
      offsetY: -10,
    },
    colors: ['#e75159', '#1abc9c'],

    series: [{
      name: 'Assessment',
      type: 'column',
      data: assesmenet_summary_chart
    }, {
      name: 'Application',
      type: 'line',
      data: application_summary_chart
    }],
    stroke: {
      show: true,
      curve: 'smooth',
      width: [0, 4],
      lineCap: 'square'
    },
    xaxis: {
      categories: ['1', '2', '3', '4', '5', '6', '7'],
    },
    yaxis: [{
      title: {
        text: 'Application',
      },

    }, {
      opposite: true,
      title: {
        text: 'Assessment'
      }
    }],

    responsive: [{
      breakpoint: 576,
      options: {
        yaxis: [{
          title: {
            text: undefined,
          },

        }, {
          opposite: true,
          title: {
            text: undefined
          }
        }],
      },
    }]

  }

  var d_1C_3 = new ApexCharts(
      document.querySelector("#uniqueVisits"),
      d_1options1
  );
  d_1C_3.render();

</script>
@endsection

@section('title')
Home
@endsection