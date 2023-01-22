<div class="container form-shadow  mt-5 bg-white">
    <div class="row ">
        <div class="col-12 External-stock-header">
            edit User
        </div>
        <div class="col-12 border form-outline p-5 contetn-shadow">
            <form action="{{route('users.update',$users[0]->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$users[0]->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{$users[0]->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" value="{{$users[0]->password}}" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control" name="role">
                        <option value="">Choose Role</option>
                        @foreach($role_name as $key => $val)
                            <option {{ $selected[$key] }}  value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                     @if($errors->has('role'))
                        <strong class="error text-danger" >{{ $errors->first('role') }}</strong>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
</div>
