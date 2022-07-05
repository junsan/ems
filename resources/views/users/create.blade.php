@extends('layout')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create User
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('users.store')}}"  >
                @csrf
                <div class="form-floating mb-3">
                    <input value="{{old('username')}}" class="form-control" id="username" name="username" type="text" placeholder="Enter your username" />
                    <label for="inputEmail">Username</label>
                    @error('username')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input value="{{old('first_name')}}" class="form-control" name="first_name" id="inputFirstName" type="text" placeholder="Enter your first name" />
                            <label for="inputFirstName">First name</label>
                        </div>
                        @error('first_name')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input value="{{old('last_name')}}" class="form-control" name="last_name" id="inputLastName" type="text" placeholder="Enter your last name" />
                            <label for="inputLastName">Last name</label>
                        </div>
                        @error('last_name')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input value="{{old('email')}}" class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                    <label for="inputEmail">Email address</label>
                    @error('email')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" />
                            <label for="inputPassword">Password</label>
                        </div>
                        @error('password')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" name="password_confirmation" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                            <label for="inputPasswordConfirm">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Add User</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection