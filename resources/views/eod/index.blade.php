@extends('app')

@section('content')
<script src="http://sharemarket.web360.co.in/js/highstock.js"></script>
<script src="http://sharemarket.web360.co.in/js/exporting.js"></script>
<script type="text/javascript">
$(function () {
    //$.getJSON('http://www.highcharts.com/samples/data/jsonp.php?a=e&filename=aapl-ohlc.json&callback=?', function (data) {
        // create the chart
        $('#container').highcharts('StockChart', {


            rangeSelector : {
                selected : 1
            },

            title : {
                text : 'AAPL Stock Price'
            },

            series : [{
                type : 'candlestick',
                name : 'AAPL Stock Price',
                data : ([<?php echo join($data, ',') ?>]),
                dataGrouping : {
                    units : [
                        [
                            'week', // unit name
                            [1] // allowed multiples
                        ], [
                            'month',
                            [1, 2, 3, 4, 6]
                        ]
                    ]
                }
            }]
        });
    //});
});
</script>
		
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">EOD</div>

				<div class="panel-body">
					<div id="container" style="height: 400px; min-width: 310px"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
