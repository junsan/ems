@extends('layout')

@section('details')
    <x-dashboard-details />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Cities Table
        <a style="float: right; text-decoration: none;" href="{{route('cities.create')}}">Create City</a>
    </div>
    <div class="card-body">
    <table id="datatablesSimple">
    <thead>
        <tr>
            <th>State</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>State</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($cities as $city)
            <tr>
                <td>{{$city->state->name}}</td>
                <td>{{$city->name}}</td>
                <td>{{$city->created_at}}</td>
                <td>
                    <a href="{{route('cities.edit', $city->id)}}" style="color: green; text-decoration:none;">Edit</a> 
                    <form style="float: right" action="{{route('cities.destroy', $city->id)}}" method="POST">
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
                            