@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h4>Users</h4>

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">

                    {{session()->get('message')}}

                    <button class="btn btn-close" data-dismiss="alert">
                        X
                    </button>
                </div>
            @endif


        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <th>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </th>
                <tb>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name.' '.$user->lname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{ url('view.user', $user->id) }}" class="btn btn-primary btn-facebook">view</a>
                            </td>
                        </tr>
                    @endforeach
                </tb>
            </table>

        </div>
    </div>
@endsection
