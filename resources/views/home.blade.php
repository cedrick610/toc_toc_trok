@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Poster un message') }}</div>
  
                  <div class="card-body">
                      <form method="POST" action="{{ route('posts.store') }}">
                          @csrf
  
                          <div class="row mb-3">
                              <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>
  
                              <div class="col-md-6">
                                  <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus>
  
                                  @error('content')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>
  
                              <div class="col-md-6">
                                  <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
  
                                  @error('image')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
  
                          <div class="row mb-3">
                              <label for="tags" class="col-md-4 col-form-label text-md-end">{{ __('Tags') }}</label>
  
                              <div class="col-md-6">
                                  <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" required autocomplete="tags">
  
                                  @error('tags')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
  
                        
                          
                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Valider') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</form>
   @foreach ($posts as $post)
       
   
    <div class="card mx-auto"  style="width: 50rem;" >
      Posté par {{$post->user->pseudo}}
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        {{$post->tags}}
        <h5 class="card-title">Card title</h5>
        <p class="card-text"></p>

        <a href="{{ route('posts.edit', $post)}}" class="btn btn-primary">modifier</a>
      </div>
      <form action="{{route('posts.destroy', $post)}}"method="POST">
        @csrf
        @method("delete")
        <button type="submit" class="btn btn-danger">Supprimer </button>
      
    </form>
    <div>
        {{$posts->links()}}
      </div>
    </div>
    
    @endforeach
   
@endsection
