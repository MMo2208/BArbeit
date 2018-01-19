@extends('layouts.mfapp')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>{{ $modify == 1 ? 'Edit User' : 'Add New User' }}</h4>
        <form action="{{ $modify == 1 ? route('update_user', [ 'users_id' => $users_id ]) : route('create_user') }}" method="post">
          <div class="medium-4  columns">
            <label>Title</label>
            <select name="title">
                          <option value="Mr" selected="selected">Mr.</option>
                          <option value="Ms">Ms.</option>
                          <option value="Mrs">Mrs.</option>
                          <option value="Dr">Dr.</option>
                        </select>
          </div>
          <div class="medium-4  columns">
            <label>Name</label>
            <input name="name" type="text" value="{{ old('name') ? old('name') : $name }}">
            <small class="error">{{$errors->first('name')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Last Name</label>
            <input name="last_name" type="text" value="{{ old('last_name') ? old('last_name') : $last_name }}">
            <small class="error">{{$errors->first('last_name')}}</small>
          </div>
          <div class="medium-8  columns">
            <label>Role</label>
            <input name="role" type="text" value="{{ old('role') ? old('role') : $role }}">>
            <small class="error">{{$errors->first('role')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Institution</label>
            <input name="institution" type="text" value="{{ old('institution') ? old('institution') : $institution }}">
            <small class="error">{{$errors->first('institution')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Personal- oder Matrikelnummer</label>
            <input name="pers_nr" type="text" value="{{ old('pers_nr') ? old('pers_nr') : $pers_nr }}">
            <small class="error">{{$errors->first('pers_nr')}}</small>
          </div>
          <div class="medium-12  columns">
            <label>Email</label>
            <input name="email" type="text" value="{{ old('email') ? old('email') : $email }}">
            <small class="error">{{$errors->first('email')}}</small>
          </div>
          <div class="medium-12  columns">
            <input value="SAVE" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>
@endsection
