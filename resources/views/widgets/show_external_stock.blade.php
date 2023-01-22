<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: false,
            info: false,
        });

         
        $('#close-btn,#close').click(function(){
           
            $('#es-qty').val(0);
            //return false;
        })

         /*const returned_qty = $('#es-qty').val();
           
           if(returned_qty > qunatity)
           {
               alert('You can return max' + qunatity +' product');
           }*/

          $('#returnform').on('submit',function(e){
           
            const totalqty = parseInt($('#totalqty').val());
            const returnedqty = parseInt($('#es-qty').val());
            const rowid = parseInt($('#id').val());
            if(returnedqty > totalqty)
            {
                alert('You can return max ' + totalqty + ' product');
            }
            else if( returnedqty < 1){
                alert('You can  return min 1 product');
            }
            else{
                $("#returnform").submit();
            }
            e.preventDefault();
          }) 
    });

     $('#es-qty').focus(function(){
            $(this).select();
        })

    const checkmaxqty = () =>{

            if( parseInt( $('#es-qty').val() ) > parseInt( $('#es-qty').attr('max') ) )
            {
                $('#es-qty').val();
                const max_msg = '<span style="color:red" >Maximum quantity is ' + $('#es-qty').attr('max') + '</span>';
                $('#max-msg').html(max_msg);
                
            }
            else{
                $('#max-msg').html('');
            }
    }

    function ReturnProduct(id,product_id,qunatity){
        
        if(qunatity == 0 )
        {
            alert('Can not return this Product because the quantity equal 0');
        }
        else{
            
            const stock_id = $('#selectedstock').val();

             // external stock id 
           
            $('#product_id').val(product_id);
            $('#totalqty').val(qunatity);
            $('#id').val(id);

            $('#exampleModal').show();
        }
    }
</script>
<style>
    
    .table tr th {
        text-align:center !important;
    }
    .stock_details{
        font-family:arial;
        font-size:16px;
        height:40px;
    }
    .stock_details div{
        text-align:left;

    }
</style>
<?php
//echo count($info);
    //print_r($info);
   // exit;
?>
@if(is_object($info) )
<input type="hidden" id="stock_id" name="stock_id" value="{{$info[0]->sid}}">
<!-- modal transfer products-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <form id="returnform" action="{{route('retruntostock',$info[0]->sid)}}" method="post" class="modal-dialog" >
        @csrf
         <div class="modal-content">
            <div class="modal-header External-stock-header">
                <h5 class="modal-title" id="exampleModalLabel">Return Product To Main Stock</h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
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
                    <input type="hidden" id="totalqty" name="totalqty" value="">
                    <input type="hidden" id="id" name="id" value="">
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
                <button type="button"  id="close-btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-primary">Return</button>
            </div>
        </div>
        </form >
</div>
<!------------------------>

<div class="container-fluid mt-2 p-2 bg-white">
    <div class="row mb-5">
       <div class="col-12">
        <div class="container-fluid bg-light p-0 m-0">
            <h5 class="External-stock-header">Stock Informations</h5>
            <div class="row stock_details p-2">
                <div class="col-1 text-right">Stock Name:</div>
                <div class="col-1">{{$info[0]->sname}}</div>
                <div class="col-1 text-right text-nowrap">Employee Name:</div>
                <div class="col-1">{{$info[0]->ename}}</div>
                <div class="col-8"></div>
            </div>
            <div class="row stock_details p-2">
                <div class="col-1 text-right">Products:</div>
                <div class="col-1">{{count($info)}}</div>
                <div class="col-1 text-right text-nowrap">Sales:</div>
                <div class="col-1"></div>
                <div class="col-8"></div>
            </div>
        </div>
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
    
    <h5 class="External-stock-header">List of Products In {{$info[0]->sname}}</h5>
    <div class="row">
        <div class="col-12">
            <table class="table  table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Return to Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @if(is_object($info))
                    @foreach($info as $key => $val)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$val->product_name}}</td>
                        <td>{{$val->product_code}}</td>
                        <td>{{$val->quantity}}</td>
                        <td>{{$val->sale_price}} $</td>
                        <td><button data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="ReturnProduct({{$val->rowid}},{{$val->product_id}},{{$val->quantity}});" class="btn btn-primary">Return</button></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">Stock is Empty!</td>
                    </tr>
                    @endif                    
                </tbody>
            </table>
       </div>
    </div>
</div>
@else
    <div class="container-fluid mt-2 p-2 bg-white">
        <div class="row mb-5">
            <div class="col-12">
                This Stock is empty!
            </div>
        </div>
    </div>
@endif
 