@if (Auth::guard('web')->check())
  <p class="text-success">
    You are logged In as a <b>USER</b>.
  </p>
@else
  <p class="text-danger">
    You are logged Out as a <b>USER</b>.
  </p>
@endif

@if (Auth::guard('admin')->check())
  <p class="text-success">
    You are logged In as a <b>ADMIN</b>.
  </p>
@else
  <p class="text-danger">
    You are logged Out as a <b>ADMIN</b>.
  </p>
@endif
