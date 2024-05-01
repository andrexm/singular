@extends('master')

@section('content')
    @if(session()->has("error"))
        <div>
            {{ session()->flash("error") }}
        </div>
    @endif

    @if(!auth()->guest())
        {{ "Olá, " . auth()->activeUser()->first_name . "!" }}
    @endif

    <form action="/login" method="post">
        {!! csrf() !!}
        <input type="text" name="email" /><br>
        <input type="password" name="password" /><br>
        <button>Enviar</button>
    </form>

    <div>
        <a href="logout">Logout</a>
    </div>
@endsection
