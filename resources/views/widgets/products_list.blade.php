<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: false,
            info: false,
        });
    });
</script>
<div class="container_fluid bg-white mt-3 p-2" >
    <div class="row">
        <div class="col-12">
            <button type="button" onclick="window.location.href='{{route('products.create')}}'" class="btn btn-success float-right">Add Product</button>
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
        <div class="col-12 content-shadow products-div">
            <table class="table  table-striped table-bordered" id="example"  >
                <thead>
                <tr>
                    <th scope="col" colspan="8"> List Of Products - ( {{count($products)}} Products )</th>
                </tr>
                <tr>
                    <th class="products-th" scope="col">#</th>
                    <th class="products-th" scope="col">Name</th>
                    <th class="products-th" scope="col">Code</th>
                    <th class="products-th" scope="col">image</th>
                    <th class="products-th" scope="col"></th>
                    <th class="products-th" scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $key => $product)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_image}}</td>
                        <td width="5%">
                            <a href="{{route('products.edit',$product->id)}}"><button  type="button" class="btn btn-info">Edit</button></a>
                        </td>
                        <td width="5%">
                            @csrf
                            @method('delete')
                            <button  onclick="if(confirm('Are you sure you want to Delete?')){window.location.href='{{route('products.delete',$product->id)}}'}else{return false}"  type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
