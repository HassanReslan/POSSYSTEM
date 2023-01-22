<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
    'prefix'        => '',
    'middleware'    =>['prevent-back-history','web'],
], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('index');

    Route::post('/', 'App\Http\Controllers\LoginController@store')->defaults('_config', [
        //'redirect' => 'index',
    ])->name('login');

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware('stockrole','salesrole')->defaults('_config', [
        'redirect' => 'dashboard',
    ])->name('dashboard');

    /* users routes */
    Route::get('/users', 'App\Http\Controllers\UsersController@index')->middleware('salesrole')->defaults('_config', [
        'view' => 'users.index',
    ])->name('users');

    Route::get('/create', 'App\Http\Controllers\UsersController@create')->middleware('salesrole')->defaults('_config', [
        'view' => 'users.create',
    ])->name('users.create');

    Route::post('/create', 'App\Http\Controllers\UsersController@store')->middleware('salesrole')->defaults('_config', [
        'redirect' => 'users.create',
    ])->name('users.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\UsersController@edit')->middleware('salesrole')->defaults('_config', [
        'view' => 'users.edit',
    ])->name('users.edit');

    Route::post('/edit/{id}', 'App\Http\Controllers\UsersController@update')->middleware('salesrole')->defaults('_config', [
        'redirect' =>'users.edit',
    ])->name('users.update');

    Route::get('/delete/{id}', 'App\Http\Controllers\UsersController@destroy')->middleware('salesrole')->name('user.delete');

    /********/



    /********/



    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->defaults('_config', [
        'view' => 'logout',
    ])->name('logout');
});

