@extends('layout')

@section('details')
    <x-dashboard-details />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Departments Table
        <a style="float: right; text-decoration: none;" href="{{route('departments.create')}}">Create Department</a>
    </div>
    <div class="card-body">
    <table id="datatablesSimple">
    <thead>
        <tr>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Created at</th>
            <th>Manage</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{$department->name}}</td>
                <td>{{$department->created_at}}</td>
                <td>
                    <a href="{{route('departments.edit', $department->id)}}" style="color: green; text-decoration:none;">Edit</a> 
                    <form style="float: right" action="{{route('departments.destroy', $department->id)}}" method="POST">
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
                            