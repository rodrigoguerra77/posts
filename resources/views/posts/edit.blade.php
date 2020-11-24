<form action="{{ url('/posts/'.$post->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    
    @include('posts.form', ['mode' => 'edit'])
</form>