Route::group([
    'prefix'        => 'customers',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {

    /* customers routes */
    Route::get('/', 'App\Http\Controllers\CustomersController@index')->defaults('_config', [
        'view' => 'customers.index',
    ])->name('customers');

    Route::get('/create', 'App\Http\Controllers\CustomersController@create')->defaults('_config', [
        'view' => 'customers.create',
    ])->name('customers.create');

    Route::post('/create', 'App\Http\Controllers\CustomersController@store')->defaults('_config', [
        'redirect' => 'customers.create',
    ])->name('customers.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\CustomersController@edit')->defaults('_config', [
        'view' => 'customers.edit',
    ])->name('customers.edit');

    Route::post('/edit/{id}', 'App\Http\Controllers\CustomersController@update')->defaults('_config', [
        'redirect' =>'customers.edit',
    ])->name('customers.update');

    Route::get('/delete/{id}', 'App\Http\Controllers\CustomersController@destroy')->name('customers.delete');
});

Route::group([
    'prefix'        => 'products',
    'middleware'    =>['prevent-back-history','web','auth'],
], function () {

    /* products routes */
    Route::get('/', 'App\Http\Controllers\ProductsController@index')->defaults('_config', [
        'view' => 'products.index',
    ])->name('products');

    Route::get('/create', 'App\Http\Controllers\ProductsController@create')->defaults('_config', [
        'view' => 'products.create',
    ])->name('products.create');

    Route::post('/create', 'App\Http\Controllers\ProductsController@store')->defaults('_config', [
        'redirect' => 'products.create',
    ])->name('products.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\ProductsController@edit')->defaults('_config', [
        'view' => 'products.edit',
    ])->name('products.edit');

    Route::post('/edit/{id}', 'App\Http\Controllers\ProductsController@update')->defaults('_config', [
        'redirect' =>'products.edit',
    ])->name('products.update');

    Route::get('/delete/{id}', 'App\Http\Controllers\ProductsController@destroy')->name('products.delete');
    //Route::get('/', 'App\Http\Controllers\ProductsController@autocomplete')->name('autocomplete');

    /********/

});

Route::group([
    'prefix'        => 'categories',
    'middleware'    =>['prevent-back-history','web','auth'],
], function () {

    Route::get('/', 'App\Http\Controllers\CategoryController@index')->defaults('_config', [
        'view' => 'categories.index',
    ])->name('categories');

    Route::get('/create', 'App\Http\Controllers\CategoryController@store')->defaults('_config', [
        'redirect' => 'products.create',
    ])->name('categories.store');

    Route::get('/edit', 'App\Http\Controllers\CategoryController@edit')->defaults('_config', [
        //'view' => 'categories.edit',
    ])->name('categories.edit');


    Route::get('/delete/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('categories.delete');


});

Route::group([
    'prefix'        => 'sales',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {

    /* sales routes */
    Route::get('/sales', 'App\Http\Controllers\SalesController@index')->defaults('_config', [
        'view' => 'sales.index',
    ])->name('sales');


    Route::post('/search', 'App\Http\Controllers\SalesController@index')->defaults('_config', [
        'view' => 'sales.index',
    ])->name('search.invoices');

    /********/

    /* pos routes */
    Route::get('/pos/{date}/{id}', 'App\Http\Controllers\PosController@index')->defaults('_config', [
        'view' => 'pos.index',
    ])->name('pos');


    Route::get('/product', function () {
        return view('pos.product');
    })->name('posproduct');


    Route::get('/', function () {
        return view('sales.invoicelist');
    })->name('invoicelist');

    Route::get('/show', function () {
        return view('sales.invoicecontent');
    })->name('showinvoice');

    
    Route::get('/invoicecontent/{id}', 'App\Http\Controllers\SalesController@show')->defaults('_config', [
    ])->name('invoicedetails');


    /********/

});
//Route::get('/ajaxinvoice', )->name('SaveInvoice');
Route::get('/pos/addinvoice', function () {
    return view('pos.addinvoice');
})->name('SaveInvoice');

//Route::get('autocomplete', [UsersController::class, 'autocomplete'])->name('autocomplete');

Route::get('/pos', 'App\Http\Controllers\UsersController@autocomplete')->defaults('_config', [
    'view' => 'pos.index',
])->name('autocomplete');



Route::get('/total/{date}/{id}', 'App\Http\Controllers\PosController@Total')->defaults('_config', [

])->name('total');

//external stock routes
Route::post('/createextstock', 'App\Http\Controllers\ExternalStockController@store')->defaults('_config', [
])->name('extstock.store');


Route::get('/createextstock/{id}', 'App\Http\Controllers\ExternalStockController@destroy')->defaults('_config', [
])->name('extstock.delete');

Route::post('/addtostock', 'App\Http\Controllers\ExternalStockController@AddToStock')->defaults('_config', [
])->name('addtoextstock');



/********/



Route::group([
    'prefix'        => 'expenses',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {

    Route::get('expenses/{date}', 'App\Http\Controllers\ExpensesController@index')->defaults('_config', [
        'view' => 'expenses.index',
    ])->name('expenses');

    Route::get('/create', 'App\Http\Controllers\ExpensesController@create')->defaults('_config', [
        'redirect' => 'expenses.create',
    ])->name('expenses.create');

    Route::post('/create', 'App\Http\Controllers\ExpensesController@store')->defaults('_config', [
        'redirect' => 'expenses.create',
    ])->name('expenses.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\ExpensesController@edit')->defaults('_config', [
        'view' => 'expenses.edit',
    ])->name('expenses.edit');

    Route::post('/edit/{id}', 'App\Http\Controllers\ExpensesController@update')->defaults('_config', [
        'redirect' =>'expenses.edit',
    ])->name('expenses.update');

    Route::get('/delete/{id}/{date}', 'App\Http\Controllers\ExpensesController@destroy')->name('expenses.delete');


});
Route::group([
    'prefix'        => 'expensestype',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {


    Route::get('/create', 'App\Http\Controllers\ExpensesType@store')->defaults('_config', [
        'redirect' => 'expenses.create',
    ])->name('expensestype.store');

});



Route::group([
    'prefix'        => 'settings',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {

    Route::get('/', 'App\Http\Controllers\SettingsController@index')->defaults('_config', [
        'redirect' => 'settings.index',
    ])->name('settings');

    Route::post('/{id}', 'App\Http\Controllers\SettingsController@update')->defaults('_config', [
        'redirect' => 'settings.index',
    ])->name('editstocksettings');

});


Route::group([
    'prefix'        => 'suppliers',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {

    /* supliers routes */
    Route::get('/', 'App\Http\Controllers\SupliersController@index')->defaults('_config', [
        'view' => 'suppliers.index',
    ])->name('suppliers');

    Route::get('/create', 'App\Http\Controllers\SupliersController@create')->defaults('_config', [
        'view' => 'suppliers.create',
    ])->name('suppliers.create');

    Route::post('/create', 'App\Http\Controllers\SupliersController@store')->defaults('_config', [
        'redirect' => 'suppliers.create',
    ])->name('suppliers.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\SupliersController@edit')->defaults('_config', [
        'view' => 'suppliers.edit',
    ])->name('suppliers.edit');

    Route::post('/edit/{id}', 'App\Http\Controllers\SupliersController@update')->defaults('_config', [
        'redirect' =>'suppliers.edit',
    ])->name('suppliers.update');

    Route::get('/delete/{id}', 'App\Http\Controllers\SupliersController@destroy')->name('suppliers.delete');
});


Route::group([
    'prefix'        => 'stock',
    'middleware'    =>['prevent-back-history','web','auth'],
], function () {

    /* supliers routes */
    Route::get('/', 'App\Http\Controllers\StockController@index')->defaults('_config', [
        'view' => 'stock.index',
    ])->name('stock');

    Route::get('/create', 'App\Http\Controllers\StockController@create')->defaults('_config', [
        'view' => 'stock.create',
    ])->name('stock.create');

    Route::post('/create', 'App\Http\Controllers\StockController@store')->defaults('_config', [
        'redirect' => 'stock.create',
    ])->name('stock.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\StockController@edit')->defaults('_config', [
       
    ])->name('stock.edit');

    Route::post('/edit/{id}', 'App\Http\Controllers\StockController@update')->defaults('_config', [
       
        ])->name('stock.update');


    // Get Product by id//
     Route::get('/show/{id}', 'App\Http\Controllers\StockController@show')->defaults('_config', [
        
    ])->name('product.show');
     // end Get Product by id//

      // Get Product by id from product_table//
     Route::get('/showproduct/{id}', 'App\Http\Controllers\StockController@showproduct')->defaults('_config', [
        
    ])->name('productnotexist.show');

    Route::get('/editexternalstock/{id}', 'App\Http\Controllers\ExternalStockController@edit')->defaults('_config', [
        ])->name('extstock.edit');

    Route::post('/editexternalstock/{id}', 'App\Http\Controllers\ExternalStockController@update')->defaults('_config', [
        ])->name('extstock.update');
    
        
    Route::get('/externalstockshow/{id}', 'App\Http\Controllers\ExternalStockController@show')->defaults('_config', [
    ])->name('extstock.show');

    Route::post('/externalstockshow/{id}', 'App\Http\Controllers\ExternalStockController@returnToStock')->defaults('_config', [
        ])->name('retruntostock');

    
     
});

/* Employees routes */
Route::group([
    'prefix'        => 'employees',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {

    /* customers routes */
    Route::get('/', 'App\Http\Controllers\EmployeesController@index')->defaults('_config', [
        'view' => 'employees.index',
    ])->name('employees');

    Route::get('/create', 'App\Http\Controllers\EmployeesController@create')->defaults('_config', [
        'view' => 'employees.create',
    ])->name('employees.create');

    Route::post('/create', 'App\Http\Controllers\EmployeesController@store')->defaults('_config', [
        'redirect' => 'employees.create',
    ])->name('employees.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\EmployeesController@edit')->defaults('_config', [
        'view' => 'employees.edit',
    ])->name('employees.edit');

    Route::post('/edit/{id}', 'App\Http\Controllers\EmployeesController@update')->defaults('_config', [
        'redirect' =>'employees.edit',
    ])->name('employees.update');

    Route::get('/delete/{id}', 'App\Http\Controllers\EmployeesController@destroy')->name('employees.delete');
});

Route::group([
    'prefix'        => 'reports',
    'middleware'    =>['prevent-back-history','web','auth'],
], function () {

    /* stocks report routes */

    Route::get('/stocks/{flag}', 'App\Http\Controllers\ReportsController@index')->defaults('_config', [
        ])->name('report.stocks');

        Route::get('/stocks', 'App\Http\Controllers\ReportsController@index')->defaults('_config', [
        ])->name('customrange');

        

    /*end*/
    /* sales report routes */
    Route::get('/sales/{year}', 'App\Http\Controllers\ReportsController@sales')->defaults('_config', [
    ])->name('report.sales');

    Route::get('/monthlysales/{month}/{year}', 'App\Http\Controllers\ReportsController@monthlysales')->defaults('_config', [
        ])->name('mounthlysalesreport');

    Route::get('/dailysales/{day}/{month}/{year}', 'App\Http\Controllers\ReportsController@dailysales')->defaults('_config', [
        ])->name('dailysalesreport');

        
    Route::get('/salescustomerange/{from}/{to}', 'App\Http\Controllers\ReportsController@salescustomerange')->defaults('_config', [
        ])->name('salescustomrange');


    /*********/
    
    /* expense report routes */

    Route::get('/expenses/{year}', 'App\Http\Controllers\ReportsController@expenses')->defaults('_config', [
        ])->name('report.expenses');

    Route::get('/monthlyexpenses/{month}/{year}', 'App\Http\Controllers\ReportsController@monthlyexpenses')->defaults('_config', [
    ])->name('mounthlyexpensesreport');

    Route::get('/dailyexpenses/{day}/{month}/{year}', 'App\Http\Controllers\ReportsController@dailyexpenses')->defaults('_config', [
        ])->name('dailyexpensesreport');

    Route::get('/customerange/{from}/{to}', 'App\Http\Controllers\ReportsController@expensescustomerange')->defaults('_config', [
        ])->name('expensescustomrange');

       
});


Route::group([
    'prefix'        => 'export',
    'middleware'    =>['prevent-back-history','web','auth','salesrole'],
], function () {

    
    Route::get('/pricelist', 'App\Http\Controllers\StockController@exportexcelpricelist')->defaults('_config', [
        'view' => 'export.pricelist',
    ])->name('exportexcelpricelist');

    /*Route::get("/pricelist", function(){
        return View::make("export.pricelist");
     });*/

  
});


