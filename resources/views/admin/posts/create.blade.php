<x-admin-master>
    @section('content')
        <h1>Create</h1>
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.posts.form')
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
