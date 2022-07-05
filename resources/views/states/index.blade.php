@extends('layout')

@section('details')
    <x-dashboard-details />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Country Table
        <a style="float: right; text-decoration: none;" href="{{route('states.create')}}">Create State</a>
    </div>
    <div class="card-body">
    <table id="datatablesSimple">
    <thead>
        <tr>
            <th>Country</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Country</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($states as $state)
            <tr>
                <td>{{$state->country->name}}</td>
                <td>{{$state->name}}</td>
                <td>{{$state->created_at}}</td>
                <td>
                    <a href="{{route('states.edit', $state->id)}}" style="color: green; text-decoration:none;">Edit</a> 
                    <form style="float: right" action="{{route('states.destroy', $state->id)}}" method="POST">
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
                            