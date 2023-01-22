
<script>
    $( document ).ready(function() {

        $('#exampleModal').on('show.bs.modal', function (event) {
        })
        $.ajaxSetup({
            headers: {
                'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* $('#formcategory').click( function(){
             alert('asdad');
             var category = $('#category_name').val();
             var created_by = 2;
             console.log({{route('categories.store')}});
          $.ajax({
                type: "POST",
                contentType: "",
                url: "{{route('categories.store')}}",
                data: {'category_name' : category , 'created_by': created_by},
                success: function(ajaxresponse) {
                    console.log(ajaxresponse);
                }
            })
        })*/
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
            <form  id="formcategory"  action="{{route('categories.store')}}"   method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" value="" required name="category_name" id="category_name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="formcategory" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container " >
    <div class="row">
        <div class="col-12 mt-3">
            @if ($message = Session::get('success'))

                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="row form-shadow mt-5 bg-white">
        <div class="col-12 External-stock-header">
        Edit Product
        </div>
        <div class="col-12  form-outline p-5 contetn-shadow">
            <form action="{{route('products.update',$products[0]->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="form-group ">
                    <div class="row ">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control " name="category_id">
                                <option value="0">Select Category</option>
                                @foreach($categories as $key => $category)
                                    @if( $products[0]->category_id == $category->id)
                                        <option selected='selected' value="{{$category->id}}">{{$category->category_name}}</option>
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
                    <input type="text" class="form-control" value="{{$products[0]->product_name}}" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name">
                    @if($errors->has('product_name'))
                        <strong class="error text-danger" >{{ $errors->first('product_name') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Code</label>
                    <input type="text" class="form-control" value="{{$products[0]->product_code}}" name="product_code" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Code">
                    @if($errors->has('product_code'))
                        <strong class="error text-danger" >{{ $errors->first('product_code') }}</strong>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
</div>
