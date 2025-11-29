@extends('index')
@section('content')
    <div class="card card-info card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Form edite</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')   
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row ">
                  
                        <!--begin::Col-->
                        <div class="col-md-6">
                            <input type="text" value="{{ $category->id }}" 
                                class="form-control mb-4" disabled />
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                                placeholder="Category Name"  required />
                            <input type="text" name="descr" value="{{ $category->descr }}" class="form-control mt-4"
                                placeholder="Category Description" required />

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" placeholder="Category Slug"
                                required />
                            <input type="number" name="amount" class="form-control mt-4" value="{{ $category->amount }}" placeholder="amount" required />
                        </div>
                   
                </div>

                <!--end::Col-->
            </div>
            <!--end::Row-->
    </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer">
        <button class="btn btn-info" type="submit">Submit form</button>
    </div>
    <!--end::Footer-->
    </form>
    <!--end::Form-->
    <!--begin::JavaScript-->

    </div>
@endsection
