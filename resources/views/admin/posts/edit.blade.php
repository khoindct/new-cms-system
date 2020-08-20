<x-admin-master>
    @section('content')
        <h1>Edit</h1>
        <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('admin.posts.form')
            @csrf

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endsection
</x-admin-master>
