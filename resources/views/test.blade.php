@extends('admin_template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Sekarang</h3>
                    <h5><b>Tahun 2017</b></h5>
                    <div class="box-tools pull-right">
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
                        <tr>
                            <td>1</td>
                            <td>1000</td>
                            <td>Ramai</td>
                        </tr>
                        <tr>
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

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    </div>

<script>
var ctx = document.getElementById("chartNow");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["1", "2", "3", "4", "5", "6","7","8","9","10","11","12"],
        datasets: [{
            label: 'Number of Passenger',
            data: [10000,20000,11111,22222,21111],
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

var ctx2 = document.getElementById("chartPredicted");
var myChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ["1", "2", "3", "4", "5", "6","7","8","9","10","11","12"],
        datasets: [{
            label: 'Number of Passenger',
            data: [10000,20000,11111,22222,21111],
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