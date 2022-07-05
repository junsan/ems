@extends('layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Update City
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('cities.update', $city->id)}}"  >
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                            <select name="state_id" class="form-control">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}" {{ $state->id == $city->state_id ? 'selected' : '' }} >{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('city_id')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input value="{{old('name', $city->name)}}" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
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
                    <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Update City</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection