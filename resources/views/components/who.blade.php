

@if(Auth::guard('web')->check())
    <p class="text-success"> your are logged in as <strong>PATIENT</strong> </p>

@else
    <p class="text-danger">you are logged out as <strong>PATIENT</strong></p>
@endif
@if(Auth::guard('medic')->check())
    <p class="text-success"> your are logged in as <strong>MEDIC</strong> </p>
@else
    <p class="text-danger">you are logged out as <strong>MEDIC</strong></p>
@endif

@if(Auth::guard('center')->check())
    <p class="text-success"> your are logged in as <strong>CENTER</strong> </p>
@else
    <p class="text-danger">you are logged out as <strong>CENTER</strong></p>
@endif

