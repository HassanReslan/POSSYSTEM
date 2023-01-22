<script type="text/javascript">

    $( document ).ready(function() {

        //$('#loder-pos').css('z-index','-1');
        //$('#loder-pos').hide();

        
        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            url: "{{route('total',[request('date'),request('id')])}}",
            data:'',
            success: function (data) {
                //var result = 'Total:' + parseFloat(data).toFixed(2);
                //console.log(data);
               $('#total').html(data['total']);
               $('#p_total').html(data['net_total']);
            }
        });


        $('input[type=date]').on('change',function(){
 
            let date = $('input[type=date]').val();
           
            $('input[type=date]').val( $('input[type=date]').val() );
            //var url =date;
            const stockid = {{request('id')}};
            var param = date+'/'+stockid;
           
            var url ='http://localhost/POS/public/index.php/sales/pos/' + date+'/'+stockid;
            window.location.href=  url;
        });

        $("#all").removeClass('category_menu');
        $("#all").addClass('category_menu_active');
        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            url: "{{route('posproduct')}}",
            data:"stock_id={{request('id')}}",
            success: function (data) {
                $('#products').html(data);
            }
        });

      /*$('#search_product_txt').keyup(function(){

            var name = $('#search_product_txt').val();
            //console.log(name);
            $.ajax({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                url: "{{route('posproduct')}}",
                data:{ name:name },
                success: function (data) {
                    $('#products').html(data);
                }
            });

        });*/

        $('#search_product_txt').change(function(){

            var name = $('#search_product_txt').val();
            //console.log(name);
            $.ajax({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                url: "{{route('posproduct')}}",
                data:{ name:name,stock_id:{{request('id')}} },
                success: function (data) {
                    $('#products').html(data);
                }
            });

        });

        var path = "{{ route('autocomplete') }}";

        $('#search_product_txt').typeahead({
            source:  function (str, process)
            {
                return $.get(path, { str: str }, function (data) {
                return process(data);
                });
            },

            autoSelect: true

        });


    });

    function  ViewAllProcuts()
    {
        
        $(".cat-menu li").removeClass('category_menu_active');
        $(".cat-menu li").addClass('category_menu');

        $("#all").removeClass('category_menu');
        $("#all").addClass('category_menu_active');


        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            url: "{{route('posproduct')}}",
            data:"stock_id={{request('id')}}",
            success: function (data) {
                $('#products').html(data);
            }
        });
    }
    function  ViewProcuts(category_id)
    {
       
        $(".cat-menu li").removeClass('category_menu_active');
        $(".cat-menu li").addClass('category_menu');

        $("#" + category_id).removeClass('category_menu');
        $("#" + category_id).addClass('category_menu_active');

        //var path ='C:/xampp/htdocs/POS/pp/Http/Contorllers/ProductsController@index';
        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            url: "{{route('posproduct')}}",
            data:"category_id=" + category_id +"&stock_id={{request('id')}}",
             success: function (data) {
              $('#products').html(data);
             }
        });

    }
</script>

<div class="container-fluid  position-relative p-0 m-0"  style="height: auto">
    <div class="row p-0 m-0">
        <div class="col-12" >  
        <img onclick="window.location.href='{{route('dashboard')}}'" alt="Back" src="{{asset('svg/arrow-left-solid.svg')}}" style="width:30px;height:30px;cursor:pointer;">
        </div>
    </div>
    <div class="row m-0 p-0 position-absolute w-100 loader-style-gb" id="loder-pos">
        <div class="col-12 p-0 m-0">
                <div class="loader" style=""></div>
        </div>
    </div>
    <div class="row position-relative p-0" style="z-index:0;margin-top: -16px;">
        <div class="col-12">
            <div class="container-fluid bg-white pt-1 mt-3" style="height:100vh;position-relative">
                    <div class="row pr-3   mb-0 " style="height: 45px">
                        <div class="col-3" >
                        <h4>POS - {{$stock_name}}</h4>
                        </div>
                        <div class="col-5" >
                            <div class="row " id="sumtotal">
                                <div class="col-6 p-2 border border-light mb-2" >
                                    <span class="pos-total-span">Total: </span>
                                    <span  class="pos-total-nb-span" id="total"></span>
                                    <span class="pos-total-nb-span">$</span>
                                </div>
                               
                                <div class="col-6 p-2 border border-light mb-2" >
                                    @if(Auth::user()->role == 1)
                                    <span class="pos-net-span">Net: </span>
                                    <span class="pos-net-nb-span" id="p_total"></span>
                                    <span class="pos-net-nb-span">$</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-4 " id="date" style="" >
                            <label class="float-left" style="font-size: 22px">Date:</label>
                            <input type="date" id="date" value="{{request('date')}}" class="form-control text-center float-right" style="width: 200px">
                        </div>
                    </div>
                    <div class="row " style="overflow-x: hidden" >
                        <div class="col-8 border-right border-light" style="">
                            <div class="row p-0 ">
                                <div class="col-3 p-1 bg-white" style="border-right: 1px solid #cccccc;" >
                                    @widget('CategoriesMenu')
                                </div>
                                <div class="col-9" style="border-right: 1px solid #cccccc;height:auto">
                                    <div class="row">
                                        <div class="col-12">
                                            @widget('SearchBar')
                                        </div>
                                        <div class="col-12 p-0" id="products">
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4" style="height:700px;overflow-y:scroll">
                            @widget('Invoice')
                        </div>
                    </div>
                </div>                    
        </div>
    </div>
</div>
