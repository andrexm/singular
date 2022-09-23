@extends('master')

@section('content')
    <div class="hello">
        {{ $msg }}

        <form action="" method="post">
            <?= csrf() ?>
            <button>fff</button>
        </form>
    </div>
@endsection