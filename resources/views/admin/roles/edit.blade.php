<x-admin-master>
    @section('content')
        <h1>Edit Role: {{$role->name}}</h1>
        @if(session('role-update'))
            <div class="alert alert-success">{{session('role-update')}}</div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('role.update', $role)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                               placeholder="Enter role name...." value="{{$role->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if($permissions->isNotEmpty())
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Option</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" id=""
                                                       @foreach($role->permissions as $role_permission)
                                                       @if($role_permission->slug == $permission->slug )
                                                       checked
                                                    @endif
                                                    @endforeach
                                                >
                                            </td>
                                            <td>{{$permission->id}}</td>
                                            <td>
                                                <a href="{{route('permission.edit', $permission)}}">{{$permission->name}}</a>
                                            </td>
                                            <td>{{$permission->slug}}</td>
                                            <td>
                                                <form method="post"
                                                      action="{{route('permission.delete', $permission->id)}}">
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
                @endif
            </div>
        </div>
    @endsection
</x-admin-master>
