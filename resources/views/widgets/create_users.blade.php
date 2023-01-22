
<div class="container form-shadow mt-5 bg-white">
    <div class="row ">
        <div class="col-12 External-stock-header">
            Add New User
        </div>
        <div class="col-12 border form-outline p-5 contetn-shadow">
            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    @if($errors->has('name'))
                        <strong class="error text-danger" >{{ $errors->first('name') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @if($errors->has('email'))
                        <strong class="error text-danger" >{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="exampleInputPassword1" placeholder="Password">
                    @if($errors->has('password'))
                        <strong class="error text-danger" >{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control" name="role">
                        <option value="">Choose Role</option>
                        @foreach($role_name as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
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
