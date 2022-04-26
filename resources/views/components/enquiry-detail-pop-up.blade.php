<div class="card">
    <div class="card-body">
        <h5 class="card-title">Basic Information</h5>
        <p class="card-text">(As indicated on your Enquiry)</p>
        <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">First Name</th>
                <td>{{ $message->first_name }}</td>
                <th scope="row">Middle Name</th>
                <td>{{ $message->middle_name }}</td>
                <th scope="row">Last Name</th>
                <td>{{ $message->last_name }}</td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>{{ $message->email }}</td>
                <th scope="row">Phone</th>
                <td>{{ $message->phone }}</td>
                <th scope="row">Alternate Number</th>
                <td>{{ $message->alternate }}</td>
              </tr>
              <tr>
                <th scope="row">DOB</th>
                <td>{{ $message->dob }}</td>
                <th scope="row">Gender</th>
                <td>{{ $message->gender }}</td>
                <th scope="row">Preferred Country</th>
                <td>{{ $message->preferred_country }}</td>
              </tr>
                <tr>

                <th scope="row">Postal Code</th>
                <td>{{ $message->postal_code }}</td>
                <th scope="row">Address</th>
                <td>{{ $message->address }}</td>
                <th scope="row">Reference Source</th>
                <td>{{ $message->reference_source }}</td>
              </tr>
              <tr>
                <th scope="row">First Language</th>
                <td>{{ $message->first_language }}</td>
                <th scope="row">Student Remarks</th>
                <td>{{ $message->remarks ?? " " }}</td>
                <th scope="row">Counsellor Remarks</th>
                <td colspan="2">{{ $message->details->remark ?? "" }}</td>
              </tr>
            </tbody>
        </table>
        <hr>
        <h5 class="card-title">Detail Information</h5>
        <p class="card-text">(As indicated on your Enquiry Detail)</p>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Passport</th>
                    <td><span class="badge badge-primary">{{ $message->details->data->passport ?? 'Not Set Yet' }}</span></td>
                    <th scope="row">Country Interested</th>
                    <td>
                        @isset($message->details->data->country_intrusted)
                            @foreach ($message->details->data->country_intrusted as $item)
                                <span class="badge badge-primary">{{ $item }}</span>
                            @endforeach
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th scope="row">Annual Income</th>
                    <td>{{ $message->details->data->annual_income ?? "0" }}</td>
                    <th scope="row">Last Education</th>
                    <td>{{ ucfirst($message->details->data->last_education) }}</td>
                </tr>
            </tbody>
        </table>
        <h5 class="card-title">Education Information</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Institute</th>
                    <th scope="row">Percentage</th>
                    <th scope="row">Passing</th>
                    <th scope="row">Backlog</th>
                </tr>
                <tr>
                    <td scope="row">10th</td>
                    <td scope="row">{{ $message->details->data->ssc_pass_percentage ?? 'not set yet' }}</td>
                    <td scope="row">{{ $message->details->data->ssc_passing ?? 'not set yet' }}</td>
                    <td scope="row">{{ $message->details->data->ssc_backlog ?? 'not set yet' }}</td>
                </tr>
                <tr>
                    <td scope="row">12th</td>
                    <td scope="row">{{ $message->details->data->hsc_pass_percentage ?? 'Not Set Yet' }}</td>
                    <td scope="row">{{ $message->details->data->hsc_passing ?? 'Not Set Yet' }}</td>
                    <td scope="row">{{ $message->details->data->hsc_backlog ?? 'Not Set Yet' }}</td>
                </tr>
                <tr>
                    <td scope="row">Graduate ( {{ $message->details->data->degree_name ?? '' }} )</td>
                    <td scope="row">{{ $message->details->data->degree_pass_percentage ?? 'Not Set Yet' }}</td>
                    <td scope="row">{{ $message->details->data->degree_passing ?? 'Not Set Yet' }}</td>
                    <td scope="row">{{ $message->details->data->degree_backlog ?? 'Not Set Yet' }}</td>
                </tr>

                <tr>
                    <td scope="row">Master ( {{ $message->details->data->master_degree_name ?? '' }} ) </td>
                    <td scope="row">{{ $message->details->data->master_degree_pass_percentage ?? 'Not Set Yet' }}</td>
                    <td scope="row">{{ $message->details->data->master_degree_passing ?? 'Not Set Yet' }}</td>
                    <td scope="row">{{ $message->details->data->master_degree_backlog ?? 'Not Set Yet' }}</td>
                </tr>
            </tbody>
        </table>

        <h5 class="card-title">Online Exam</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Type Exam</th>
                    <th scope="row">Marks</th>
                    <th scope="row">Status</th>
                    <th scope="row">Exam/Plan</th>
                </tr>
                @foreach ($message->ExamDetail as $exam_detail)
                    <tr>
                        <td scope="row">{{ $exam_detail->type_exam ?? 'not set yet' }}</td>
                        <td scope="row">
                            @if ($exam_detail->status!="planning")
                            @php
                                $exam=json_decode($exam_detail->exam_pattern_value);
                                $i=0;
                            @endphp
                                @foreach(json_decode($exam_detail->exam_pattern) as $item_pet)
                                                        <a href="#" class="badge badge-success">{{ str_replace("_"," ",ucfirst($item_pet)) }} : {{ $exam[$i] ?? "-" }}</a>
                                                        @php
                                                          $i++;
                                                        @endphp
                                @endforeach

                                @else
                                    <a href="#" class="badge badge-info">Not attempted</a>
                                @endif
                        </td>

                        <td scope="row">{{ $exam_detail->status ?? 'not set yet' }}</td>
                        <td scope="row">{{ date('d/m/Y',strtotime($exam_detail->exam_date)) ?? 'not set yet' }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h5 class="card-title">Work Information</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Work Company</th>
                    <th scope="row">Work From</th>
                    <th scope="row">To Work From</th>
                    <th scope="row">Work Profile</th>
                </tr>
                @foreach ($message->details->data->work_company as $item)
                    <tr>
                        <td scope="row">{{ $item ?? 'Not Set Yet' }} </td>
                        <td scope="row">{{ $message->details->data->work_from[$loop->index] ?? 'not set yet' }}</td>
                        <td scope="row">{{ $message->details->data->to_work_from[$loop->index] ?? 'not set yet' }}</td>
                        <td scope="row">{{ $message->details->data->work_profile[$loop->index] ?? 'not set yet' }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
