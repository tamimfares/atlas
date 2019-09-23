@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body mb-3">
              <form action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                  <div class="col-md-9">
                    <input id="email" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" autocomplete="name" placeholder="Category Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-md-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-success px-5">Update</button>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-5 ml-2">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
