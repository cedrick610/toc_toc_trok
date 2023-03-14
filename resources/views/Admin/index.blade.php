@extends('layouts.app')


@section('title')
    Back-office admin -Réseau Social Laravel
@endsection

@section('content')
<h1 class="back-h1">Back-office admin</h1>

{{-- Posts --}}
<h2>Listes des postes</h2>
<div class="container">
<table class="table table-primary">
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
</div>
{{-- -------user --}}
<h2>Listes des utilisateurs</h2>
<div class="container">
    <table class="table table-primary">
      <thead>
        <tr class="">
          
          <th scope="col">id</th>
          <th scope="col">auteur</th>
          <th scope="col">supprimer</th>
        </tr>
      </thead>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id}}</td>
          <td>{{ $user->pseudo}}</td>
          <td> <form action="{{route('users.destroy' , $user)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
          </td>
        </tr>
      @endforeach
    </table>
 </div> 
{{-- -commentaires-- --}}
<h2>Listes des commentaires</h2>
 <div class="container">
  <table class="table table-primary">
    <thead>
      <tr class="">
        <th scope="col">id</th>
        <th scope="col">Texte</th>
        <th scope="col">Auteur</th>
        <th scope="col">Modifier</th>
        <th scope="col">supprimer</th>
      </tr>
    </thead>
    @foreach($comments as $comment)
      <tr>
        <td>{{ $comment->id}}</td>
        <td>{{ $comment->content}}</td>
        <td>{{ $comment->user->pseudo}}</td>
        <td>   <a href="{{route('comments.edit' , $comment)}}">
          <button type="button" class="btn btn-warning">Modifier</button></a>
      </td>
        <td> <form action="{{route('comments.destroy' , $comment)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        </td>
      </tr>
    @endforeach
  </table>
</div> 
@endsection


