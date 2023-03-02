@extends('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')

<main class="container">

    <h1>Mon compte</h1>
    <form action="{{route('users.destroy', $user)}}" method="post">
    @csrf
    @method("delete")
    <button type="submit" class="btn btn-danger">Supprimer le compte</button>

    </form>

    <h3 class="pb-3">Modifier mes informations</h3>
    <div class="row">

        <form class="col-4 mx-auto" action="{{route('users.update', $user)}}" method="post"}}>
            @csrf
            @method('PUT')

            <div>
                <label for="pseudo">Nouveau pseudo</label>
                <input required type="text" class="form-control" placeholder="modifier" name="pseudo" value="{{$user->pseudo}}" id="pseudo">

            </div>

            <div class="form-group">
                <label for="image">Nouvelle image</label>
                <input required type="text" class="form-control" placeholder="modifier" name="image" value="{{$user->image}}" id="image">
                
            </div>

            <button type="submit" class="btn btn-primary">Primary</button>
        </form>
    </div>
</main>

@endsection