@extends('layouts.theam')

@section('title')
    Add Enquiry
@endsection


@section('js')
@endsection

@section('css')
<link href="{{ asset('assets/css/components/timeline/custom-timeline.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<style>
    .nav-link
    {
        color: #4362ee;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active
    {
        color: #4362ee;
    }
</style>
<div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

    <div class="widget widget-content-area br-4">
        <div class="widget-one">
            <div class="p-1">
                <h5>
                    Student Name : {{ $enquiry->name }}
                    @if ($enquiry->Details->is_conform==1)
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success bs-tooltip" title="Approved Profile."><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    @endif
                </h5>
                <h5>
                    Email : {{ $enquiry->email }}
                </h5>
                <h5>
                    Phone : {{ $enquiry->phone }}
                </h5>
                <h5>
                    Enquiry : {{ $enquiry->enquiry_id }}
                </h5>
                @if ($enquiry->Details->is_conform==0)
                <div class="text-right">
                    <a href="{{ route('detail.conform_document',$enquiry->id) }}" class="btn btn-success mb-4 mr-2 btn-lg">Verify Profile <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check mb-1"><polyline points="20 6 9 17 4 12"></polyline></svg></a>
                </div>
                @endif
                <hr>
            </div>
            <div class="col-md-12">
                <ul class="nav nav-tabs mt-3" id="border-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link  @if($active=='1') active @endif" id="border-summary-tab" data-toggle="tab" href="#border-summary" role="tab" aria-controls="border-summary" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg> Details
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link @if($active=='2') active @endif" id="border-detail-tab" data-toggle="tab" href="#border-detail" role="tab" aria-controls="border-detail" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Detail
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link @if($active=='3') active @endif" id="border-update-tab" data-toggle="tab" href="#border-update" role="tab" aria-controls="border-update" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg> Update
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active=='4') active @endif" id="border-assessment-tab" data-toggle="tab" href="#border-assessment" role="tab" aria-controls="border-assessment" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/sv" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg> Assessment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active=='5') active @endif" id="border-apllication-tab" data-toggle="tab" href="#border-apllication" role="tab" aria-controls="border-apllication" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Application
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active=='6') active @endif" id="border-document-tab" data-toggle="tab" href="#border-document" role="tab" aria-controls="border-document" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Document
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if($active=='7') active @endif" href="{{ route('detail.nav',['Enquire' => $enquiry->id ,'Active'=>'7']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Comment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active=='8') active @endif" href="{{ route('detail.nav',['Enquire' => $enquiry->id ,'Active'=>'8']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-merge"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M6 21V9a9 9 0 0 0 9 9"></path></svg> Follow Up
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active=='9') active @endif" id="border-transaction-tab" data-toggle="tab" href="#border-transaction" role="tab" aria-controls="border-transaction" aria-selected="false">
                            <svg style="height: 20px;" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg3611" sodipodi:docname="Indian_Rupee_symbol.svg" viewBox="0 0 169.76 250.39" version="1.1" inkscape:version="0.47 r22583" > <sodipodi:namedview id="base"  inkscape:pageshadow="2" inkscape:window-y="-4" pagecolor="#ffffff" inkscape:window-height="712" inkscape:window-maximized="1" inkscape:zoom="5.3091607" inkscape:window-x="-4" showgrid="false" borderopacity="1.0" inkscape:current-layer="layer1" inkscape:cx="94.062924" inkscape:cy="212.24797" inkscape:window-width="1280" inkscape:pageopacity="0.0" inkscape:document-units="px"/> <g id="layer1" inkscape:label="Layer 1" inkscape:groupmode="layer" transform="translate(0 -801.97)" > <path id="path4158" sodipodi:nodetypes="cccccccccccccccccccc" style="" d="m99.017 1052.3-90.577-113.33 0.5232-22.46c42.51 2.93 75.559-1.57 83.248-41.78l-90.578-0.52 14.66-24.55 72.253 1.04c-11.009-22.88-41.286-25.7-88.484-24.02l16.231-24.03 153.41-0.22927-15.184 23.731h-42.409c7.7512 8.1823 13.424 17.597 13.613 25.591l43.98-0.52226-15.184 23.502-29.32 0.52229c-4.5772 35.058-36.787 55.815-77.489 60.584l91.184 116.44-39.874 0.022v0.0004z"/> </g > <metadata > <rdf:RDF > <cc:Work > <dc:format >image/svg+xml</dc:format > <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/> <cc:license rdf:resource="http://creativecommons.org/licenses/publicdomain/"/> <dc:publisher > <cc:Agent rdf:about="http://openclipart.org/" > <dc:title >Openclipart</dc:title > </cc:Agent > </dc:publisher > <dc:title >Indian Rupee Symbol</dc:title > <dc:date >2010-07-23T08:59:26</dc:date > <dc:description >The clipart was generated as draft based on the Symbol of Indian Rupee approved by the Union Cabinet on 15 July 2010. The Design for the symbol was submitted by D Udaya Kumar.&#13;\nSource :http://pib.nic.in/archieve/others/2010/jul/d2010071501.pdf</dc:description > <dc:source >https://openclipart.org/detail/74431/indian-rupee-symbol-by-netalloy</dc:source > <dc:creator > <cc:Agent > <dc:title >netalloy</dc:title > </cc:Agent > </dc:creator > <dc:subject > <rdf:Bag > <rdf:li >Indian Rupee Symbol</rdf:li > </rdf:Bag > </dc:subject > </cc:Work > <cc:License rdf:about="http://creativecommons.org/licenses/publicdomain/" > <cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction"/> <cc:permits rdf:resource="http://creativecommons.org/ns#Distribution"/> <cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks"/> </cc:License > </rdf:RDF > </metadata ></svg> Transaction
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($active=='10') active @endif" id="border-transactioncard-tab" data-toggle="tab" href="#border-transactioncard" role="tab" aria-controls="border-transactioncard" aria-selected="false">
                            <svg style="height: 20px;" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg3611" sodipodi:docname="Indian_Rupee_symbol.svg" viewBox="0 0 169.76 250.39" version="1.1" inkscape:version="0.47 r22583" > <sodipodi:namedview id="base"  inkscape:pageshadow="2" inkscape:window-y="-4" pagecolor="#ffffff" inkscape:window-height="712" inkscape:window-maximized="1" inkscape:zoom="5.3091607" inkscape:window-x="-4" showgrid="false" borderopacity="1.0" inkscape:current-layer="layer1" inkscape:cx="94.062924" inkscape:cy="212.24797" inkscape:window-width="1280" inkscape:pageopacity="0.0" inkscape:document-units="px"/> <g id="layer1" inkscape:label="Layer 1" inkscape:groupmode="layer" transform="translate(0 -801.97)" > <path id="path4158" sodipodi:nodetypes="cccccccccccccccccccc" style="" d="m99.017 1052.3-90.577-113.33 0.5232-22.46c42.51 2.93 75.559-1.57 83.248-41.78l-90.578-0.52 14.66-24.55 72.253 1.04c-11.009-22.88-41.286-25.7-88.484-24.02l16.231-24.03 153.41-0.22927-15.184 23.731h-42.409c7.7512 8.1823 13.424 17.597 13.613 25.591l43.98-0.52226-15.184 23.502-29.32 0.52229c-4.5772 35.058-36.787 55.815-77.489 60.584l91.184 116.44-39.874 0.022v0.0004z"/> </g > <metadata > <rdf:RDF > <cc:Work > <dc:format >image/svg+xml</dc:format > <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/> <cc:license rdf:resource="http://creativecommons.org/licenses/publicdomain/"/> <dc:publisher > <cc:Agent rdf:about="http://openclipart.org/" > <dc:title >Openclipart</dc:title > </cc:Agent > </dc:publisher > <dc:title >Indian Rupee Symbol</dc:title > <dc:date >2010-07-23T08:59:26</dc:date > <dc:description >The clipart was generated as draft based on the Symbol of Indian Rupee approved by the Union Cabinet on 15 July 2010. The Design for the symbol was submitted by D Udaya Kumar.&#13;\nSource :http://pib.nic.in/archieve/others/2010/jul/d2010071501.pdf</dc:description > <dc:source >https://openclipart.org/detail/74431/indian-rupee-symbol-by-netalloy</dc:source > <dc:creator > <cc:Agent > <dc:title >netalloy</dc:title > </cc:Agent > </dc:creator > <dc:subject > <rdf:Bag > <rdf:li >Indian Rupee Symbol</rdf:li > </rdf:Bag > </dc:subject > </cc:Work > <cc:License rdf:about="http://creativecommons.org/licenses/publicdomain/" > <cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction"/> <cc:permits rdf:resource="http://creativecommons.org/ns#Distribution"/> <cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks"/> </cc:License > </rdf:RDF > </metadata ></svg> Transaction Credit  Card
                        </a>
                    </li>
                </ul>
                <div class="tab-content mb-4" id="border-tabsContent" style="border-bottom: 0.5px solid #dee2e6; border-right: 0.5px solid #dee2e6; border-left: 0.5px solid #dee2e6;">
                    <div class="tab-pane fade  @if($active=='1') show active @endif" id="border-summary" role="tabpanel" aria-labelledby="border-summary-tab">
                        @include('enquiry.detail_ui.summary')
                    </div>
                    {{-- <div class="tab-pane fade @if($active=='2') show active @endif" id="border-detail" role="tabpanel" aria-labelledby="border-detail-tab">
                        @include('enquiry.detail_ui.detail')
                    </div> --}}
                    <div class="tab-pane fade @if($active=='3') show active @endif" id="border-update" role="tabpanel" aria-labelledby="border-update-tab">
                        @include('enquiry.detail_ui.update')
                    </div>
                    <div class="tab-pane fade @if($active=='4') show active @endif" id="border-assessment" role="tabpanel" aria-labelledby="border-assessment-tab">
                        @include('enquiry.detail_ui.assessment')
                    </div>
                    <div class="tab-pane fade @if($active=='5') show active @endif" id="border-apllication" role="tabpanel" aria-labelledby="border-apllication-tab">
                        @include('enquiry.detail_ui.aplication')
                    </div>
                    <div class="tab-pane fade @if($active=='6') show active @endif" id="border-document" role="tabpanel" aria-labelledby="border-document-tab">
                        @include('enquiry.detail_ui.document')
                   </div>
                    {{-- <div class="tab-pane fade @if($active=='7') show active @endif" id="border-service" role="tabpanel" aria-labelledby="border-service-tab">
                        @include('enquiry.detail_ui.service')
                   </div> --}}
                    <div class="tab-pane fade @if($active=='7') show active @endif" id="border-comment" role="tabpanel" aria-labelledby="border-comment-tab">
                        @include('enquiry.detail_ui.comment')
                   </div>
                    <div class="tab-pane fade @if($active=='8') show active @endif" id="border-follw-up" role="tabpanel" aria-labelledby="border-follw-up-tab">
                        @include('enquiry.detail_ui.follow_up')
                   </div>
                    <div class="tab-pane fade @if($active=='9') show active @endif" id="border-transaction" role="tabpanel" aria-labelledby="border-transaction-tab">
                        @include('enquiry.detail_ui.transaction')
                   </div>
                   <div class="tab-pane fade @if($active=='10') show active @endif" id="border-transactioncard" role="tabpanel" aria-labelledby="border-transactioncard-tab">
                    @include('enquiry.detail_ui.transactioncard')
               </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
