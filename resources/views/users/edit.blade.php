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
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                </div>
                 <div class="form-group mb-4">
                    <label for="role">Role:</label>
                    <input type="text" name="role" id="role" value="{{ $user->role }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>  
@endsection
