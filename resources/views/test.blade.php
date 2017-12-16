
@extends('admin_template')

@section('content')

<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script>


    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
				 <h3>Masukkan Inputan Prediksi:</h3>
					<form method="post" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								
						<div class="row uniform 50%">
							<div class="12u">
								<div class="select-wrapper">
								<table class="table">
											<tr>
												<th>
												<select class="js-example-basic-single" name="airline" id="category" required>

											
														<option value="">- Airlines -</option>

														 @include('airlines')
				
												
												</select>
												
												
												</th>
											<tr>
											<tr>
												<th>
												<select class="js-example-basic-single" name="originAirport" id="category" required>

											
														<option value="">- Origin Airport -</option>

														 @include('airport')
				
												
												</select>
												
												
												</th>
											<tr>
											<tr>
												<th>
												<select class="js-example-basic-single" name="destinationAirport" id="category" required>

											
														<option value="">- Destination Airport -</option>

														 @include('airport')
				
												
												</select>
												
												
												</th>
											<tr>
											<tr>
												<th>
												<select class="js-example-basic-single" name="originState" id="category" required>

											
														<option value="">- Origin State -</option>

														 @include('state')
				
												
												</select>
												
												
												</th>
												
											<tr>
											
											
											<tr>
												<th>
												<select class="js-example-basic-single" name="destinationState" id="category" required>

											
														<option value="">- Destination State -</option>

														 @include('state')
				
												
												</select>
												
												
												</th>
											<tr>
											
											<tr>
												<th>
												<select class="js-example-basic-single" name="originWac" id="category" required>

											
														<option value="">- Origin WAC -</option>

														 @include('wac')
				
												
												</select>
												
												
												</th>
											<tr>
											<tr>
												<th>
												<select class="js-example-basic-single" name="destinationWac" id="category" required>

											
														<option value="">- Destination WAC -</option>

														 @include('wac')
				
												
												</select>
												
												
												</th>
											<tr>
											<tr>
												<th>
												<select class="js-example-basic-single" name="serviceClass" id="category" required>

											
														<option value="">- Service Class -</option>
														<option value="1"> A Scheduled First Class Passenger/ Cargo Service A</option>
														<option value="2"> C Scheduled Coach Passenger/ Cargo Service C</option>
														<option value="3"> E Scheduled Mixed First Class And Coach, Passenger/ Cargo Service E</option>
														<option value="4"> F Scheduled Passenger/ Cargo Service F</option>

												
				
												
												</select>
												
												
												</th>
											<tr>
											
											<tr>
												<th>
												<select class="js-example-basic-single" name="year" id="category" required>

											
														<option value="">- Year -</option>
														<option value="2018"> 2018</option>
														<option value="2019"> 2019</option>
														<option value="2020"> 2020</option>
														<option value="2021"> 2021</option>
														<option value="2022"> 2022</option>											
				
												
												</select>
												
												
												</th>
											<tr>
											<tr>
												<th>
												<p>Bulan 1</p>
												
															<input type="text" name="seat1" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
												<p>Bulan 2</p>
															<input type="text" name="seat2" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
												<p>Bulan 3</p>
															<input type="text" name="seat3" placeholder="Masukkan jumlah seat "/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
												<p>Bulan 4</p>
															<input type="text" name="seat4" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
													<p>Bulan 5</p>
															<input type="text" name="seat5" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
															<p>Bulan 6</p>
												
															<input type="text" name="seat6" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
												<p>Bulan 7</p>
												
															<input type="text" name="seat7" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
												<p>Bulan 8</p>
												
															<input type="text" name="seat8" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
												<p>Bulan 9</p>
													
															<input type="text" name="seat9" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
													<p>Bulan 10</p>
													
															<input type="text" name="seat10" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
													<p>Bulan 11</p>
													
															<input type="text" name="seat11" placeholder="Masukkan jumlah seat"/>	
				
												
												
												
												</th>
											<tr>
											<tr>
												<th>
														<p>Bulan 12</p>
															<input type="text" name="seat12" placeholder="Masukkan jumlah  seat"/>	
				
												
												
												
												</th>
											<tr>
											
								  </table>
								  </div>
								</div>
							</div>
							
							
							<br>
							<br>
							<div class="row uniform">
								<div class="12u">
									<ul class="actions">
										<input type="submit" value="Mulai" />
									</ul>
								</div>
							</div>
						</form>

			
				
				
				
				
				
                        
                    <h3 class="box-title">Grafik Sekarang</h3>
                    <h5><b>Tahun 2017</b></h5>
                    <div class="box-tools pull-right">
                    	@isset($pass_all_month_json_2017)
                    	<input type="text" id="chart_now" value="{{$pass_all_month_json_2017}}" hidden  />
                    	@endisset
                    	@isset($prediksi_pass_all_month_2017)
                    	<input type="text" id="chart_predicted" value="{{$prediksi_pass_all_month_2017}}" hidden  />
                        @endisset
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="chartNow" width="100" height="20"></canvas>
                </div><!-- /.box-body -->
                </div>
            </div>
        </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Prediksi</h3>
                    <h5><b>Tahun 2018</b></h5>
                    <div class="box-tools pull-right">
                    	@isset($prediksi_pass_all_month)
                    	<input type="text" id="chart_predict_month" value="{{$prediksi_pass_all_month}}" hidden  />
                    	@endisset
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="chartPredicted" width="100" height="20"></canvas>
                </div><!-- /.box-body -->
                </div>
            </div>
        </div>
        <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Keramaian</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                    <table class="table table-bordered">
                        <tr>
                            <th>Bulan</th>
                            <th>Passenger</th>
                            <th>Tingkat Keramaian</th>
                        </tr>
                    @isset($prediksi_pass_all_month)
                    @foreach($prediksi_pass_all_month as $prediksi_pass_all_month)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prediksi_pass_all_month }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    @endisset
<!--                         <tr>
                            <td>2</td>
                            <td>2000</td>
                            <td>Ramai</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>500</td>
                            <td>Sepi</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>12000</td>
                            <td>Ramai</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>8000</td>
                            <td>Sedang</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>1500</td>
                            <td>Ramai</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>5000</td>
                            <td>Ramai</td>
                        </tr>
 -->
                        
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    </div>

<script>

var chartNow = document.getElementById("chart_now").value;
var chartNow = JSON.parse(chartNow);
var chartPredicted = document.getElementById("chart_predicted").value;
var chartPredicted = JSON.parse(chartPredicted);
var chartPredictMonth = document.getElementById("chart_predict_month").value;
var chartPredictMonth = JSON.parse(chartPredictMonth);


var chartMonth2017=[0,0,0,0,0,0,0,0,0,0,0,0];
var chartLabel=[0,0,0,0,0,0,0,0,0,0,0,0];

for(var i = 0; i<chartNow.length; i++){
	chartLabel[i] = chartNow[i].month;
	chartMonth2017[i] = chartNow[i].passengers;
}

var ctx = document.getElementById("chartNow");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: chartLabel,
        datasets: [{
            label: 'Number of Passenger',
            data: chartMonth2017,
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 5, spanGaps: true, },{
            label: 'Number of Passenger Predicted',
            data: chartPredicted,
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 6, spanGaps: false,
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


var ctx2 = document.getElementById("chartPredicted");
var myChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ["1", "2", "3", "4", "5", "6","7","8","9","10","11","12"],
        datasets: [{
            label: 'Number of Passenger',
            data: chartPredictMonth,
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 5
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection