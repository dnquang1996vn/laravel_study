@extends('layouts.app')

@section('content')
    <h1>Chăm sóc khách hàng. Gửi email</h1>
    <form action=" {!! route('sendMail') !!}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nội dung </label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="content">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
