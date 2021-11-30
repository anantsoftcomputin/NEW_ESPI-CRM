@extends('layouts.theam')

@section('title')
    Add Enquiry
@endsection


@section('js')
@endsection

@section('css')
@endsection

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
    <div class="widget widget-content-area br-4">
        <div class="widget-one">
            <div class="p-1">
                <h5>
                    Student Name : {{ $enquiry->name }}
                </h5>
                <h5>
                    Email : {{ $enquiry->email }}
                </h5>
                <h5>
                    Phone : {{ $enquiry->phone }}
                </h5>
                <hr>
            </div>
            <div class="col-md-12">
                <ul class="nav nav-tabs mt-3" id="border-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="border-summary-tab" data-toggle="tab" href="#border-summary" role="tab" aria-controls="border-summary" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg> Summary
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-detail-tab" data-toggle="tab" href="#border-detail" role="tab" aria-controls="border-detail" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Detail
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-update-tab" data-toggle="tab" href="#border-update" role="tab" aria-controls="border-update" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg> Update
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-assessment-tab" data-toggle="tab" href="#border-assessment" role="tab" aria-controls="border-assessment" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/sv" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg> Assessment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-apllication-tab" data-toggle="tab" href="#border-apllication" role="tab" aria-controls="border-apllication" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Application
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-document-tab" data-toggle="tab" href="#border-document" role="tab" aria-controls="border-document" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Document
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-comment-tab" data-toggle="tab" href="#border-comment" role="tab" aria-controls="border-comment" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Comment
                        </a>
                    </li>
                </ul>
                <div class="tab-content mb-4" id="border-tabsContent" style="border-bottom: 0.5px solid #dee2e6; border-right: 0.5px solid #dee2e6; border-left: 0.5px solid #dee2e6;">
                    <div class="tab-pane fade show active" id="border-summary" role="tabpanel" aria-labelledby="border-summary-tab">
                        @include('enquiry.detail_ui.summary')
                    </div>
                    <div class="tab-pane fade" id="border-detail" role="tabpanel" aria-labelledby="border-detail-tab">
                        @include('enquiry.detail_ui.detail')
                    </div>
                    <div class="tab-pane fade" id="border-update" role="tabpanel" aria-labelledby="border-update-tab">
                        @include('enquiry.detail_ui.update')
                    </div>
                    <div class="tab-pane fade" id="border-assessment" role="tabpanel" aria-labelledby="border-assessment-tab">
                        @include('enquiry.detail_ui.assessment')
                    </div>
                    <div class="tab-pane fade" id="border-apllication" role="tabpanel" aria-labelledby="border-apllication-tab">
                        @include('enquiry.detail_ui.aplication')
                    </div>
                    <div class="tab-pane fade" id="border-document" role="tabpanel" aria-labelledby="border-document-tab">
                        @include('enquiry.detail_ui.document')
                   </div>
                    <div class="tab-pane fade" id="border-service" role="tabpanel" aria-labelledby="border-service-tab">
                        @include('enquiry.detail_ui.service')
                   </div>
                    <div class="tab-pane fade" id="border-comment" role="tabpanel" aria-labelledby="border-comment-tab">
                        @include('enquiry.detail_ui.comment')
                   </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
