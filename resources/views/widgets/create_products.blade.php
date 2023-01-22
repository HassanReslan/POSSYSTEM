
<script>
    $( document ).ready(function() {
        $('#cat_msg').hide();
        $('#exampleModal').on('show.bs.modal', function (event) {
        });
        $.ajaxSetup({
            headers: {
                'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formcategory').on('click',function(){

             var category = $('#category_name').val();

            //console.log('{{route('categories.store')}}');
            //alert('{{route('categories.store')}}');
            console.error();
            $.ajax({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  type: "GET",
                  url: "{{route('categories.store')}}",
                data: {'category_name' : category },
                success: function(ajaxresponse) {

                    $('#cat_msg').html(ajaxresponse);
                    $('#cat_msg').show();
                    setInterval(function () {$('#cat_msg').hide()}, 2000);
                    window.location.href = '{{route('products.create')}}';
                }
            });
        });
    });
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-3" >
                        <div class="alert alert-success" role="alert" id="cat_msg"></div>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" value="" required name="category_name" id="category_name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="formcategory" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 ">
            @if ($message = Session::get('success'))

                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="row mt-5 form-shadow bg-white" >
        <div class="col-12 External-stock-header">
            Add New Product
        </div>
        <div class="col-12 border  form-outline p-5 contetn-shadow">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" onchange="return false;">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="form-group ">
                    <div class="row ">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control " name="category_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                   @if (old('category_id') == $category->id)
                                    <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <strong class="error text-danger" >{{ $errors->first('category_id') }}</strong>
                            @endif
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex  align-items-end"  >

                            <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style=" ">Add Category</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" value="{{ old('product_name') }}" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name">
                    @if($errors->has('product_name'))
                        <strong class="error text-danger" >{{ $errors->first('product_name') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Code</label>
                    <input type="text" class="form-control" value="{{ old('product_code') }}" name="product_code" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Code">
                    @if($errors->has('product_code'))
                        <strong class="error text-danger" >{{ $errors->first('product_code') }}</strong>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary float-right" >Save</button>
            </form>
        </div>
    </div>
</div>
