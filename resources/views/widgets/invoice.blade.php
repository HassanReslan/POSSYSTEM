<meta name="csrf_token" content="{{ csrf_token() }}" />
<script>
    $(document).ready(function(){

        /* $.ajaxStart(function (){
              
            })*/


            
        var number = parseInt($('#invoice_number').val());
        number = number + 1;

        OpenInvoice();
        tabclick(number);

        $('#open_invoice').click(function(){
            var number = parseInt($('#invoice_number').val());
            number = number + 1;
            OpenInvoice();

            tabclick(number);

        });
    });

    function tabclick(number)
    {
        GenerateInvoiceNumber(number);

        var div_id = 'div'+number;

        $('#current_invoice').val(number);

        $('#invoice-nb ul li').removeClass('invoice_nb_li_active');
        $('#invoice-nb ul li').addClass('invoice_nb_li');

        $('#tab-'+ number).removeClass('invoice_nb_li');
        $('#tab-'+ number).addClass('invoice_nb_li_active');

        $('#invoice-content div').hide();
        $('#' + div_id ).show();

        $('#invoice-customer div').hide();
        $('#customer_div_' + number ).show();

        $('#invoice-save button').hide();
        $('#save_' + number ).show();
        $('#close_' + number ).show();

    }
    function  SaveInvoice(invoice_number,stock_id)
    {
        let customer_id = $('#customer_'+invoice_number).val();
        if(customer_id == 0 )
        {
            //$('#customer_'+invoice_number).css('border','1px solid red');
            $(".select2").css('border','1px solid red');
        }
        else{
            //$('#customer_'+invoice_number).css('border','1px solid gray');
            $(".select2").css('border','1px solid gray');
            const d = new Date();
            let day = d.getDay();
            let month = d.getMonth();
            let year = d.getFullYear();

            let invoice_nb = day+''+month+''+year+'-'+invoice_number +'-' + stock_id;

            let total=  $('#total_'+invoice_number).html();
            var dates = '{{request('date')}}';

            var product_array = [];
            var qty_array = [];
            var price_array = [];
            var p_price_array = [];
            var discount_array = [];
            var id_array = [];
            var i = 0;
            var rowcount = $('#invoice_table_'+ invoice_number+' tr').length;

            $('#invoice_table_' + invoice_number).find('tr').each(function (i,el) {
                var product_id = $(this).find('#product_id').val();
                var $tds = $(this).find('td'),
                    productname = $tds.eq(0).text(),
                    Quantity = $(this).find('#inp_inv-p-q-'+ product_id + '-' + invoice_number).val(),
                    price = $(this).find('#inp_inv-p-p-'+ product_id + '-' + invoice_number).val(),
                    p_price = $tds.eq(2).attr('name'),
                    discount = $(this).find('#inp_inv-p-d-'+ product_id + '-' + invoice_number).val();
                // do something with productId, product, Quantity

                if(i >1 && i < rowcount )
                {
                    product_array.push(productname);
                    qty_array.push(Quantity);
                    price_array.push(price);
                    p_price_array.push(p_price);
                    discount_array.push(discount);
                    id_array.push(product_id);
                }
                i++;
            });
            
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ajaxStart(function() {
                $('#loder-pos').css('z-index','1');
                $('#loder-pos').show();
                }).ajaxStop(function() {
                    $('#loder-pos').css('z-index','-1');
                    $('#loder-pos').hide();      
                });

            $.ajax({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                type:"GET",
                url: '{{route('SaveInvoice')}}',
                data:{ id_array:id_array,product_array:product_array,qty_array:qty_array,price_array:price_array,p_price_array:p_price_array,discount_array:discount_array,invoice_nb:invoice_nb,customer_id:customer_id,total:total,date:dates,stock_id:stock_id},
                success: function (response,status) {
                    $('#customer_div_' + invoice_number).html(response);
                    //$("#products").load("{{route('posproduct')}}");
                    $("#close_"+invoice_number).hide();
                    $("#save_"+invoice_number).hide();
                    // sum of total
                    $.ajax({
                        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                        url: "{{route('total',[request('date'),request('id')])}}",
                        data:'',
                        success: function (data) {
                            //var result = 'Total:' + parseFloat(data).toFixed(2);
                            //console.log(data);
                            $('#total').html(data['total']);
                           // $('#p_total').html(data['net_total']);
                            //OpenInvoice();
                            window.location.href ="{{route('pos',[request('date'),request('id')])}}";
                        }
                    });

                    ///////////
                },
                error: function(error) {
                   // console.log(error);
                }
            });
        }


    }

    /*generate invoice number */
    function GenerateInvoiceNumber(number)
    {
        const d = new Date();
        let day = d.getDay();
        let month = d.getMonth();
        let year = d.getFullYear();
        const stock_id = {{request('id')}};
        let invoice_nb = day+''+month+''+year+'-'+number + '-'+ stock_id;
        //return invoice_nb;
        $('#invoice_number_text').text(invoice_nb);
       

    }

    function  RemoveInvoivce(number)
    {
        $('#div' + number).remove();
        var invoice_content =  '<div id="div' + number +  '" class="invoice-content"><table id="invoice_table_' + number + '" width="100%"><thead><th>Name</th><th>Qty</th><th>Price</th><th>Disc %</th></thead><tfoot><tr><td>Total:</td><td id="total_'+number+'" colspan="3">0</td></tr></tfoot></table></div>';
        $('#invoice-content').append(invoice_content);
       $("#products").load("{{route('posproduct')}}");

    }

    function OpenInvoice()
    {

        //var number = GenerateInvoiceNumber();

        var number = parseInt($('#invoice_number').val());
        number = number + 1;
        /*create invoice number */
        const d = new Date();
        let day = d.getDay();
        let month = d.getMonth();
        let year = d.getFullYear();
        let invoice_nb = day+''+month+''+year+'-'+number;
        /***********/

        $('#invoice_number').val( number );

        var new_li = '<li onclick="tabclick('+number+')" class="invoice_nb_li" id="tab-' + number +  '"> ' + number + '</li>';

        var option_html = '<option value="0" >Choose Customer</option>';

        var  option_html_list = '@foreach($customers as $customer) <option value="{{$customer->id}}">{{$customer->name}}</option> @endforeach' ;

        var option_html = option_html + option_html_list;

        var select_html = '<select class="form-control select2" id="customer_'+number+'">'+ option_html + '</select>';

        var customer_section = '<div  id="customer_div_'+number+'" style="width: 100%;height: 40px;border: 0px solid;">' + select_html +'</div>';
        var invoice_content =  '<input type="hidden" value="0" id="count_'+number+'"><div id="div' + number +  '" class="invoice-content"><table border="0" id="invoice_table_' + number + '" width="100%"><thead><th>Name</th><th>Qty</th><th>Price</th><th>Disc %</th><th></th></thead><tfoot><tr><td style="text-align: left">Total:</td><td style="text-align: left" id="total_'+number+'" colspan="4">0</td></tr></tfoot></table></div>';
        var save_btn = '<button id="close_'+ number + '" onclick="RemoveInvoivce(' +number+ ');"  type="button" class="btn btn-info" style="float: left">Cancel</button><button onclick="SaveInvoice('+number+',{{request('id')}})" id="save_'+ number + '" onclick=""  type="button" class="btn btn-info" style="float: right">Save</button>';
        var save_invoice= '<div  id="save_div_'+number+'" style="width: 100%;height: 40px;border: 0px solid;position: absolute ">' + select_html +'</div>';

        $('#invoice-nb ul').append(new_li);
        $('#invoice-content').append(invoice_content);
        $('#invoice-customer').append(customer_section);
        $('#invoice-save').append(save_btn);

        $('.select2').select2();


    }

    function AddToInvoice(key,p_price)
    {

        var div_number = $('#current_invoice').val();
        var p = parseFloat($('#price-p-q-'+key).html());
        var q = parseInt($('#list-p-q-'+key).html());

        if($('#inv-p-q-'+key+'-'+div_number).html() == undefined )
        {
            var row = '<tr id="row_' + key + '-' + div_number + '"><input type="hidden" id="product_id" value="'+key+'"><td style="text-align: left">'+ $("#product_name_"+key).val() +'</td><td id="inv-p-q-' + key + '-' + div_number + '" ><input   type="number" min="0" max="'+q+'"  onchange="EditQuantity('+key+','+div_number+','+p+')" id="inp_inv-p-q-' + key + '-' + div_number + '" value="1" style="width: 50px;text-align: center"></td>' +
                '<td name="'+ p_price +'"  id="inv-p-price-' + key + '-' + div_number + '"><input type="hidden" value="'+ p +'" id="hidden_inp_inv-p-p-' + key + '-' + div_number + '" style="width: 75px;text-align: center"><input type="text" onchange="EditPrice('+key+','+div_number+','+p+')" value="'+$("#product_price_"+key).val()+'" id="inp_inv-p-p-' + key + '-' + div_number + '" style="width: 75px;text-align: center"></td>' +
                '<td id="inv-p-d-' + key + '-' + div_number + '"><input type="number" min="0" max="100"  onchange="EditTotalDiscount('+key+','+div_number+','+p+')" id="inp_inv-p-d-' + key + '-' + div_number + '"   value="0" style="width: 50px;text-align: center"></td><td><img onclick="DeleteRow('+key+','+div_number+','+p+')" id="del_' + key + '-' + div_number + '" src="{{asset('icons/delete.png')}}" style="width:30px;height:30px;cursor:pointer"></td></tr>';
            $('#div' + div_number +' table').append(row);
            $('#count_'+div_number).val(parseInt($('#count_'+div_number).val()) + 1);

        }
        else{

                
           $('#inp_inv-p-q-'+key+'-'+div_number).val(parseInt($('#inp_inv-p-q-'+key+'-'+div_number).val()) + 1 );

            var price = parseFloat($('#price-p-q-'+key).html() );
            var qtty = parseInt( $('#inp_inv-p-q-'+key+'-'+div_number).val() );
            $('#inp_inv-p-p-'+key+'-'+div_number).val( price  * qtty );
        }


            var max = $('#product_qty_'+key).val();
            $('#inp_inv-p-q-'+key+'-'+div_number).prop('max',max);

            var increase_qty = ( parseInt($('#list-p-q-'+key).html())  - 1 );
           $('#list-p-q-'+key).html( increase_qty );

        //$('#product_qty_'+key).val( increase_qty );

        if( parseInt( $('#list-p-q-'+key).html() ) <= 0)
        {
            $('#buttun_'+key).prop('disabled', true);
        }

        

        EditTotal(key,div_number,p);

    }
    ///// end of AddToInvoice function ///////
    var price_array = [];
    function EditPrice(key,div_number,p)
    {
        var new_price = $('#inp_inv-p-p-'+key+'-'+div_number).val();
        $('#hidden_inp_inv-p-p-'+key+'-'+div_number).val(new_price);
        EditTotal(key,div_number,$('#hidden_inp_inv-p-p-'+key+'-'+div_number).val());
    }
    
    function Total(key,div_number)
    {

        var d = 0;
        var sum = 0;
        var rowcount = $('#invoice_table_'+ div_number+' tr').length;
        $('#invoice_table_' + div_number).find('tr').each(function (i, el) {
            var product_id = $(this).find('#product_id').val();
            var $tds = $(this).find('td'),
            price = $(this).find('#inp_inv-p-p-'+ product_id + '-' + div_number).val();

            if(d <1 )
            {
                sum = 0
                price_array = [];
                $('#total_'+div_number).html(sum);
            }
            if(d >1 && d < rowcount )
            {
                    price_array[d]=parseFloat(price,2);
            }
            d++;
        });

        sum = price_array.reduce((x, y) => x + y);
        //sum = parseFloat(sum).toFixed(2);
        price_array = [];

        $('#total_'+div_number).html(sum);
    }

    function DeleteRow(key,div_number,p)
    {
        if(confirm("Are you sure you want to Delete This Product?"))
        {
            $("#row_" + key + '-' + div_number ).remove();
            EditTotal(key,div_number,p);
            //Total(key,div_number);
        }
        else{
            return false;
        }

    }
    /* edit discount */
    function EditTotalDiscount(key,div_number,p)
    {
        EditTotal(key,div_number,$('#hidden_inp_inv-p-p-'+key+'-'+div_number).val());
    }
    /*edit total */
    function EditTotal(key,div_number,p)
    {
        var qty= [];
        var invoice_qty = [];
        var discount = [];
        var k= key-1;
        qty[k] = $('#product_qty_'+key).val();
        //qty[k] = parseInt($('#list-p-q-'+key).html());
        invoice_qty[k] = $('#inp_inv-p-q-' + key + '-' + div_number).val();
        discount[k] = $('#inp_inv-p-d-' + key + '-' + div_number).val();


        var qtty = parseInt( $('#inp_inv-p-q-' + key + '-' + div_number).val() );
        ///////
        let disc  = $('#inp_inv-p-d-'+ key + '-' + div_number).val();
        var pp  = $('#hidden_inp_inv-p-p-'+key+'-'+div_number).val()  * qtty;
        let discs = (pp*disc)/100;
        discs = parseFloat(discs).toFixed(2);
        ///////////////
        pp = parseFloat(pp).toFixed(2);
        let fpp = pp - discs;
        fpp =  parseFloat(fpp).toFixed(2);
        //console.log(fpp);
        $('#inp_inv-p-p-'+key+'-'+div_number).val( fpp );

        Total(key,div_number);
    }

    function EditQuantity(key,div_number,p)
    {   
        var input_qty =parseInt($('#inp_inv-p-q-'+key+'-'+div_number).val());
        
        var stock_qty = parseInt($('#product_qty_'+key).val());

        if(input_qty > stock_qty )
        {  
            $('#inp_inv-p-q-'+key+'-'+div_number).val(stock_qty);
            var increase_qty = ( 0 );
        }

       if( input_qty < 0)
        {
            $('#inp_inv-p-q-'+key+'-'+div_number).val(0);
        }

         
       
        $('#list-p-q-'+key).html(increase_qty);
       
        if( increase_qty == 0)
        {
            $('#buttun_'+key).prop('disabled', true);
        }
        else{
              $('#buttun_'+key).prop('disabled', false);
        }
        EditTotal(key,div_number,p);

    }
