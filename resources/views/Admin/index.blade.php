@extends('layouts.app')


@section('title')
    Back-office admin -Réseau Social Laravel
@endsection

@section('content')
<h1>Back-office admin</h1>

<table class="table">
    <thead>
      <tr>
        
        <th scope="col">id</th>
        <th scope="col">contenu</th>
        <th scope="col">tags</th>
        <th scope="col">auteur</th>
        <th scope="col">modifier</th>
        <th scope="col">supprimer</th>
      </tr>
    </thead>
    @foreach ($posts as $post)
    
      <tr>
        
        <td>{{ $post->id}}</td>
        <td>{{ $post->content}}</td>
        <td>{{ $post->tags}}</td>
        <td>{{ $post->user->pseudo}}</td>
        <td>   <a href="{{route('posts.edit' , $post)}}">
            <button type="button" class="btn btn-warning">Modifier</button></a>
        </td>
        <td> <form action="{{route('posts.destroy' , $post)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        </td>
      </tr>
    @endforeach
  </table>
@endsection


