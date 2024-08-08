<div class="card overflow-hidden">
  <div class="card-body pt-3">
    <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
      <li class="nav-item">
        <a class="nav-link {{ Route::is('home') ? 'text-bg-primary rounded' : '' }}" href="{{ route('home') }}">
          <span>Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('feed') ? 'text-bg-primary rounded' : '' }}" href="{{ route('feed') }}">
          <span>Feed</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('terms') ? 'text-bg-primary rounded' : '' }}" href="{{ route('terms') }}">
          <span>Terms</span></a>
      </li>
    </ul>
  </div>
  <div class="card-footer py-2 text-center">
    <a class="btn {{ Session::get('locale') === 'en' ? 'btn-success' : 'btn-link' }} btn-sm"
      href="{{ route('lang', 'en') }}">English</a>
    <a class="btn {{ Session::get('locale') === 'fa' ? 'btn-success' : 'btn-link' }} btn-sm"
      href="{{ route('lang', 'fa') }}">فارسی</a>
    <a class="btn {{ Session::get('locale') === 'ps' ? 'btn-success' : 'btn-link' }} btn-sm"
      href="{{ route('lang', 'ps') }}">پشتو </a>
  </div>
</div>
