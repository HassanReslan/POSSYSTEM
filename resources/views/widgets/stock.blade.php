<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: false,
            info: false,
        });
        
        $('#close-transfer,#close-btn-transfer').click(function(){

             $("#exampleModal_transfer").hide();
              $('#max-msg').html('');
              $('#es-qty').val(0);
        })

        $('#es-qty').focus(function(){
            $(this).select();
        })

        $('#stock-list li').each(function(){

           $(this).click(function(){


                $('#stock-list li').removeClass('li-stock-active');
                //$('#stock-list li').addClass('li-stock');
                $(this).addClass('li-stock-active');
           }) 
        })

        // add to stock//

        /*$('#addtostock').submit(function(e){

            e.preventDefault();
        });*/
    });

        /*delete external stock */

        const DeleteExtStock = (stockid) =>{
            if(confirm('Are you sure you want to Delete?'))
                {
                    // url //
                    var url = '{{ route("extstock.delete", ":id") }}';
                    url = url.replace(':id', stockid);
                    /////////
                    window.location.href=url;
                }
                else{
                    return false
                };
        }

        /************************/
       let OpenTransferModal = (p_id,p_name,p_code,p_qty,p_p_price,p_s_price,category_id) =>{
                
            const stock_name = $('#selectedstockname').val();
            const stock_id = $('#selectedstock').val();

             // external stock id 
            $('#es_id').val($('#selectedstock').val());
            $('#product_id').val(p_id);
            $('#category_id').val(category_id);
            $('#product_name').val(p_name);
            $('#product_code').val(p_code);
            $('#sale_price').val(p_s_price);
            $('#purchasing_price').val(p_p_price);
           
            

            if( stock_name == '' )
            {
                    alert('Please Select a Stock');
                   
            }
            else{

                    $("#exampleModal_transfer").show();
                    const detail = " Transfer <span style='font-weight:bold;color:red'>" + p_name  + "</span> To <span style='font-weight:bold;color:green'>" + $('#selectedstockname').val() + "</span>";

                    $('#details').html(detail);

                    $('#es-qty').attr('min',0);
                    $('#es-qty').attr('max',p_qty)
            }

           
    }

    const SelectStock  = (stock_id,stock_name) =>{

            $('#selectedstock').val(stock_id);
            $('#selectedstockname').val(stock_name);
            
    }

    const checkmaxqty = () =>{

        if( parseInt( $('#es-qty').val() ) > parseInt( $('#es-qty').attr('max') ) )
        {
            $('#es-qty').val(11);
            const max_msg = '<span style="color:red" >Maximum quantity is ' + $('#es-qty').attr('max') + '</span>';
            $('#max-msg').html(max_msg);
            
        }
        else{
            $('#max-msg').html('');
        }
    }
    
</script>
<style type="text/css">
    .fade-transfer:not(.show) {
    opacity: 1;
}
    .modal-transfer{
            position: fixed;
            top: 115px;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            display: none;
            /* overflow: hidden; */
            outline: 0
    }
</style>
<!-- modal transfer products-->
<div class="modal-transfer fade-transfer" id="exampleModal_transfer" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <form id="addtostock" action="{{route('addtoextstock')}}" method="post" class="modal-dialog" >
        @csrf
         <div class="modal-content">
            <div class="modal-header External-stock-header">
                <h5 class="modal-title" id="exampleModalLabel">Transfer Products</h5>
                <button type="button" id="close-transfer" class="close" data-dismiss="modal-transfer" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                 <div class="row">
                    <div class="col-12 mt-3" style="height: 30px" id="details" >

                    </div>
                </div>
                <!-- hidden data -->
                    <input type="hidden" id="product_id" name="product_id" value="">
                    <input type="hidden" id="category_id" name="category_id" value="">
                    <input type="hidden" id="product_name" name="product_name" value="">
                    <input type="hidden" id="product_code" name="product_code" value="">
                    <input type="hidden" id="sale_price" name="sale_price" value="">
                    <input type="hidden" id="purchasing_price" name="purchasing_price" value="">
                    <input type="hidden" id="es_id" name="es_id" value="">
                    

                <!-- end hidden data -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input id="es-qty" onchange="checkmaxqty();" onkeypress="checkmaxqty();" type="number" class="form-control" required="" max="" min="0" name="quantity" value="0">
                    <!--<input type="text" class="form-control" value="" required name="employee_name" id="employee_name"  placeholder="Enter Stock Name">-->
                </div>
                 <div class="row">
                    <div class="col-12 mt-3" style="height: 30px" id="max-msg" >

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"  id="close-btn-transfer" class="btn btn-secondary" data-dismiss="modal-transfer">Close</button>
                <button type="submit"  class="btn btn-primary">Transfer</button>
            </div>
        </div>
        </form >
