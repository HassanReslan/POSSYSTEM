
<nav id="sidebar" class="navbar-style">
    <!--<div class="sidebar-header" style="border:1px solid red; height:30px;">
        <h3>POS</h3>
    </div>-->
    <ul class="list-unstyled components">
         @if(Auth::user()->role == 1)
        <li  >
            <a href="{{route('dashboard')}}"><img src="{{asset('svg/chart-line-solid.svg')}}" class="es-nav-icon">Dashboard</a>
        </li>
        @endif
        @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3 )
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{asset('svg/cart-plus-solid.svg')}}" class="es-nav-icon">POS</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                       <a href="{{route('pos',['date'=>date('Y-m-d'),'id'=>0])}}">Main Stock</a>
                    </li>
                    @foreach($stocks as $stock)
                    <li>
                        <a href="{{route('pos',['date'=>date('Y-m-d'),'id'=>$stock->id])}}">{{$stock->name}}</a>
                    </li>
                    @endforeach
                </ul>
        </li>

        <li>
            <a href="{{route('sales')}}">
            <img src="{{asset('svg/file-invoice-solid.svg')}}" class="es-nav-icon">Invoices
            </a>
        </li>
       
        <li>
            <a href="{{route('categories')}}"><img src="{{asset('svg/elementor.svg')}}" class="es-nav-icon">Categories</a>
        </li>
        <li>
            <a href="{{route('products')}}"><img src="{{asset('svg/product-hunt.svg')}}" class="es-nav-icon">Products</a>
        </li>
        <li>
            <a href="{{route('stock')}}"><img src="{{asset('svg/cart-flatbed-solid.svg')}}" class="es-nav-icon">Stock</a>
        </li>
       
        
        
        <li>
            <a href="{{route('employees')}}"><img src="{{asset('svg/user-regular.svg')}}" class="es-nav-icon">Employees</a>
        </li>
        <li>
            <a href="{{route('customers')}}"><img src="{{asset('svg/users-solid.svg')}}" class="es-nav-icon">Customers</a>
        </li>
        <li>
            <a href="{{route('suppliers')}}"><img src="{{asset('svg/parachute-box-solid.svg')}}" class="es-nav-icon">Suppliers</a>
        </li>
        <li>
            <a href="{{route('expenses',date('Y-m-d'))}}"><img src="{{asset('svg/dollar-sign-solid.svg')}}" class="es-nav-icon">Expenses</a>
        </li>
       
        <li>
            <a href="{{route('settings')}}"><img src="{{asset('svg/gear-solid.svg')}}" class="es-nav-icon">Settings</a>
        </li>
        
        @endif
        @if(Auth::user()->role == 1)
        <li>
            <a href="{{route('users')}}"><img src="{{asset('svg/circle-user-solid.svg')}}" class="es-nav-icon">Users</a>
        </li>
        <li  >
            <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="{{asset('svg/flag-regular.svg')}}" class="es-nav-icon">Peports</a>
            <ul class="collapse list-unstyled" id="reportSubmenu">
                <li>
                    <a href="{{route('report.stocks',1)}}">Stocks</a>
                </li> 
                <li>
                        <a href="{{route('report.sales',date('Y'))}}">Sales</a>
                    </li> 
                <li>
                    <a href="{{route('report.expenses', date('Y'))}}">Expenses</a>
                </li>               
            </ul>
        </li>
        @endif
    </ul>
</nav>
