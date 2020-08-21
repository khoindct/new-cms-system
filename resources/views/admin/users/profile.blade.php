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
    @endsection
</x-admin-master>
