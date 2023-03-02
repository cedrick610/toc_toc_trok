@extends('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')

<main class="container">

    <h1>Modifier le message</h1>
   

    <h3 class="pb-3">Modifier mes informations</h3>
    <div class="row">

        <form class="col-4 mx-auto" action="{{route('posts.update', $post)}}" method="post"}}>
            @csrf
            @method('PUT')

            <div>
                <label for="content">Nouveau content</label>
                <input required type="text" class="form-control" name="content" value="{{$post->content}}" id="post">

            </div>

            <div class="form-group">
                <label for="image">Nouvelle image</label>
                <input required type="text" class="form-control"  name="image" value="{{$post->image}}" id="image">
                
            </div>

            <div class="form-group">
                <label for="image">Nouveaux tags</label>
                <input required type="text" class="form-control"  name="tags" value="{{$post->tags}}" id="image">
                
            </div>


            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</main>

@endsection