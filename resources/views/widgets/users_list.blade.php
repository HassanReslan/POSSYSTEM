<div class="container-fluid  bg-white  mt-3 p-3" >
    <div class="row">
        <div class="col-12">
            <button type="button" onclick="window.location.href='{{route('users.create')}}'" class="btn btn-success float-right">Add User</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="row" style="overflow-y: auto;">
        <div class="col-12 content-shadow">
            <table class="table "  >
                <thead>
                <tr>
                    <th scope="col" colspan="6"> List Of Users</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$role[$key]}}</td>
                        <td width="5%">
                            <a href="{{route('users.edit',$user->id)}}"><button  type="button" class="btn btn-info">Edit</button></a>
                        </td>
                        <td width="5%">
                            @csrf
                            @method('delete')
                            <button  onclick="if(confirm('Are you sure you want to Delete?')){window.location.href='{{route('user.delete',$user->id)}}'}else{return false}"  type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right">Page:{{$users->currentPage()}}</td>
                    <td colspan="3"  align="right"  >{{$users->links() }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
