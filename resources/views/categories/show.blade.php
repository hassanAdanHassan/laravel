@extends('index')
@section('content')
    <div class="card card-info card-outline mb-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
         <button type="button" class="btn btn-primary modal-sm" data-bs-toggle="modal" data-bs-target="#categoryModal">
              Create New
       </button>

       <div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body"> create category
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
    </form>
</div>
    </div>
  </div>
</div>

        <a href="{{ route('category.create') }}">Create New</a>
        <table  id="categoryTable" class="display nowrap" style="width:100%">
            <tr>
                <thead style="background-color: lightgray;">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Amount</th>
                    <th>Action</th>
                </thead>
            </tr>
       


            @foreach ($category as $cat)
                <tr>

                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->descr }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>{{ $cat->amount }}</td>
                    <td>


                    

                        {{-- @can('view',   $cat)                                --}}
                        <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-primary">
                            Edit
                        </a>
                        {{-- @endcan
                        @can('delete',  $cat) --}}
                        <form action="{{ route('category.destroy', $cat->id) }}" method="POST"
                            onsubmit="return confirm('maxubtaa in aad tureysiid?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>

                        </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
            @endforeach
        </table>
       
    </div>
@endsection
