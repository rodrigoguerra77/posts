@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <a href="{{ url('posts/create') }}" class="btn btn-primary">Add Posts</a>
    <br/>
    <br/>

    <div class="table-responsive">
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th class="w-25">Content</th>
                    <th>Status</th>
                    <th>Publication Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td class="text-break">{{ $post->title }}</td>
                        <td class="text-break">{{ $post->content }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ date('d-m-Y h:i:s', strtotime($post->publication_date)) }}</td>
                        <td>
                            <a href="{{ url('/posts/'.$post->id.'/edit') }}" class="btn btn-success">Edit</a>

                            <form method="post" action="{{ url('/posts/'.$post->id) }}" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete the record?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>
@endsection