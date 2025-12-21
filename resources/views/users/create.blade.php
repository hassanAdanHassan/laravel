@extends('layouts.master')
@section('content')
    <!-- // Create User -->
    <div class="card m-3">
        <div class="card-header">
       
            <h3>Create User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control   {{ $errors->has('name') ? 'is-invalid' : '' }}">  
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>
                <div class="form-group mb-4">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                </div>
                 <div class="form-group mb-4">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}">
                        <option value="">Select Role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <span class="text-danger">@error('role'){{ $message }}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>  
@endsection
