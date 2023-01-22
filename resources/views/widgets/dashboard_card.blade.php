<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card-counter info cards-shadow">
                <i class="fa fa-dollar"></i>
                <span class="count-numbers">{{$sales}}</span><br>
                <span class="count-name">SALES</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter success cards-shadow"  >
                <i class="fa fa-dollar"></i>
                <span class="count-numbers">{{round($net,2)}}</span><br>
                <span class="count-name">Net</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter danger cards-shadow">
                <i class="fa fa-dollar"></i>
                <span class="count-numbers">{{$expenses}}</span>
                <span class="count-name">Expenses</span>
            </div>
        </div>
        <div class="col-md-3 " >
            <div class="card-counter primary cards-shadow"  >
                <i class="fa fa-archive"></i>
                <span class="count-numbers">{{$products}}</span>
                <span class="count-name">Products</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter danger cards-shadow"  >
                <i class="fa fa-user"></i>
                <span class="count-numbers">{{$customers}}</span>
                <span class="count-name">Customers</span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-counter info cards-shadow"  >
                <i class="fa fa-users"></i>
                <span class="count-numbers">{{$users}}</span>
                <span class="count-name">Users</span>
            </div>
        </div>

    </div>
</div>
