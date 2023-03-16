@extends('layouts.app')

@section('content')
    <div class="container m-5 p-5 mx-auto">

        <div class="text-center text-h1-index">
            <h1>TOC TOC TROK !</h1>
        </div>

        <h2 class="text-center"> Bienvenue sur le réseau <br> social du troc!</h2>

        <div class="row mt-5 w-50 mx-auto">
            <div class="col-6">
                <a href="register"><button class="btn btn-lg px-5 btn- btn-index1">Inscription</button></a>
            </div>
            <div class="col-6">
                <a href="login"><button class="btn btn-lg px-5 btn- btn-index2">Connexion</button></a>
            </div>
        </div>
    </div>
@endsection
