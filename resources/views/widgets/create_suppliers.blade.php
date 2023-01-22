<div class="container form-shadow mt-5 bg-white" >
    <div class="row">
        <div class="col-12 External-stock-header">
            Add New Supplier
        </div>
        <div class="col-12  form-outline p-5 contetn-shadow">
            <form action="{{route('suppliers.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />

                <div class="row">
                    <div class="col">
                           <label for="exampleInputEmail1">First Name</label>
                           <input name="suplier_f_name" value="{{ old('suplier_f_name') }}" type="text" class="form-control" placeholder="First name">
                          @if($errors->has('suplier_f_name'))
                            <strong class="error text-danger" >{{ $errors->first('suplier_f_name') }}</strong>
                          @endif
                    </div>
                    <div class="col">
                         <label for="exampleInputEmail1">Last Name</label>
                         <input name="suplier_l_name" type="text" value="{{ old('suplier_l_name') }}"  class="form-control" placeholder="Last name">
                         @if($errors->has('suplier_l_name'))
                            <strong class="error text-danger" >{{ $errors->first('suplier_l_name') }}</strong>
                         @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  email">
                        @if($errors->has('email'))
                            <strong class="error text-danger" >{{ $errors->first('email') }}</strong>
                        @endif
                    </div>
                    <div class="col">
                         <label for="exampleInputEmail1">Phone</label>
                         <input type="text" class="form-control" value="{{ old('suplier_phone') }}" name="suplier_phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                         @if($errors->has('suplier_phone'))
                            <strong class="error text-danger" >{{ $errors->first('suplier_phone') }}</strong>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Company Name  </label>
                        <input type="text" class="form-control" value="{{ old('company_name') }}" name="company_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Name">
                        @if($errors->has('company_name'))
                            <strong class="error text-danger" >{{ $errors->first('company_name') }}</strong>
                        @endif
                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea class="form-control" name="address" ></textarea>
                        @if($errors->has('address'))
                            <strong class="error text-danger" >{{ $errors->first('address') }}</strong>
                        @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
