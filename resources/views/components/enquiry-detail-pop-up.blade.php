<div class="card">
    <div class="card-header">
      Student Detail
    </div>
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
                <th scope="row">First Language</th>
                <td>{{ $message->first_language }}</td>
              </tr>
              <tr>
                <th scope="row">DOB</th>
                <td>{{ $message->dob }}</td>
                <th scope="row">Gender</th>
                <td>{{ $message->gender }}</td>
                <th scope="row">Marital Status</th>
                <td>{{ $message->marital_status }}</td>
              </tr>
                <tr>
                <th scope="row">Preferred Country</th>
                <td>{{ $message->preferred_country }}</td>
                <th scope="row">Postal Code</th>
                <td>{{ $message->postal_code }}</td>
                <th scope="row">Address</th>
                <td>{{ $message->address }}</td>
              </tr>
              <tr>
                <th scope="row">Reference Source</th>
                <td>{{ $message->reference_source }}</td>
                <th scope="row">Remarks</th>
                <td colspan="3">{{ $message->remarks }}</td>
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
                    <td><span class="badge badge-primary">{{ $message->details->data->passport }}</span></td>
                    <th scope="row">Country Intrusted</th>
                    <td>
                        @foreach ($message->details->data->country_intrusted as $item)
                        <span class="badge badge-primary">{{ $item }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th scope="row">Annual Income</th>
                    <td>{{ $message->details->data->annual_income }}</td>
                    <th scope="row">Last Education</th>
                    <td>{{ $message->details->data->last_education }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td scope="row">Institute</td>
                    <td scope="row">Percentage</td>
                    <td scope="row">Passing</td>
                    <td scope="row">Backlog</td>
                </tr>
            </tbody>
        </table>

{{ $message->details }}

    </div>
    </div>
</div>
