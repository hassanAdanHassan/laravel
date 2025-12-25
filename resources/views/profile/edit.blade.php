@extends('layouts.master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card ">
                    <!-- Avatar, Name, Email, role -->
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img
                            class="rounded-circle mt-5"
                            width="150px"
                            src="https://placehold.co/100" />
                        <span class="font-weight-bold mt-2">{{ Auth::user()->name ?? '' }}</span>
                        <span class="text-black-50">{{ Auth::user()->email ?? '' }}</span>
                        <span>{{ Auth::user()->role ?? '' }}</span>

                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-8">

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>      

                @endif
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">

                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Enter name" value="{{ Auth::user()->name }}"  name="name" >
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>    
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{ Auth::user()->email }}" class="form-control"  placeholder="Enter email" disabled>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1">Current Password</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Password">
                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}" name="new_password" placeholder="Password">
                                <span class="text-danger">@error('new_password') {{ $message }} @enderror</span>
                            </div>

                            <!-- <div class="form-group mb-4">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" name="confirm_password" placeholder="Password">
                                <span class="text-danger">@error('confirm_password') {{ $message }} @enderror</span>
                            </div> -->


                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection