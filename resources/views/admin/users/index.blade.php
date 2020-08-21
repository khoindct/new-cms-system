<x-admin-master>
    @section('content')
        <h1>Users</h1>

        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
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
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Registered date</th>
                            <th>Updated profile date</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <img height="40px" src="{{$user->avatar}}" alt="">
                                </td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form method="post" action="{{route('user.delete', $user->id)}}">
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

{{--        <div class="d-flex">--}}
{{--            <div class="mx-auto">--}}
{{--                {{$users->links()}}--}}
{{--            </div>--}}
{{--        </div>--}}
    @endsection

        @section('scripts')
            <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
            <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        @endsection
</x-admin-master>
