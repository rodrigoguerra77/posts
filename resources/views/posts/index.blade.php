@if(Session::has('message')){{
    Session::get('message')
}}
@endif

<a href="{{ url('posts/create') }}">Agregar Artículo</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Contenido</th>
            <th>Estado</th>
            <th>Fecha de Publicación</th>
            <th>Fecha de Creación</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ date('d-m-Y h:i:s', strtotime($post->publication_date)) }}</td>
                <td>{{ date('d-m-Y h:i:s', strtotime($post->created_at)) }}</td>
                <td>
                    <a href="{{ url('/posts/'.$post->id.'/edit') }}">Editar</a>
                
                 | 
                    <form method="post" action="{{ url('/posts/'.$post->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Desea borrar el registro?');">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>