<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title..."
    value="{{old('title') ?? $post->title}}">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="post_image">File</label>
    <div><img height="100px" src="{{ old('post_image') ?? $post->post_image }}" alt="" class="my-2"></div>
    <input type="file" name="post_image" id="post_image" class="form-control-file">
    @error('file')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body') ?? $post->body}}</textarea>
    @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
