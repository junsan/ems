@extends('layout')

@section('details')
    <x-dashboard-details />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Country Table
        <a style="float: right; text-decoration: none;" href="{{route('countries.create')}}">Create Country</a>
    </div>
    <div class="card-body">
    <table id="datatablesSimple">
    <thead>
        <tr>
            <th>Country Code</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Country Code</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{$country->country_code}}</td>
                <td>{{$country->name}}</td>
                <td>{{$country->created_at}}</td>
                <td>
                    <a href="{{route('countries.edit', $country->id)}}" style="color: green; text-decoration:none;">Edit</a> 
                    <form style="float: right" action="{{route('countries.destroy', $country->id)}}" method="POST">
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
                            