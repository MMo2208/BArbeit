@extends('layouts.mfapp')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Students</h4>
        <div class="medium-2  columns"><a class="button hollow success" href="{{ route('new_student') }}">ADD NEW STUDENT</a></div>
<p></p>

        <table class="stack">
          <thead>
            <tr>
              <th width="200">Name</th>
              <th width="200">Email</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>


            @foreach($students as $student)
              <tr>
                <td>{{ $student->title }}. {{ $student->name }}{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                  <a class="hollow button" href="{{ route('show_student', ['student_id' => 1 ]) }}">EDIT</a>
                  <a class="hollow button warning" href="./book_room.html">DELETE</a>
                </td>
              </tr>
            @endforeach

                      </tbody>
        </table>


      </div>
    </div>
@endsection
