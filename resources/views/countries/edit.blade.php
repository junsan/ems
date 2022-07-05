@extends('layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Update Country
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('countries.update', $country->id)}}"  >
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input value="{{old('country_code', $country->country_code)}}" class="form-control" name="country_code" id="inputCountryCode" type="text" placeholder="Enter country code" />
                            <label for="inputCountryCode">Country Code</label>
                        </div>
                        @error('country_code')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input value="{{old('name', $country->name)}}" class="form-control" name="name" id="inputName" type="text" placeholder="Enter country name" />
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
                    <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Update Country</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection