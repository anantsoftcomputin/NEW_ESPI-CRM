<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
<div class="col-lg-12">
    <div class="form-group">
        {{ Form::label('Subject', 'Subject', ['class' => 'form-control-label']) }}
        {{ Form::text('subject', $Task->subject, ['class' => 'form-control']) }}
    </div>
</div>
{{-- <div class="col-lg-6">
    <div class="form-group">
    {{ Form::label('price', 'price', ['class' => 'form-control-label']) }}
    {{ Form::text('price', $Task->price, ['class' => 'form-control']) }}
    </div>
</div> --}}
<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('Start Date', 'Start Date', ['class' => 'form-control-label']) }}
        {{ Form::date('start_date', $Task->start_date, ['class' => 'form-control']) }}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('Due Date', 'Due Date', ['class' => 'form-control-label']) }}
        {{ Form::date('date', $Task->date, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('Priority', ' Priority', ['class' => 'form-control-label']) }}
        {!! Form::select('Priority', ['Select' => 'Select', 'Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High', 'Urgent' => 'Urgent'], $Task->Priority, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('Related To ', ' Related To ', ['class' => 'form-control-label']) }}
        {!! Form::select('Related', ['Select' => 'Select', 'Low' => 'Low', 'Medium' => 'Medium'], $Task->Related, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="user">Assignees</label>
        <select name="Assignees" id="Assignees" class="@error('counsellor_id') is-invalid @enderror form-control"
            required>
            <option value="{{ $Task->Assignees }}" selected>{{ $Task->Assignees }} </option>
            @foreach ($user as $item)
                <option @if (old('Assignees') == $Task->Assignees) selected @endif value="{{ $item->name }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    @error('Assignees')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="user">Followers</label>
        <select name="Followers" id="user" class="@error('counsellor_id') is-invalid @enderror form-control" required>
            <option value="{{ $Task->Followers }}" selected>{{ $Task->Followers }} </option>
            @foreach ($user as $item)
                <option @if (old('counsellor_id') == $item->id) selected @endif value="{{ $item->name }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    @error('Followers')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="user">Status</label>
        <select name="Status" id="Status" class="@error('Status') is-invalid @enderror form-control" required>
            <option value="{{ $Task->Status }}" selected>{{ $Task->Status }} </option>
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Testing">Testing</option>
            <option value="Awaiting Feedback">Awaiting Feedback</option>
            <option value="Complete">Complete</option>
            <option value="Pending">Pending</option>
        </select>
    </div>
    @error('Status')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="file_input" class="mandatory">File</label>
        <input id="file_input" name="file" type="file" class="form-control" placeholder="Upload File">
        <a href='{{ asset($Task->file_name) }}' target="_blank" class='btn btn-info'>Upload File Show</a>
    </div>
</div>
{{-- <div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('Status', ' Status', ['class' => 'form-control-label']) }}
{!! Form::select('status', ['Select' => 'Select', 'Active' => 'Active', 'Deactive' => 'Deactive'], false, ['class' => 'form-control']) !!}
    </div>
</div> --}}
<div class="col-lg-12">
    <div class="form-group">
        {{ Form::label('Task Description', ' Note', ['class' => 'form-control-label']) }}
        {{ Form::textarea('note', $Task->note, ['class' => 'form-control']) }}
    </div>
</div>
<div class="col-md-12">
</div>

