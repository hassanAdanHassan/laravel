@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="rounded-circle mt-5" src="https://placehold.co/100" width="150px" />

                    <span class="">{{ Auth::user()->name ?? '' }} </span>
                    <span> {{ Auth::user()->created_at->format('Y' . ' ' . 'M') }} </span>
                    <span> {{ Auth::user()->role ?? '' }} </span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">

                    <form action="{{ route('profile.update') }}" method="post">
                        @method()
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">name</label>
                                <input type="name" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">curent password</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>
                            <label for="confirmpassword">new Password</label>
                            <div class="form-group">
                                <input type="password" class="form-control" name="new_mpassword">
                            </div>
                            <label for="confirmpassword"> confirm Password</label>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirmpassword">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">save change</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
