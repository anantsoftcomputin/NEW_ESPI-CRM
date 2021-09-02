<div class="col-md-12">
    <div class="form-group">
        <label for="country">Roles Name</label>
        <input type="text" name="name" class="form-control">
        <small class="text-small text-muted">You can add multiple permission using comma. ex add-user, edit-user, update-user</small>
    </div>
</div>

<div class="col-lg-6">
    @foreach ($permissions as $key => $permission)
        <div class="form-group p-2 d-inline-block">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" value="{{ $key }}" class="custom-control-input" id="{{ $permission }}">
                {{ Form::label($permission, $permission, ['class' => 'custom-control-label']) }}
            </div>
        </div>
    @endforeach
</div>
