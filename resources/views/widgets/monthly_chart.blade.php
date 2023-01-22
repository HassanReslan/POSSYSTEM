<div id="graph-notrevised" class="" style="height: auto;width: 100%;margin-top: 10%;">
	<?php //echo count($data);?>
    @foreach($data as $key => $val)
        <div class="graph-section " style="width:40px ">
        <div class="graph-value">{{round($data[$key],2)}}$</div>
        <div class="graph-bar" style="height:{{ $percentage[$key] }}%"></div>
        <div class="graph-caption">{{$monthName = date("M", mktime(0, 0, 0, $key, 10))}}<br/>{{$year}}</div>
    </div>
    @endforeach
</div>
