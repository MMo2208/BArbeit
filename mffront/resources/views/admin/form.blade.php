@extends('layouts.mfapp')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>{{ $modify == 1 ? 'Edit User' : 'Add New User' }}</h4>
        <form action="{{ $modify == 1 ? route('update_user', [ 'user_id' => 1]) : route('create_user') }}" method="post">
          <div class="medium-4  columns">
            <label>Title</label>
            <select name="title">
                          <option value="mr" selected="selected">Mr.</option>
                          <option value="ms">Ms.</option>
                          <option value="mrs">Mrs.</option>
                          <option value="dr">Dr.</option>
                        </select>
          </div>
          <div class="medium-4  columns">
            <label>Name</label>
            <input name="name" type="text">
            <small class="error">{{$errors->first('name')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Last Name</label>
            <input name="last_name" type="text">
            <small class="error">{{$errors->first('last_name')}}</small>
          </div>
          <div class="medium-8  columns">
            <label>Role</label>
            <input name="role" type="text">
            <small class="error">{{$errors->first('role')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Institution</label>
            <input name="institution" type="text">
            <small class="error">{{$errors->first('institution')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Personal- oder Matrikelnummer</label>
            <input name="pers_nr" type="text">
            <small class="error">{{$errors->first('pers_nr')}}</small>
          </div>
          <div class="medium-12  columns">
            <label>Email</label>
            <input name="email" type="text">
            <small class="error">{{$errors->first('email')}}</small>
          </div>
          <div class="medium-12  columns">
            <input value="SAVE" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>
@endsection
