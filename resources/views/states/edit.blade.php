@extends('layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Update State
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('states.update', $state->id)}}"  >
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0" style="padding-top: 0;">
                            <select name="country_id" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" {{ ($country->id == $state->country_id) ? 'selected' : ''}} >{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('country_id')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input value="{{old('name', $state->name)}}" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
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
                    <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Update State</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection