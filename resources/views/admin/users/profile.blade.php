<x-admin-master>
    @section('content')
        <h1>User Profile of {{ $user->name }}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    <div class="mb-4">
                        <img class="img-profile rounded-circle img-fluid" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group @error('avatar') is-invalid @enderror">
                        <label for="avatar">Image</label>
                        <input type="file" class="form-control-file" name="avatar" id="post_image">
                        @error('avatar')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('username') is-invalid @enderror">
                        <label for="username">Name</label>
                        <input type="text"
                               class="form-control" name="username" id="username" placeholder="Enter username..." value="{{$user->username}}">
                        @error('username')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('name') is-invalid @enderror">
                        <label for="name">Name</label>
                        <input type="text"
                               class="form-control" name="name" id="name" placeholder="Enter name..." value="{{$user->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('email') is-invalid @enderror">
                        <label for="email">Email</label>
                        <input type="text"
                               class="form-control" name="email" id="email" placeholder="Enter email..." value="{{$user->email}}">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                               class="form-control" name="password-confirmation" id="password-confirmation">
                    </div>

                    @csrf
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td><input type="checkbox" name="" id=""
                                            @foreach($user->roles as $user_role)
                                                @if($user_role->slug == $role->slug)
                                                    checked
                                                @endif
                                            @endforeach
                                            ></td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form method="post" action="{{route('user.role.attach', $user)}}">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-primary" @if($user->roles->contains($role)) disabled @endif>Attach</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('user.role.detach', $user)}}">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-danger" @if(!$user->roles->contains($role)) disabled @endif>Detach</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
