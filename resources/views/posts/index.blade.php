@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body">
              <div class="d-flex justify-content-end mt-0 mb-4">
                <a href="{{ route('posts.create') }}" class="btn btn-outline-primary">Create New Post</a>
              </div>
              @forelse ($posts as $post)
                <div class="card mb-5">
                  <a href="#"><img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" style="width:100%;height:100px;object-fit: cover"></a>

                  <div class="card-body">
                    <h4 class="card-title mb-0"><a href="#" class="text-decoration-none">{{ $post->title }}</a></h4>
                    <small>Created {{ $post->created_at->diffForHumans() }}</small>
                    <p class="card-text mt-3">{{ str_limit($post->description, 200) }}</p>
                  </div>
                </div>
              @empty
                <p class="lead text-center">No Posts Yet!</p>
              @endforelse
            </div>
        </div>
    </div>


@endsection

@section('scripts')
  <script>

  </script>
@endsection
