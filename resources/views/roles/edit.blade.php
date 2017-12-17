@extends('laraback::layouts.modal')

@section('title', 'Edit Role')
@section('content')
    <form method="POST" action="{{ route('roles.edit', $role->id) }}" novalidate>
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control" value="{{ $role->name }}">
            </div>

            <div class="form-group">
                <div>
                    <label>Permissions</label>
                    <button type="button" class="btn btn-secondary btn-sm ml-1" data-check-all="permissions[]" title="Check All"><i class="far fa-check-square"></i></button>
                    <button type="button" class="btn btn-secondary btn-sm" data-check-none="permissions[]" title="Check None"><i class="far fa-square"></i></button>
                </div>
                <ul class="list-group list-group-hover">
                    @foreach ($group_permissions as $group => $permissions)
                        <li class="list-group-item">
                            <div class="mt-1 mb-2">{{ $group }}</div>
                            @foreach ($permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="permissions[]" class="form-check-input" value="{{ $permission->id }}"{{ $role->permissions->contains('id', $permission->id) ? ' checked' : '' }}> {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection