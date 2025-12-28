@extends('layouts.master')
@section('content')
    <div class="container-fluid">


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card m-3">
            <div class="card-header">
                <h3>display users and controll</h3>
                <div class="col-5">
                    <button type="button" class="btn btn-primary modal-sm" data-bs-toggle="modal" data-bs-target="#usermodel">
                        Create New
                    </button>

                    <div class="modal fade" id="usermodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!--begin::Body-->
                                <div class="card-body">
                                    <form action="{{ url('users/store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="conform">conform password</label>
                                            <input type="conform" name="conform" id="conform" class="form-control">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="role">Role:</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="user">user</option>
                                                <option value="admin">admin</option>
                                            </select>

                                        </div>
                                        <button type="submit" class="btn btn-primary">save</button>
                                    </form>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->

                        </div>
                    </div>

                </div>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>email</th>
                            <th>roles</th>
                            <th>email_verified</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>

                                    <form action="{{ route('users.destroy', $user->id) }}"
                                        method="POST" onsubmit="return confirm('maxub taa in aad tureyso {{ $user->name }}!')"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
