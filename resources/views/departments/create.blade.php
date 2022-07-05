@extends('layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Department
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('departments.store')}}"  >
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input value="{{old('name')}}" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
                            <label for="inputName">Name</label>
                        </div>
                        @error('name')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Add Department</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection