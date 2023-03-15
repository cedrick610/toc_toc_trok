@extends('layouts.app')

@section('content')

    <div class="logo-home2 text-center mt-5"><img src="{{ asset('/images/toctoctrock.png') }} " alt="" id="logo-home">
        <h1 class="titre-h1">Trokons <br> comme au bon vieux temps</h1>

        <a href="#ajout-message"><button type="button" class="btn btn-warning">N'hésitez pas</button>
        </a>
    </div>

    <div class="container">
        <!-- le contenu de votre page -->
        @if (Route::currentRouteName() == 'search')
            <h1 class="m-5">Résultats de la recherche</h1>
        @else
            <h1 class="m-5 titre-acceuil"></h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card fond-jaune">
                        <div class="card-header">{{ __('Poster un message') }}</div>

                        <div class="card-body">

                            {{-- ajout de message --}}
                            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"
                                id="ajout-message">
                                @csrf

                                <div class="row mb-3">
                                    <label for="content"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Texte') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                                            value="{{ old('content') }}" required autocomplete="content" autofocus></textarea>

                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                                    <div class="col-md-6">
                                        <input type="file" name="image" class="form-control">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tags"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Tags') }}</label>

                                    <div class="col-md-6">
                                        <input id="tags" type="text"
                                            class="form-control @error('tags') is-invalid @enderror" name="tags"
                                            value="{{ old('tags') }}" required autocomplete="tags">

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
        @endif
        @if (count($posts) == 0)
            <p>Aucun résultats pour votre recherche</p>
        @else
            {{-- Boucle qui parcourt les messages --}}
            @foreach ($posts as $post)
                <div class="container-md boucle-message">
                    <div class="card fond-noir mx-auto">
                        Posté par {{ $post->user->pseudo }}
                        <img src="{{ asset('images/' . $post->image) }}" class="card-img-top " alt="...">
                        <div class="card-body message-post">
                            <h5 class="card-title"> {{ $post->tags }}</h5>
                            <p class="card-text">{{ $post->content }}</p>

                            {{-- ---------------------------------------------Bouton ----------------------- --}}
                            @can('update', $post)
                                <div class="btn-group ">
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">modifier</a>
                                @endcan
                                <form action="{{ route('posts.destroy', $post) }}"method="POST">
                                    @csrf
                                    @method('delete')
                                    @can('update', $post)
                                        <button type="submit" class="btn btn-danger">Supprimer </button>
                                    @endcan

                                </form>
                            </div>
                        </div>
                    </div>



                    {{-- formulaire ajout de commentaires  --}}

                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card comment-jaune">
                                    <div class="card-header">{{ __('Poster un commentaire') }}</div>

                                    <div class="card-body">

                                        {{-- ajout de commentaire --}}
                                        <form method="POST" action="{{ route('comments.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $post->id }}" name="post_id">

                                            <div class="row mb-3">
                                                <label for="content"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Texte') }}</label>
                                                <div class="col-md-6">
                                                    <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                                                        value="{{ old('content') }}" required autocomplete="content" autofocus></textarea>

                                                    @error('content')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="image"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('image') }}
                                                </label>

                                                <div class="col-md-6">
                                                    <input type="file" name="image" class="form-control">

                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="tags"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Tags') }}</label>

                                                <div class="col-md-6">
                                                    <input id="tags" type="text"
                                                        class="form-control @error('tags') is-invalid @enderror"
                                                        name="tags" value="{{ old('tags') }}" required
                                                        autocomplete="tags">

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

                                        {{-- Boucle qui parcourt les commentaires  --}}

                                        @foreach ($post->comments as $comment)
                                            <div class="container">
                                                <p>{{ $comment->content }}</p>
                                                <p>{{ $comment->tags }}</p>
                                                <img src="{{ asset('images/' . $comment->image) }}"
                                                    class="card-img-top w-35" alt="...">
                                                <p>{{ $comment->user->pseudo }}</p>

                                                @can('update', $comment)
                                                    <a href="{{ route('comments.edit', $comment) }}"
                                                        class="btn btn-primary">modifier</a>
                                                @endcan
                                            </div>

                                            {{-- --------------------Bouton --}}
                                            <form action="{{ route('comments.destroy', $comment) }}"method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Supprimer </button>
                                            </form>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    @endif
    <div>
        {{ $posts->links() }}
    </div>
@endsection