</script>

<div class="container-fluid p-0">

    <div class="row" style="background-color: #7386D5;">
        <div class="col-10" style="color: white;font-weight: bold">
            Invoice <span id="invoice_number_text"></span>
        </div>
        <div class="col-2" style="cursor: pointer">
            <!--<i id="open_invoice"  class="fa fa-plus fa-xl"></i>-->
            <input type="hidden" value="{{count($invoices)}}" id="invoice_number">
            <input type="hidden" value="" id="current_invoice">

        </div>
    </div>
    <div class="row">
        <div class="col-12 p-0 " id="invoice-nb" >
            <ul id="#invoice_nb_ul" style="padding: 0;margin: 0;width: 100%;min-height: 30px; height: auto;border:0px solid red">
                @foreach($invoices as $key => $invoice)
                    <li onclick="tabclick({{$key+1}})" class="invoice_nb_li" id="tab-{{$key+1}}">{{$key+1}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row" style="min-height: 40px;">
        <div class="col-12  p-0" id="invoice-customer">
            @foreach($invoices as $key => $invoice)
                <div  id="customer_div_{{$key+1}}" style="width: 100%;height: 40px;border: 0px solid;position: absolute ">
                    <select class="form-control" id="customer_{{$key+1}}">
                        <option value="0">Choose Customer</option>
                        @foreach($customers as $customer)
                            @if($customer->id == $invoice->customer_id)
                                <option selected value="{{$customer->id}}">{{$customer->name}}</option>
                            @else
                                <option  value="{{$customer->id}}">{{$customer->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row" style="min-height: 250px;">
        <div class="col-12  p-0" id="invoice-content">
            @foreach($invoices as $key => $invoice)
                <?php
                //DB::enableQueryLog();
                $invoice_contents =  DB::table('content_invoices')->select('id','product_id','product_name','quantity','price','discount')->where('invoice_id','=', $invoice->id)->get();
                //dd(DB::getQueryLog());

                ?>

                <div  id="div{{$key+1}}" class="invoice-content">
                    <table id="invoice_table_{{$key+1}}" width="100%">
                        <thead>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Disc %</th>
                        </thead>
                        <tbody>
                        @foreach($invoice_contents as $k => $invoice_content)
                            <tr>
                                <td >
                                    {{$invoice_content->product_name}}
                                </td>
                                <td >
                                    <input readonly type="number" style="width: 50px" value="{{$invoice_content->quantity}}" id="inp_inv-p-q-{{$invoice_content->product_id}}-{{$key+1}}">
                                </td>
                                <td >
                                    {{$invoice_content->price}}
                                </td>
                                <td>
                                    <input readonly type="number" style="width: 50px" value="{{$invoice_content->discount}}" id="inp_inv-p-q-{{$invoice_content->product_id}}-{{$key+1}}">
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                        <tr>
                            <td>Total:</td>
                            <td id="total_{{$key+1}}" colspan="3">{{$invoice->total}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row" style="min-height: 300px;height: auto">
        <div class="col-12  p-0" id="invoice-save">

        </div>
    </div>
</div>
