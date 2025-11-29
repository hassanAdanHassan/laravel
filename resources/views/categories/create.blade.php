@extends('index')
@section('content')
    <div class="card card-info card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Form Validation</div>
        </div>
        <!--end::Header-->
    
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row ">
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Category Name" required />
                        <input type="text" name="descr" class="form-control mt-4" placeholder="Category Description"
                            required />

                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <input type="text" name="slug" class="form-control" placeholder="Category Slug" required />
                        <input type="number" name="amount" class="form-control mt-4" placeholder="amount" required />
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
