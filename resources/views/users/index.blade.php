@extends('layout')

@section('details')
    <x-dashboard-details />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        User Table
        <a style="float: right; text-decoration: none;" href="{{route('users.create')}}">Create User</a>
    </div>
    <div class="card-body">
    <table id="datatablesSimple">
    <thead>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <a href="{{route('users.edit', $user->id)}}" style="color: green; text-decoration:none;">Edit</a> 
                    <form style="float: right" action="{{route('users.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; background-color: transparent; border: none;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection
                            