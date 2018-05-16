<div class="card sticky-top mb-2" style="top: 1rem;">
  <div class="card-body">
    <h5 class="card-title">Navigation</h5>
    <nav class="nav flex-column bg-white nav-pills">
      <a class="nav-link @if(url()->current() == route('home')) active  @endif" href="{{ route('home') }}"><i class="fa fa-edit fa-fw"></i> Edit manually</a>
      <a class="nav-link @if(url()->current() == route('scheduled.index')) active  @endif" href="{{ route('scheduled.index') }}"><i class="fa fa-history fa-fw"></i> Scheduled update</a>
    </nav>
  </div>
</div>
