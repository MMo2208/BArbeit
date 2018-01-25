@if (Auth::guard('web')->check())
  <p class="text-success" style="color:#00c853;">
    You are already logged In as a <b>USER</b>.
  </p>
  <div class="links" style="margin-bottom:20px;">
<a href="{{ url('/home') }}">Go to dashboard</a>
</div>

@elseif (Auth::guard('admin')->check())
  <p class="text-danger" style="color:#00c853;">
    You are already logged In as an <b>ADMIN</b>.
  </p>

@else
  <p>Login</p>

@endif
