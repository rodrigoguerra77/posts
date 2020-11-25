@extends('layouts.app')

@section('content')
<div class="container">

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/posts/'.$post->id) }}" class="form-horizontal" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        
        @include('posts.form', ['mode' => 'edit'])
    </form>
</div>
@endsection