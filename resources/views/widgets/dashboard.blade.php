<div class="container-fluid  bg-white mt-3 pb-5 pt-2">
    <div class="row pr-3 pl-3  mb-3">
        <div class="col-10" >
            <h3>Statistics - ( Yearly )</h3>
        </div>
        <div class="col-2" >
            <h4>Today : {{ date('d-M-Y') }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12" >
            @widget('DashboardCard')
        </div>
    </div>
    <div class="row mt-5" >
        <div class="col-12">
            <div class="container-fluid px-4">
                <div class="row gx-5">
                    <div class="col-8 chart-shadow" style="">
                        <div class="p-3 position-relative"> @widget('MonthlyChart')</div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 best-seller-shadow">
                            @widget('DashBoardBestSeller')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
