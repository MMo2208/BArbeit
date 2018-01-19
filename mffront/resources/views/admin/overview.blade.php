@extends('layouts.mfapp')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Mainframe Users</h4>
        <div class="medium-2  columns"><a class="button hollow success" href="{{ route('new_user') }}">ADD NEW USER</a></div>
<p></p>

        <table class="stack">
          <thead>
            <tr>
              <th width="200">Name</th>
              <th width="200">Role</th>
              <th width="200">Email</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>


            @foreach( $mf_users as $mf_user )
              <tr>
                <td>{{ $mf_user->title }}. {{ $mf_user->name }} {{ $mf_user->last_name }}</td>
                <td>{{ $mf_user->role }}</td>
                <td>{{ $mf_user->email }}</td>
                <td>
                  <a class="hollow button" href="{{ route('show_user', ['users_id' => $mf_user->id] ) }}">EDIT</a>
                  <a class="hollow button warning" href="./book_room.html">DELETE</a>
                </td>
              </tr>

            @endforeach

                      </tbody>
        </table>


      </div>
    </div>
@endsection
