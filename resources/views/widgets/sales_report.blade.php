

<script>
    $(document).ready(function(){
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose:true //to close picker once year is selected 
        });

        $("#datepicker").one('change', function(e) {
            const year = $("#datepicker").val();
            url = "{{route('report.sales',':year')}}";
            url = url.replace(':year', year);
            window.location.href = url;
        });

        $('#custom_range').on('click',function(){
           const formday = $('#from').val();
           const today = $('#to').val();
           if(formday == '')
           {
               $('#from-error').html('please select a start date');
             //console.log('please select a start date');
           }
           if(today=='')
           {
               $('#to-error').html('Please select an end date');
           }
           if(formday != '' && today != '' )
           {    
                url = "{{route('salescustomrange',[':from',':to'])}}";
                url = url.replace(':from',formday);
                url = url.replace(':to',today);
               
                $.ajax({
                    headers: {'X-CSRF-Token' : $('meta[name=_token]').attr('content')},
                    url: url,
                    data:'',
                    success: function (data) {
                    $('#custom_range_result').html(data);
                    }
                }); 
           }
        })

         $('#from').change(function(){
            $('#from-error').html(''); 
         })

         $('#to').change(function(){
            $('#to-error').html(''); 
         })

    });
</script>
<div class="container-fluid    mt-3 p-3">
    <div class="row mb-2 ">
        <div class="col-1 p-0" >
            <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Select Year"/>
        </div>
        <div class="col-11"></div>
    </div>
    <div class="row gx-5 p-0">
        <div class="col-8 p-0" >
            <div class="p-3 border bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h3>Sales Report Of Year {{request('year')}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                          <ul class="w-100 p-1 m-0">
                            @for($i=1;$i<=12;$i++)
                            <li onclick="window.location.href='{{route('mounthlysalesreport',["month"=>$i,"year"=>request('year')])}}'" class="w-25 border border-dark float-left p-2 {{(date('m')==$i ?'expenses-li-active':'expenses-li')}}" style="">
                                <h3>{{date('F', mktime(0, 0, 0, $i, 10))}}</h3>
                                <br>
                                
                                <h4 style="color:green">Sales:{{(isset($monthly_total[$i]) ? $monthly_total[$i]: 0)}} $</h4>
                                <h4 style="color:green">Net:{{(isset($net[$i]) ? $net[$i]: 0)}} $</h4>

                                @if($i>1)
                                    <?php
                                    if($net[$i] > $net[$i-1])
                                    {
                                        ?>
                                        <span style="color:green"> &#11165;</span>
                                        <?php
                                    }else if($net[$i] < $net[$i-1]){
                                        ?>      
                                        <span style="color:red">	&#11167;</span>
                                        <?php
                                    }
                                    ?>
                                @endif

                            </li>
                            @endfor
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
                <div class="p-3 border bg-white">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h4>Custom Range</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <lable>
                                        From:
                                    </lable>
                                    <input class="form-control " type="date" id="from" name="from" >
                                    <span style="color:red" id="from-error"></span>
                                </div>
                                <div class="mb-2">
                                    <lable>
                                        To:
                                    </lable>
                                    <input class="form-control " type="date" id="to" name="to" >
                                    <span style="color:red" id="to-error"></span>
                                </div>
                                <div class="">
                                    <button  class="btn btn-primary float-right" id="custom_range" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12" id="custom_range_result">
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

