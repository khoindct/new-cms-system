<x-admin-master>
    @section('content')
        <h1>Edit Permission: {{$permission->name}}</h1>
        @if(session('permission-update'))
            <div class="alert alert-success">{{session('permission-update')}}</div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('permission.update', $permission)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter permission name ..." value="{{$permission->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
