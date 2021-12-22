@extends('layouts.theam')

@section('title')
Add Assessment
@endsection


@section('content')
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header">{{ $enquiry_detail->first_name }}'s Assessment</div>
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
                    {{-- <form method="POST" action="{{ route('assessments.store') }}">
                        @csrf
                        <div class="row">
                            @include('assessment.add_form')
                            <div class="col-md-12 text-center">

                                <input type="submit" class="btn btn-primary" value="{{ __('enquire.submit_btn') }}">
                                <a href="{{route('assessments.index')}}" class="btn btn-danger" >{{ __('enquire.cancel_btn_btn') }}</a>
                            </div>
                        </div>

                    </form> --}}
                    {{-- <th role="columnheader">ASSESSMENT</th>
                    <th role="columnheader">Country</th>
                    <th role="columnheader">Intake Year</th>
                    <th role="columnheader">Intake Month</th>
                    <th role="columnheader">University</th>
                    <th role="columnheader">Level</th>
                    <th role="columnheader">Course</th>
                    <th role="columnheader">Specialization</th>
                    <th role="columnheader">Program Link</th>
                    <th role="columnheader">Duration</th>
                    <th role="columnheader">Campus</th>
                    <th role="columnheader">Entry Req</th>
                    <th role="columnheader">App Fee</th>
                    <th role="columnheader">App Deadline</th>
                    <th role="columnheader">Tuition Fee</th>
                    <th role="columnheader">Scholarship</th>
                    <th role="columnheader">Remark</th>
                    <th role="columnheader">Action</th> --}}
                    <form method="POST" action="{{ route('Assessment.EmailNotifyAssessment',$enquiry) }}">
                        @csrf
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Country</th>
                                    <th>University</th>
                                    <th>Course</th>
                                    <th>Intake Month</th>
                                    <th>Intake Year</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($assessment as $item)
                                <tr>
                                    <td class="text-center">
                                        @if ($item->status != "process")
                                            #
                                        @else
                                            <input type="checkbox" name="assessment_id[]" value="{{ $item->id }}">
                                        @endif
                                    </td>
                                    <td>{{ $item->University->Country->name }}</td>
                                    <td>{{ $item->University->name }}</td>
                                    <td>{{ $item->Course->name }}</td>
                                    <td><span class="badge badge-success">{{ $item->IntactMonth->month }}</span></td>
                                    <td><span class="badge badge-primary">{{ $item->IntactYear->year }}</span></td>
                                    <td>{{ $item->created_at->diffForHumans() }} By <span class="badge badge-warning"> {{ $item->AddedBy->name }}</span></td>
                                    <td class="text-center">
                                        @if ($item->status != "process")
                                            Applied
                                        @else
                                            <a href="{{ route('Assessment.Apply',$item->id) }}" title="Apply"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle t-icon t-hover-icon"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a>
                                            <a href="{{ route('Assessment.Remove',$item->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x t-icon t-hover-icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>
                                        @endif

                                    </td>
                                </tr>
                            @empty

                            @endforelse
{{--
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>UK</td>
                                    <td>New York Institute of Technology</td>
                                    <td>B.S. in Business Administration</td>
                                    <td>June - 2022 </td>
                                    <td class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle t-icon t-hover-icon"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x t-icon t-hover-icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>UK</td>
                                    <td>Heriot Watt University</td>
                                    <td>MSc International Business Management</td>
                                    <td>March - 2022 </td>
                                    <td class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle t-icon t-hover-icon"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x t-icon t-hover-icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                        {{-- <a href="" class="btn btn-info align-self-center">Add More </a> --}}
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Add More
                            </button>
                            {{-- @if (count($enquiry->assessment))

                            @endif
                            @empty --}}
                            @if(count($assessment)>0)
                            <button type="submit" class="ml-2 btn btn-dark"> Notify Email </button>
                                {{-- <a class="ml-2 btn btn-dark " href="{{ route('Assessment.EmailNotifyAssessment',$enquiry) }}">
                                    Notify Email
                                </a> --}}
                            @endif
                        </div>
                    </form>

                          @include('assessment.AddModel')


                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
