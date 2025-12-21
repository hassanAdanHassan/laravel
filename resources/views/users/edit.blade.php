@extends('layouts.master')
@section('content')
    <!-- // Form to edit user details with card layout -->
    <div class="card m-3">
        <div class="card-header">
            <h3>Edit User</h3>
        </div>
        <div class="card-body">


            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                    <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
                 <div class="form-group mb-4">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}">
                        <option value="">Select Role</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <span class="text-danger">@error('role') {{ $message }} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>  
@endsection
