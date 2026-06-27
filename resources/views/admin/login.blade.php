@extends('admin.layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Admin Login</h3>
    <form method="POST" action="{{ route('admin.login.post') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
      </div>
      <button class="btn btn-primary">Login</button>
    </form>
  </div>
</div>
@endsection
