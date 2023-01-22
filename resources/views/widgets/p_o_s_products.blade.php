
<div class="container" >
    <div class="row" style="overflow-y: scroll;height: 700px">
        <div class="col-12 content-shadow">
            <table class="table tablestyle " id="table"  >
                <thead>
               <!--<tr >
                    <th  class="p-0" style="height: 20px" scope="col" colspan="8"> List Of Products</th>
                </tr>-->
                <tr >
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <!--<th scope="col">image</th>-->
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                <input type="hidden" id="product_qty_{{$product->product_id}}" value="{{$product->quantity}}">
                    <input type="hidden" id="product_price_{{$product->product_id}}" value="{{$product->sale_price}}">
                    <input type="hidden" id="purshase_price_{{$product->product_id}}" value="{{$product->purchasing_price}}">
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            {{$product->product_name}}
                            <input type="hidden" id="product_name_{{$product->product_id}}" value="{{$product->product_name}}">
                        </td>
                        <td>
                            {{$product->product_code}}
                            <input type="hidden" id="product_code_{{$product->product_id}}" value="{{$product->product_code}}">
                        </td>
                        @if($product->quantity <= $min_stock[0]->min_stock)
                        <td style="color: red" id="list-p-q-{{$product->product_id}}">{{$product->quantity}}</td>
                        @else
                        <td style="color: black" id="list-p-q-{{$product->product_id}}">{{$product->quantity}}</td>
                        @endif
                        <td id="price-p-q-{{$product->product_id}}"  >
                            {{$product->sale_price}}
                        </td>
                        <td width="5%">
                            <!--<button type="button" class="btn btn-info">Edit</button>-->
                            @if($product->quantity == 0)
                                <button disabled id="buttun_{{$product->product_id}}" onclick="AddToInvoice({{$product->product_id}},{{$product->purchasing_price}})"  type="button" class="btn btn-info">Add</button>
                            @else
                                <button id="buttun_{{$product->product_id}}" onclick="AddToInvoice({{$product->product_id}},{{$product->purchasing_price}})"  type="button" class="btn btn-info">Add</button>
                            @endif
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
