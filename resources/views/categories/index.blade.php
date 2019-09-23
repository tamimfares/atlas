@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body mb-3">
              <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="col-md-9">
                    <input id="email" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Category Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-outline-primary btn-block">Add</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="card card-body">
              <table class="table table-borderless">
                <thead class="border-bottom">
                  <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Created</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{ $category->name }}</th>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td class="d-flex justify-content-end">
                      <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-success mr-2">Edit</a>
                      <button onclick="handleDelete({{ $category->id }})" type="button" name="button" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form id="deleteForm" method="post">
          @csrf
          @method('delete')
          <div class="modal-content">
            <div class="modal-header bg-danger text-white p-2">
              <h5 class="modal-title" id="deleteModal">Delete Category</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete this Category !?
            </div>
            <div class="modal-footer p-2">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger btn-sm">Yes, Delete</button>
            </div>
          </div>
        </form>
      </div>
    </div>
@endsection

@section('scripts')
  <script>
  function handleDelete(id) {
    let form = document.getElementById('deleteForm');
    form.action = '/categories/' + id;
    $('#deleteModal').modal('show');
  }
  </script>
@endsection
