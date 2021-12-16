<div class="col-md-12">
    <div class="form-group">
        <label for="country">Roles Name</label>
        <input type="text" name="name" value="{{$role->name ?? ''}}" class="form-control">
        <small class="text-small text-muted">You can add multiple permission using comma. ex add-user, edit-user, update-user</small>
    </div>
</div>

<div class="col-lg-12">
    <div class="row">
        @foreach ($permissions as $key => $permission)
            <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="permissions[]" value="{{ $key }}" class="custom-control-input" id="{{ $permission }}"
                    @foreach ($role->permissions as $perm)
                    @if ($perm->id== $key))
                    checked
                    @endif
                    @endforeach
                    @if($role->name == 'super-admin')
                    disabled
                    @endif>
                    {{ Form::label($permission, $permission, ['class' => 'custom-control-label']) }}
                </div>
            </div>
        @endforeach
    </div>
</div>
