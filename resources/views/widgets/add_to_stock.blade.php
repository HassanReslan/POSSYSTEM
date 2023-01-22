<script >
	$().ready(function(){

         $('.select2').select2();

		$('#product_name,#product_code').change(function(){
			
			var product_id = $('#product_name').val();

			// url //
			var url = '{{ route("product.show", ":id") }}';
			url = url.replace(':id', product_id);
			/////////

			/* Ajax Started */
			$.ajax({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                url:url,
                data:'',
                success: function (data) {
                	if(jQuery.isEmptyObject(data))
                	{
                          $('#checking-msg').text('This product is not in stock!');


                          //case add to stock
                          $('#flag').val(0);
                          /////////////////
                         
                         // get product data from product table//

                         // url //
                            var product_id = $('#product_name').val();
                            var url1 = '{{ route("productnotexist.show", ":id") }}';
                            url1 = url1.replace(':id', product_id);

                            $.ajax({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                                url:url1,
                                data:'',
                                 success: function (dataproduct) {

                                        //console.log(dataproduct);

                                         $('#product_code option').each(function(){
                                            if( $(this).val() == dataproduct.product_code)
                                            {
                                                $(this).attr('selected','selected');
                                            }
                                        });


                                        $('#category_id_hidden').val(dataproduct.category_id);
                                        $('#product_id_hidden').val(dataproduct.id);
                                        $('#product_name_hidden').val(dataproduct.product_name);
                                        $('#product_code_hidden').val(dataproduct.product_code);
                                        $('#select2-product_code-container').text(dataproduct.product_code);

                                        

                                        $('#quantity').val(0);
                                        $('#purchasing_price').val(0);
                                        $('#sale_price').val(0);
                                 }

                            });
                            /////////

                         ///
                        
                         //$('#product_code option').eq(0).prop('selected', true);
                         /*$('#quantity').val("");
                         $('#purchasing_price').val("");
                         $('#sale_price').val("");
                         $('#category_id_hidden').val("");
                         $('#product_id_hidden').val("");
                         $('#product_name_hidden').val("");
                         $('#product_code_hidden').val("");*/

                	}
                	else{

                         $('#checking-msg').text('');

                           //case edit to stock
                          $('#flag').val(1);
                          /////////////////

                        //$('#product_code').children("option: selected").val(data.product_code);
                        //$('#product_code option').eq(0).prop('selected', true);
                        $('#product_code option').each(function(){
                            if( $(this).val() == data.product_code)
                            {
                                $(this).attr('selected','selected');
                            }

                        });

                        $('#category_id_hidden').val(data.category_id);
                        $('#product_id_hidden').val(data.product_id);
                        $('#product_name_hidden').val(data.product_name);
                        $('#product_code_hidden').val(data.product_code);
                        $('#select2-product_code-container').text(data.product_code);
                        

                        $('#quantity').val(data.quantity);
                        $('#purchasing_price').val(data.purchasing_price);
                        $('#sale_price').val(data.sale_price);
                	}
                }
            });
            /* Ajax finished */
		});


	})
	
</script>
<style >
   
</style>
<div class="container-fluid  mt-3 p-3" >

  <div class="row">
      <div class="col-12">
         @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
      </div>
  </div>
  
	<div class="row">
			<div class="col-12 p-2 External-stock-header">
				<h3>Add To Stock</h3>
			</div>
	</div>
	
	<!-- div for checking by prodcut name and code if product is exist-->
    <form action="{{route('stock.store')}}" method="post" enctype="multipart/form-data">
        @csrf
	<div class="row ">
		<div class="col-12 border form-outline pl-5  pt-3 pb-3 contetn-shadow mb-4 bg-white">
			<div class="row">
				<div class="col-6">
					 <label for="exampleInputEmail1">Product Name</label>
              <select id="product_name" class="form-control select2" name="product_name">
                  <option value="">Select Product</option>
                  @foreach($products as $product)

                       <?php
                        $selectedproduct = ( old('product_name') == $product->id  ? 'selected' : '');
                       ?>
                      <option <?php echo $selectedproduct ;?>  value="{{$product->id}}">{{$product->product_name}}</option>
                  @endforeach
              </select>
                @if($errors->has('product_name'))
                      <strong class="error text-danger" >{{ $errors->first('product_name') }}</strong>
                @endif
				</div>
				<div class="col-6">
					 <label for="exampleInputEmail1">Product Code</label>
                <select id="product_code" class="form-control select2" name="product_code">
                    <option value="0">Select Code</option>
                    @foreach($products as $product)
                         <?php
                          $selectedcode = ( old('product_code') == $product->product_code  ? 'selected' : '');
                         ?>
                        <option <?php echo $selectedcode ;?> value="{{$product->product_code}}">{{$product->product_code}}</option>
                    @endforeach
            	</select>
				</div>
			</div>
		</div>
	</div>
	<!-- end of checking div -->

    <div class="row">
        <div class="col-12 text-center text-danger p-3" id="checking-msg">

        </div>
    </div>
	<div class="row">
			<div class="col-12 border form-outline pl-5  pt-3 contetn-shadow bg-white">
            
                
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <!-- hidden data -->
                <input type="hidden" id="category_id_hidden" name="category_id" value="{{ old('category_id') }}" />
                <input type="hidden" id="product_id_hidden" name="product_id" value="{{ old('product_id') }}" />
                <input type="hidden" id="product_name_hidden" name="product_namehidden" value="{{ old('product_namehidden') }}" />
                <input type="hidden" id="product_code_hidden" name="product_codehidden" value="{{ old('product_codehidden') }}" />
                <input type="hidden" id="flag" name="flag" value="{{ old('flag') }}" />
                <!-- ---- -->
                <div class="form-group ">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Supplier</label>
                                <select class="form-control select2" name="supplier_name">
                                    <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <?php
                                          $selected = ( old('supplier_name') == $supplier->id  ? 'selected' : '');
                                        ?>
                                        <option <?php echo $selected ;?>  value="{{$supplier->id}}">{{$supplier->suplier_f_name}}{{$supplier->suplier_l_name}}</option>
                                    @endforeach
                                </select>
                                 @if($errors->has('supplier_name'))
                                    <strong class="error text-danger" >{{ $errors->first('supplier_name') }}</strong>
                                 @endif
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label >Quantity</label>
                                <input type="number" readonly class="form-control w-50" value="{{ old('quantity') }}" id="quantity" name="quantity"  aria-describedby="emailHelp" placeholder="">
                               
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label >New Quantity</label>
                                <input type="number"  class="form-control w-50" value="0" id="new_quantity" name="new_quantity"  aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                         <div class="col-2">
                           <div class="form-group">
                                <label >Purchasing Price</label>
                                <input type="number" min="0" class="form-control w-50" value="{{ old('purchasing_price') }}" id="purchasing_price" name="purchasing_price"  step="any">
                                  @if($errors->has('purchasing_price'))
                                    <strong class="error text-danger" >{{ $errors->first('purchasing_price') }}</strong>
                                  @endif
                            </div>
                        </div>
                         <div class="col-3">
                            <div class="form-group">
                                <label >Sale Price - $</label>
                                <input type="number" min="0" class="form-control w-25" value="{{old('sale_price') }}" id="sale_price" name="sale_price"  step="any">
                                @if($errors->has('sale_price'))
                                    <strong class="error text-danger" >{{ $errors->first('sale_price') }}</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 right">
                        <button type="submit" class="btn btn-primary "  style="float: right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>