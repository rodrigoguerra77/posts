<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="title" class="control-label">{{'Title'}}</label>
            <input class="form-control {{$errors->has('title')?'is-invalid':''}}" type="text" name="title" id="title" value="{{ isset($post->title) ? $post->title : old('title') }}">
            {!! $errors->first('title','<div class="invalid-feeback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="content" class="control-label">{{'Content'}}</label>
            <textarea class="form-control {{$errors->has('content')?'is-invalid':''}}" name="content" id="content">{{ isset($post->content) ? $post->content : old('content') }}</textarea>
            {!! $errors->first('content','<div class="invalid-feeback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status" class="control-label">{{'Status'}}</label>
            <select class="form-control {{$errors->has('status')?'is-invalid':''}}" name="status" id="status">
                <option value="{{ isset($post->status) ? $post->status : '' }}" selected>{{ isset($post->status) ? $post->status : 'Select' }}</option>
                <option value="Publicado">Publicado</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Borrador">Borrador</option>
            </select>
            {!! $errors->first('status','<div class="invalid-feeback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="publication_date" class="control-label">{{'Publication Date'}}</label>
            <input class="form-control" type="datetime-local" name="publication_date" id="publication_date" value="{{ isset($post->publication_date) ? str_replace(' ', 'T', $post->publication_date) : old('publication_date') }}">
        </div>
    </div>
    <div class="col-md-6">
        <input class="btn {{ ($mode == 'create')?'btn-primary':'btn-success' }}" type="submit" value="{{ ($mode == 'create')?'Save':'Edit' }}">
    </div>
    <div class="col-md-6">
        <a class="btn btn-light float-right" href="{{ url('posts') }}">Return</a>
    </div>
</div>