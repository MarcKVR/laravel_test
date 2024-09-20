@csrf

<label for="title">Título</label>
<input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">

<label for="slug">Slug</label>
<input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">

<label for="content">Content</label>
<textarea class="form-control" name="content">{{ old('content', $post->content) }}</textarea>

<label for="category_id">Categoría</label>
<select class="form-control" name="category_id">
    @foreach ($categories as $title => $id)
        <option {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }} value="{{$id}}">{{ $title }}</option>
    @endforeach
</select>

<label for="posted">Posted</label>
<select class="form-control" name="posted">
    <option {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }} value="not">No</option>
    <option {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }} value="yes">Si</option>
</select>

<label for="description">Descripción</label>
<textarea class="form-control" name="description">{{ old('description', $post->description) }}</textarea>

@if (isset($task) && $task == 'edit')
    <label form="image">Image</label>
    <input type="file" name="image">
@endif