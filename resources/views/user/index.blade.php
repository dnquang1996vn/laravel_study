@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @can('user-management')
                            Be able to manager users
                        @else
                            Unable to manager other users
                        @endcan
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
