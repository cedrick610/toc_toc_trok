@extends('layouts.app')
@section('title')
    Mon compte
@endsection

@section('content')
   

        <h1>Modifier le commentaire</h1>

        <div class="row">

            <form class="col-4 mx-auto" action="{{ route('comments.update', $comment) }}" method="post">
                @csrf
                @method('PUT')

                <div>
                    <label for="content">Nouveau content</label>
                    <input required type="text" class="form-control" name="content" value="{{ $comment->content }}"
                        id="post">

                </div>

                <div class="form-group">
                    <label for="image">Nouvelle image</label>
                    <input required type="text" class="form-control" name="image" value="{{ $comment->image }}"
                        id="image">

                </div>
                <div class="form-group">
                    <label for="image">Nouveaux tags</label>
                    <input required type="text" class="form-control" name="tags" value="{{ $comment->tags }}"
                        id="image">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    
@endsection
