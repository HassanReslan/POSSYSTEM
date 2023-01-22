
<div class="container form-shadow  mt-5 bg-white">

    <div class="row">
        <div class="col-12 External-stock-header">
            Add New Customer
        </div>
        <div class="col-12 border form-outline p-5 contetn-shadow">
            <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">Email </label>
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @if($errors->has('email'))
                        <strong class="error text-danger" >{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                    @if($errors->has('phone'))
                        <strong class="error text-danger" >{{ $errors->first('phone') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" name="address" ></textarea>
                    @if($errors->has('address'))
                        <strong class="error text-danger" >{{ $errors->first('address') }}</strong>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
</div>
