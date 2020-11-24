{{ $mode == 'create' ? 'Agregar Artículo' : 'Editar Artículo'}}
<label for="title">{{'Título'}}</label>
<input type="text" name="title" id="title" value="{{ isset($post->title) ? $post->title : '' }}">

<label for="content">{{'Contenido'}}</label>
<textarea name="content" id="content">{{ isset($post->content) ? $post->content : '' }}</textarea>

<label for="status">{{'Estado'}}</label>
<select name="status" id="status">
    <option value="{{ isset($post->status) ? $post->status : '' }}" selected>{{ isset($post->status) ? $post->status : 'Seleccionar' }}</option>
    <option value="Publicado">Publicado</option>
    <option value="Inactivo">Inactivo</option>
    <option value="Borrador">Borrador</option>
</select>

<label for="publication_date">{{'Fecha de Publicación'}}</label>
<input type="datetime-local" name="publication_date" id="publication_date" value="{{ isset($post->publication_date) ? str_replace(' ', 'T', $post->publication_date) : '' }}">

<input type="submit" value="{{ ($mode == 'create')?'Guardar':'Editar' }}">
<a href="{{ url('posts') }}">Regresar</a>