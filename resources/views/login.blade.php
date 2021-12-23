@extends('layout')
@section('content')

<h1>Login Form</h1>

<div class="alert alert-danger">
    @error('failed')
    {{ $message }}
    @enderror
</div>

<form action="/login/user" method="post">
    @csrf()
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="Login" class="btn btn-success">
    </div>
</form>
@endsection
