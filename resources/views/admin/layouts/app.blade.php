<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <link href="/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand bg-dark navbar-dark mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a>
        <div class="d-flex">
          @if(session('admin_name'))
            <span class="navbar-text text-white me-3">{{ session('admin_name') }}</span>
            <form method="POST" action="{{ route('admin.logout') }}">
              @csrf
              <button class="btn btn-sm btn-outline-light">Logout</button>
            </form>
          @endif
        </div>
      </div>
    </nav>

    <div class="container">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @yield('content')
    </div>

    <script src="/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('change', function(e) {
        if (e.target.matches('input[type="file"]') && e.target.files && e.target.files[0]) {
          let file = e.target.files[0];
          if (file.type.startsWith('image/')) {
            let reader = new FileReader();
            reader.onload = function(ev) {
              let parent = e.target.closest('.mb-3');
              let img = parent.querySelector('img.img-preview');
              if (!img) {
                img = document.createElement('img');
                img.className = 'img-preview img-thumbnail mt-2 d-block';
                img.style.maxWidth = '200px';
                parent.appendChild(img);
              }
              img.src = ev.target.result;
            }
            reader.readAsDataURL(file);
          }
        }
      });
    </script>
  </body>
</html>
