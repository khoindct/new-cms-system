<x-admin-master>
    @section('content')
    <h1>All Posts</h1>
    @if(session('message'))
        <div class="alert alert-danger">{{session('message')}}</div>
    @elseif(session('post-create-message'))
        <div class="alert alert-success">{{session('post-create-message')}}</div>
        @elseif(session('post-update-message'))
            <div class="alert alert-success">{{session('post-update-message')}}</div>
    @endif
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                            <td>
                                <img height="40px" src="{{$post->post_image}}" alt="">
                            </td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td>
                                <form method="post" action="{{route('post.destroy', $post->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links()}}
        </div>
    </div>

    @endsection

    @section('scripts')
            <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection

</x-admin-master>
