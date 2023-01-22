
<script>
        $('document').ready(function(){
            $('#custom_range').click(function(){
               
               const formdate = $('#from').val();
               const to = $('#to').val();
               const url = "{{route('customrange')}}?flag=8&from=" + formdate + "&to=" +to;
               window.location.href = url;
            })
        })
    </script>
    <div class="contianer-fluid mt-2 p-2">
        <div class="row">
            <div class="col-11 p-2">
                <h3>
                <?php
                    $flag = request('flag');
                    switch($flag)
                    {
                        case 1:
                           echo "Today";
                        break;
                        case 2:
                            echo "Yesterday";
                        break;
                        case 3:
                            echo "Last 7 Days";
                        break;
                        case 4:
                            echo "Last 30 Days";
                        break;
                        case 5:
                            echo "This Month";
                        break;
                        case 6:
                            echo "This Year";
                        break;
                        case 7:
                            echo "Last Year";
                        break;
                        case 8:
                            echo "Range  Between (" . request('from') . ")-(" .request('to') . ")";
                        break;
                        default:
                        
                        break;
                    }
                    ?>
                    </h3>
            </div>
            <div class="col-1 p-2 " >
                <div class="dropdown show float-right">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Date Range
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('report.stocks',1)}}">Today</a>
                        <a class="dropdown-item" href="{{route('report.stocks',2)}}">Yesterday</a>
                        <a class="dropdown-item" href="{{route('report.stocks',3)}}">Last 7 Days</a>
                        <a class="dropdown-item" href="{{route('report.stocks',4)}}">Last 30 Days</a>
                        <a class="dropdown-item" href="{{route('report.stocks',5)}}">This Month</a>
                        <a class="dropdown-item" href="{{route('report.stocks',6)}}">This Year</a>
                        <a class="dropdown-item" href="{{route('report.stocks',7)}}">Last Year</a>
                        <a class="dropdown-item" href="#">Custom Range</a>
                            <div  class="form-group" style="width:200px;height:200px;padding:5px;border:1px solid #cccccc">
                                <div class="mb-2">
                                    <lable>
                                        From:
                                    </lable>
                                    <input class="form-control " type="date" id="from" name="from">
                                </div>
                                <div class="mb-2">
                                    <lable>
                                        To:
                                    </lable>
                                    <input class="form-control " type="date" id="to" name="to">
                                </div>
                                <div class="">
                                   <button  class="btn btn-primary float-right" id="custom_range" type="button">View</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12   p-0">
                @widget('MainStockReports')
            </div>
        </div>
        <div class="row mt-4 p-0">
            <div class="col-12   ">
                @widget('ExternalStockReports')
            </div>
        </div>
    </div>
    