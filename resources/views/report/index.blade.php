@extends('layouts.theam')

@section('title')
Reports
@endsection

@section('css')
<link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" class="dashboard-analytics" />
@endsection

@section('js')

<script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>

@endsection



@section('content')
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
                        <p class="w-title">Total Inquiry</p>
                        <p class="w-stats">423,964</p>
                    </div>
                    <div class="w-chart-render-one" style="position: relative;">
                        <div id="total-users">
                        </div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 228px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
                </div>


                <div class="w-chart-section paid-visits-content">
                    <div class="w-detail">
                        <p class="w-title">Paid Applicaton</p>
                        <p class="w-stats">7,929</p>
                    </div>
                    <div class="w-chart-render-one" style="position: relative;">
                        <div id="paid-visits" style="min-height: 58px;"></div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 228px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
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
                            <h6 class="text-white">Total Balance of Inquiry</h6>
                        </div>
                        <div class="inv-balance-info">

                            <p class="inv-balance">$ 41,741.42</p>

                            <span class="inv-stats balance-credited">+ 2453 Enquiry</span>

                        </div>
                    </div>
                    <div class="acc-action">
                        <div class="">
                            {{-- <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a> --}}
                            {{-- <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a> --}}
                        </div>
                        <a href="javascript:void(0);">Refresh</a>
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


    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-four">
            <div class="widget-heading">
                <h5 class="">Enquiry by Agent</h5>
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6>Espi Agent</h6>
                                <p class="browser-count">65%</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                        </div>
                        <div class="w-browser-details">

                            <div class="w-browser-info">
                                <h6>ESPI Main</h6>
                                <p class="browser-count">25%</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        </div>
                        <div class="w-browser-details">

                            <div class="w-browser-info">
                                <h6>Anonymous User</h6>
                                <p class="browser-count">15%</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>



    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row widget-statistic">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-title">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <div class="">
                                <p class="w-value">31.6K</p>
                                <h5 class="">Followers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="w-chart" style="position: relative;">
                            <div id="hybrid_followers" style="min-height: 160px;"><div id="apexchartstcqebh1n" class="apexcharts-canvas apexchartstcqebh1n light" style="width: 363px; height: 160px;"><svg id="SvgjsSvg1524" width="363" height="160" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1526" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1525"><clipPath id="gridRectMasktcqebh1n"><rect id="SvgjsRect1530" width="365" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMasktcqebh1n"><rect id="SvgjsRect1531" width="365" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1537" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1538" stop-opacity="0.65" stop-color="rgba(67,97,238,0.65)" offset="0"></stop><stop id="SvgjsStop1539" stop-opacity="0.5" stop-color="rgba(161,176,247,0.5)" offset="1"></stop><stop id="SvgjsStop1540" stop-opacity="0.5" stop-color="rgba(161,176,247,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1529" x1="0" y1="0" x2="0" y2="160" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="160" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1543" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1544" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1547" class="apexcharts-grid"><line id="SvgjsLine1549" x1="0" y1="160" x2="363" y2="160" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1548" x1="0" y1="1" x2="0" y2="160" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1533" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1534" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-area-0" d="M 0 160L 0 61.29870129870129C 21.174999999999997 61.29870129870129 39.325 4.155844155844136 60.5 4.155844155844136C 81.675 4.155844155844136 99.825 61.29870129870129 121 61.29870129870129C 142.175 61.29870129870129 160.325 24.93506493506493 181.5 24.93506493506493C 202.675 24.93506493506493 220.825 66.49350649350649 242 66.49350649350649C 263.175 66.49350649350649 281.325 56.10389610389609 302.5 56.10389610389609C 323.675 56.10389610389609 341.825 87.27272727272727 363 87.27272727272727C 363 87.27272727272727 363 87.27272727272727 363 160M 363 87.27272727272727z" fill="url(#SvgjsLinearGradient1537)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasktcqebh1n)" pathTo="M 0 160L 0 61.29870129870129C 21.174999999999997 61.29870129870129 39.325 4.155844155844136 60.5 4.155844155844136C 81.675 4.155844155844136 99.825 61.29870129870129 121 61.29870129870129C 142.175 61.29870129870129 160.325 24.93506493506493 181.5 24.93506493506493C 202.675 24.93506493506493 220.825 66.49350649350649 242 66.49350649350649C 263.175 66.49350649350649 281.325 56.10389610389609 302.5 56.10389610389609C 323.675 56.10389610389609 341.825 87.27272727272727 363 87.27272727272727C 363 87.27272727272727 363 87.27272727272727 363 160M 363 87.27272727272727z" pathFrom="M -1 160L -1 160L 60.5 160L 121 160L 181.5 160L 242 160L 302.5 160L 363 160"></path><path id="apexcharts-area-0" d="M 0 61.29870129870129C 21.174999999999997 61.29870129870129 39.325 4.155844155844136 60.5 4.155844155844136C 81.675 4.155844155844136 99.825 61.29870129870129 121 61.29870129870129C 142.175 61.29870129870129 160.325 24.93506493506493 181.5 24.93506493506493C 202.675 24.93506493506493 220.825 66.49350649350649 242 66.49350649350649C 263.175 66.49350649350649 281.325 56.10389610389609 302.5 56.10389610389609C 323.675 56.10389610389609 341.825 87.27272727272727 363 87.27272727272727" fill="none" fill-opacity="1" stroke="#4361ee" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasktcqebh1n)" pathTo="M 0 61.29870129870129C 21.174999999999997 61.29870129870129 39.325 4.155844155844136 60.5 4.155844155844136C 81.675 4.155844155844136 99.825 61.29870129870129 121 61.29870129870129C 142.175 61.29870129870129 160.325 24.93506493506493 181.5 24.93506493506493C 202.675 24.93506493506493 220.825 66.49350649350649 242 66.49350649350649C 263.175 66.49350649350649 281.325 56.10389610389609 302.5 56.10389610389609C 323.675 56.10389610389609 341.825 87.27272727272727 363 87.27272727272727" pathFrom="M -1 160L -1 160L 60.5 160L 121 160L 181.5 160L 242 160L 302.5 160L 363 160"></path><g id="SvgjsG1535" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1555" r="0" cx="0" cy="0" class="apexcharts-marker we8d95k6t no-pointer-events" stroke="#ffffff" fill="#4361ee" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1536" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1550" x1="0" y1="0" x2="363" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1551" x1="0" y1="0" x2="363" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1552" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1553" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1554" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1528" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1545" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1546" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(67, 97, 238);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 364px; height: 161px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                <div class="widget widget-one_hybrid widget-referral">
                    <div class="widget-heading">
                        <div class="w-title">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                            </div>
                            <div class="">
                                <p class="w-value">1,900</p>
                                <h5 class="">Referral</h5>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="w-chart" style="position: relative;">
                            <div id="hybrid_followers1" style="min-height: 160px;"><div id="apexchartsb59zyxiw" class="apexcharts-canvas apexchartsb59zyxiw light" style="width: 363px; height: 160px;"><svg id="SvgjsSvg1559" width="363" height="160" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1561" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1560"><clipPath id="gridRectMaskb59zyxiw"><rect id="SvgjsRect1565" width="365" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskb59zyxiw"><rect id="SvgjsRect1566" width="365" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1572" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1573" stop-opacity="0.65" stop-color="rgba(231,81,90,0.65)" offset="0"></stop><stop id="SvgjsStop1574" stop-opacity="0.5" stop-color="rgba(243,168,173,0.5)" offset="1"></stop><stop id="SvgjsStop1575" stop-opacity="0.5" stop-color="rgba(243,168,173,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1564" x1="0" y1="0" x2="0" y2="160" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="160" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1578" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1579" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1582" class="apexcharts-grid"><line id="SvgjsLine1584" x1="0" y1="160" x2="363" y2="160" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1583" x1="0" y1="1" x2="0" y2="160" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1568" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1569" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-area-0" d="M 0 160L 0 4.155844155844136C 21.174999999999997 4.155844155844136 39.325 87.27272727272727 60.5 87.27272727272727C 81.675 87.27272727272727 99.825 24.93506493506493 121 24.93506493506493C 142.175 24.93506493506493 160.325 61.29870129870129 181.5 61.29870129870129C 202.675 61.29870129870129 220.825 56.10389610389609 242 56.10389610389609C 263.175 56.10389610389609 281.325 66.49350649350649 302.5 66.49350649350649C 323.675 66.49350649350649 341.825 61.29870129870129 363 61.29870129870129C 363 61.29870129870129 363 61.29870129870129 363 160M 363 61.29870129870129z" fill="url(#SvgjsLinearGradient1572)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskb59zyxiw)" pathTo="M 0 160L 0 4.155844155844136C 21.174999999999997 4.155844155844136 39.325 87.27272727272727 60.5 87.27272727272727C 81.675 87.27272727272727 99.825 24.93506493506493 121 24.93506493506493C 142.175 24.93506493506493 160.325 61.29870129870129 181.5 61.29870129870129C 202.675 61.29870129870129 220.825 56.10389610389609 242 56.10389610389609C 263.175 56.10389610389609 281.325 66.49350649350649 302.5 66.49350649350649C 323.675 66.49350649350649 341.825 61.29870129870129 363 61.29870129870129C 363 61.29870129870129 363 61.29870129870129 363 160M 363 61.29870129870129z" pathFrom="M -1 160L -1 160L 60.5 160L 121 160L 181.5 160L 242 160L 302.5 160L 363 160"></path><path id="apexcharts-area-0" d="M 0 4.155844155844136C 21.174999999999997 4.155844155844136 39.325 87.27272727272727 60.5 87.27272727272727C 81.675 87.27272727272727 99.825 24.93506493506493 121 24.93506493506493C 142.175 24.93506493506493 160.325 61.29870129870129 181.5 61.29870129870129C 202.675 61.29870129870129 220.825 56.10389610389609 242 56.10389610389609C 263.175 56.10389610389609 281.325 66.49350649350649 302.5 66.49350649350649C 323.675 66.49350649350649 341.825 61.29870129870129 363 61.29870129870129" fill="none" fill-opacity="1" stroke="#e7515a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskb59zyxiw)" pathTo="M 0 4.155844155844136C 21.174999999999997 4.155844155844136 39.325 87.27272727272727 60.5 87.27272727272727C 81.675 87.27272727272727 99.825 24.93506493506493 121 24.93506493506493C 142.175 24.93506493506493 160.325 61.29870129870129 181.5 61.29870129870129C 202.675 61.29870129870129 220.825 56.10389610389609 242 56.10389610389609C 263.175 56.10389610389609 281.325 66.49350649350649 302.5 66.49350649350649C 323.675 66.49350649350649 341.825 61.29870129870129 363 61.29870129870129" pathFrom="M -1 160L -1 160L 60.5 160L 121 160L 181.5 160L 242 160L 302.5 160L 363 160"></path><g id="SvgjsG1570" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1590" r="0" cx="0" cy="0" class="apexcharts-marker w5j0nrq47 no-pointer-events" stroke="#ffffff" fill="#e7515a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1571" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1585" x1="0" y1="0" x2="363" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1586" x1="0" y1="0" x2="363" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1587" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1588" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1589" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1563" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1580" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1581" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(231, 81, 90);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 364px; height: 161px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                <div class="widget widget-one_hybrid widget-engagement">
                    <div class="widget-heading">
                        <div class="w-title">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                            </div>
                            <div class="">
                                <p class="w-value">18.2%</p>
                                <h5 class="">Engagement</h5>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="w-chart" style="position: relative;">
                            <div id="hybrid_followers3" style="min-height: 160px;"><div id="apexchartsnv9bol9m" class="apexcharts-canvas apexchartsnv9bol9m light" style="width: 363px; height: 160px;"><svg id="SvgjsSvg1594" width="363" height="160" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1596" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1595"><clipPath id="gridRectMasknv9bol9m"><rect id="SvgjsRect1600" width="365" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMasknv9bol9m"><rect id="SvgjsRect1601" width="365" height="162" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1607" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1608" stop-opacity="0.65" stop-color="rgba(26,188,156,0.65)" offset="0"></stop><stop id="SvgjsStop1609" stop-opacity="0.5" stop-color="rgba(141,222,206,0.5)" offset="1"></stop><stop id="SvgjsStop1610" stop-opacity="0.5" stop-color="rgba(141,222,206,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1599" x1="0" y1="0" x2="0" y2="160" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="160" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1613" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1614" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1617" class="apexcharts-grid"><line id="SvgjsLine1619" x1="0" y1="160" x2="363" y2="160" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1618" x1="0" y1="1" x2="0" y2="160" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1603" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1604" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-area-0" d="M 0 160L 0 87.27272727272727C 21.174999999999997 87.27272727272727 39.325 30.129870129870113 60.5 30.129870129870113C 81.675 30.129870129870113 99.825 66.49350649350649 121 66.49350649350649C 142.175 66.49350649350649 160.325 4.155844155844136 181.5 4.155844155844136C 202.675 4.155844155844136 220.825 61.29870129870129 242 61.29870129870129C 263.175 61.29870129870129 281.325 24.93506493506493 302.5 24.93506493506493C 323.675 24.93506493506493 341.825 61.29870129870129 363 61.29870129870129C 363 61.29870129870129 363 61.29870129870129 363 160M 363 61.29870129870129z" fill="url(#SvgjsLinearGradient1607)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasknv9bol9m)" pathTo="M 0 160L 0 87.27272727272727C 21.174999999999997 87.27272727272727 39.325 30.129870129870113 60.5 30.129870129870113C 81.675 30.129870129870113 99.825 66.49350649350649 121 66.49350649350649C 142.175 66.49350649350649 160.325 4.155844155844136 181.5 4.155844155844136C 202.675 4.155844155844136 220.825 61.29870129870129 242 61.29870129870129C 263.175 61.29870129870129 281.325 24.93506493506493 302.5 24.93506493506493C 323.675 24.93506493506493 341.825 61.29870129870129 363 61.29870129870129C 363 61.29870129870129 363 61.29870129870129 363 160M 363 61.29870129870129z" pathFrom="M -1 160L -1 160L 60.5 160L 121 160L 181.5 160L 242 160L 302.5 160L 363 160"></path><path id="apexcharts-area-0" d="M 0 87.27272727272727C 21.174999999999997 87.27272727272727 39.325 30.129870129870113 60.5 30.129870129870113C 81.675 30.129870129870113 99.825 66.49350649350649 121 66.49350649350649C 142.175 66.49350649350649 160.325 4.155844155844136 181.5 4.155844155844136C 202.675 4.155844155844136 220.825 61.29870129870129 242 61.29870129870129C 263.175 61.29870129870129 281.325 24.93506493506493 302.5 24.93506493506493C 323.675 24.93506493506493 341.825 61.29870129870129 363 61.29870129870129" fill="none" fill-opacity="1" stroke="#1abc9c" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasknv9bol9m)" pathTo="M 0 87.27272727272727C 21.174999999999997 87.27272727272727 39.325 30.129870129870113 60.5 30.129870129870113C 81.675 30.129870129870113 99.825 66.49350649350649 121 66.49350649350649C 142.175 66.49350649350649 160.325 4.155844155844136 181.5 4.155844155844136C 202.675 4.155844155844136 220.825 61.29870129870129 242 61.29870129870129C 263.175 61.29870129870129 281.325 24.93506493506493 302.5 24.93506493506493C 323.675 24.93506493506493 341.825 61.29870129870129 363 61.29870129870129" pathFrom="M -1 160L -1 160L 60.5 160L 121 160L 181.5 160L 242 160L 302.5 160L 363 160"></path><g id="SvgjsG1605" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1625" r="0" cx="0" cy="0" class="apexcharts-marker w82j5j9m1 no-pointer-events" stroke="#ffffff" fill="#1abc9c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1606" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1620" x1="0" y1="0" x2="363" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1621" x1="0" y1="0" x2="363" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1622" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1623" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1624" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1598" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1615" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1616" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(26, 188, 156);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 364px; height: 161px;"></div></div><div class="contract-trigger"></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-one">
            <div class="widget-content">

                <div class="media">
                    <div class="w-img">
                        <img src="https://designreset.com/cork/ltr/demo9/assets/img/profile-19.jpeg" alt="avatar">
                    </div>
                    <div class="media-body">
                        <h6>Jimmy Turner</h6>
                        <p class="meta-date-time">Monday, Nov 18</p>
                    </div>
                </div>

                <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>

                <div class="w-action">
                    <div class="card-like">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                        <span>551 Likes</span>
                    </div>

                    <div class="read-more">
                        <a href="javascript:void(0);">Read More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-two">
            <div class="widget-content">

                <div class="media">
                    <div class="w-img">
                        <img src="https://designreset.com/cork/ltr/demo9/assets/img/g-8.png" alt="avatar">
                    </div>
                    <div class="media-body">
                        <h6>Dev Summit - New York</h6>
                        <p class="meta-date-time">Bronx, NY</p>
                    </div>
                </div>

                <div class="card-bottom-section">
                    <h5>4 Members Going</h5>
                    <div class="img-group">
                        <img src="https://designreset.com/cork/ltr/demo9/assets/img/profile-19.jpeg" alt="avatar">
                        <img src="https://designreset.com/cork/ltr/demo9/assets/img/profile-6.jpeg" alt="avatar">
                        <img src="https://designreset.com/cork/ltr/demo9/assets/img/profile-8.jpeg" alt="avatar">
                        <img src="https://designreset.com/cork/ltr/demo9/assets/img/profile-3.jpeg" alt="avatar">
                    </div>
                    <a href="javascript:void(0);" class="btn">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-five">

            <div class="widget-heading">

                <a href="javascript:void(0)" class="task-info">

                    <div class="usr-avatar">
                        <span>FD</span>
                    </div>

                    <div class="w-title">

                        <h5>Figma Design</h5>
                        <span>Design Reset</span>

                    </div>

                </a>

                <div class="task-action">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);">View Project</a>
                            <a class="dropdown-item" href="javascript:void(0);">Edit Project</a>
                            <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="widget-content">

                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                <div class="progress-data">

                    <div class="progress-info">
                        <div class="task-count"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg><p>5 Tasks</p></div>
                        <div class="progress-stats"><p>86.2%</p></div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>

                <div class="meta-info">

                    <div class="due-time">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 3 Days Left</p>
                    </div>


                    <div class="avatar--group">

                        <div class="avatar translateY-axis more-group">
                            <span class="avatar-title">+6</span>
                        </div>
                        <div class="avatar translateY-axis">
                            <img alt="avatar" src="https://designreset.com/cork/ltr/demo9/assets/img/profile-8.jpeg">
                        </div>
                        <div class="avatar translateY-axis">
                            <img alt="avatar" src="https://designreset.com/cork/ltr/demo9/assets/img/profile-12.jpeg">
                        </div>
                        <div class="avatar translateY-axis">
                            <img alt="avatar" src="https://designreset.com/cork/ltr/demo9/assets/img/profile-19.jpeg">
                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>
@endsection
