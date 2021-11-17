@extends('layout')
@section('content')

<form action = "/logout" method = "post">
    <div class = "form-group">
            <input type="submit" value="Logout" class="btn btn-success">
    </div>
</form>
@endsection
