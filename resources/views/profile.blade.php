@extends('layout')
@section('content')

<form action = "/logout" method = "post">
    <div class = "form-group">
            <input type="submit" value="Logout" class="btn btn-success">
    </div>
</form>

<form action = "/service_provider/create" method = "post">
    @csrf()
    <div class = "form-group">
        <label for="name">Name</label>
        <input type="name" name="name" class="form-control">
    </div>
    <div class = "form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class = "form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class = "form-group">
        <input type="submit" value="Login" class="btn btn-success">
    </div>
</form>
@endsection
