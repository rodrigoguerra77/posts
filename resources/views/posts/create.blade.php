<form action="{{ url('/posts') }}" method="post">
    {{ csrf_field() }}
    
    @include('posts.form', ['mode' => 'create'])
</form>