</div>
<!------------------------>



<!-- modal create stock-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <form action="{{route('extstock.store')}}" method="post" class="modal-dialog" >
        @csrf
         <div class="modal-content">
            <div class="modal-header External-stock-header">
                <h5 class="modal-title" id="exampleModalLabel">Create External Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-3" >
                        <!--<div class="alert alert-success" role="alert" id="cat_msg"></div>-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">External Stock Name</label>
                    <input type="text" class="form-control" value="" required name="name" id="ext_stock_name"  placeholder="Enter Stock Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Employee Name</label>
                    <select  class="form-control" name="employee_id">
                        <option value="">Select Employee Name</option>
                        @foreach($employees as $emplpyee)
                        <option value="{{$emplpyee->id}}">{{$emplpyee->name}}</option>
                        @endforeach
                    </select>
                    <!--<input type="text" class="form-control" value="" required name="employee_name" id="employee_name"  placeholder="Enter Stock Name">-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="formcategory" class="btn btn-primary">Save</button>
            </div>
        </div>
        </form >
</div>

<!------------------------>
<!-- hidden inputs -->

<input type="hidden" id="selectedstock" name="" value="">
<input type="hidden" id="selectedstockname" name="" value="">
<!------------------------>
<div class="container-fluid " >
    <div class="row">
        <div class="col-6 ">
            
        </div>
        <div class="col-6 m-0 p-0">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-5 ">
                        
                    </div>
                    <div class="col-2 ">
                        <div class="btn-group  mr-3">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Price List
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('exportexcelpricelist')}}">Export as excel</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Export as PDF</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Print</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 ">
                        <button type="button" onclick="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-success float-right mr-3">Create External Stock</button>
                    </div>
                    <div class="col-2 ">
                        <button type="button" onclick="window.location.href='{{ route('stock.create') }}'" class="btn btn-success float-right mr-3">Add To Stock</button>
                    </div>
                </div>
            </div>
            <!-- pricelist options-->
                
                <!--end pricelist options-->
            <!--<button type="button" onclick="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-success float-right mr-3">Create External Stock</button>
            <button type="button" onclick="window.location.href='{{ route('stock.create') }}'" class="btn btn-success float-right mr-3">Add To Stock</button>-->
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
    <div class="row " style="overflow-y: auto;">
        <div class="col-8 content-shadow bg-white pt-3 " style="border-right: 4px solid #edeff2">
            <table class="table  table-striped table-bordered" id="example"  >
                <thead>
                <tr>
                    <th scope="col" colspan="9"> List Of Products - ( {{count($products)}} Products )</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sale Price</th>
                    <th scope="col">image</th>
                    <th scope="col">transfer</th>
                    <th scope="col"></th>
                    <!--<th scope="col"></th>-->
                </tr>
                </thead>
                <tbody>
                @foreach( $products as $key => $product)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{ $product->product_name}}</td>
                        <td>{{ $product->product_code}}</td>
                        <td>{{ $product->quantity}}</td>
                        <td>{{ $product->sale_price}}</td>
                        <td></td>
                        <td><img  data-toggle="modal" class="transfer-style" src="{{asset('svg/right-left-solid.svg')}}" onclick="OpenTransferModal('{{$product->product_id}}','{{$product->product_name}}','{{$product->product_code}}','{{$product->quantity}}','{{$product->purchasing_price}}','{{$product->sale_price}}','{{$product->category_id}}')"></td>
                        <td width="5%">
                        <button onclick="window.location.href='{{route('stock.edit',$product->id)}}'"  type="button" class="btn btn-info">Edit</button>
                        </td>
                        <!--<td width="5%">
                            @csrf
                        </td>-->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-4 bg-white" style="border-left: 4px solid #edeff2">
               @widget('ExternalStock')
        </div>
    </div>
</div>
