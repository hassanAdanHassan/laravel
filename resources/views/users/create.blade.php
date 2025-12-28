@extends('layouts.master')
@section('content')
    <!-- // Create User -->
    <div class="card m-3">
        <div class="card-header">

            <h3>Create User</h3>
        </div>
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

    </div>
@endsection
