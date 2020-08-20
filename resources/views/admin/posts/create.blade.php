<x-admin-master>
    @section('content')
        <h1>Create</h1>


        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title...">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="post_image">File</label>
                <input type="file" name="post_image" id="post_image" class="form-control-file">
                @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
