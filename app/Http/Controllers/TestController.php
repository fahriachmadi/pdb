<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\AllDataProcessing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;


use Illuminate\Http\Request;

class TestController extends Controller {

    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Design New Dashboard',
                        'progress' => '87',
                        'color' => 'danger'
                ],
                [
                        'name' => 'Create Home Page',
                        'progress' => '76',
                        'color' => 'warning'
                ],
                [
                        'name' => 'Some Other Task',
                        'progress' => '32',
                        'color' => 'success'
                ],
                [
                        'name' => 'Start Building Website',
                        'progress' => '56',
                        'color' => 'info'
                ],
                [
                        'name' => 'Develop an Awesome Algorithm',
                        'progress' => '10',
                        'color' => 'success'
                ]
        ];

        
        return view('test')->with($data);
    }

    public function show_chart_2017(
		$airline,
		$originAirport,
		$destinationAirport,
		$originState,
		$destinationState,
		$originWac,
		$destinationWac,
		$serviceClass,
		$year,
		$month){

    	// $all_passenger_month_2017 = DB::table('all_year_processing_for_ml')
    	// ->where([['airline_id', '=', $airline],
    	// 	['origin_airport_id', '=', $originAirport],
    	// 	['dest_airport_id', '=', $destinationAirport],
    	// 	['origin_state_fips', '=', $originState],
    	// 	['dest_state_fips', '=', $destinationState],
    	// 	['origin_wac', '=', $originWac],
    	// 	['dest_wac', '=', $destinationWac],
    	// 	['class', '=', $serviceClass],
    	// 	['year', '=', '2017'],
    	// 	['month','=',$month]])
    	// ->get();


    	$all_passenger_month_2017 = DB::table('all_year_processing_for_ml')
    	->where([['airline_id', '=', '21171'],
    		['origin_airport_id', '=', '11618'],
    		['dest_airport_id', '=', '14771'],
    		['origin_state_fips', '=', '34'],
    		['dest_state_fips', '=', '6'],
    		['origin_wac', '=', '21'],
    		['dest_wac', '=', '91'],
    		['class', '=', '4'],
    		['year', '=', '2017'],
    		['month','=',$month]])
    	->get()->first();



    	return $all_passenger_month_2017;
    }
	
	
    public function index_submit() {
		
		//variable penampung semua prediksi setiap bulan, 
		$prediksi_pass_all_month = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$prediksi_seat_all_month = array(0,0,0,0,0,0,0,0,0,0,0,0);
		
		$prediksi_pass_all_month_2017 = array(0,0,0,0,0,0,0,0,0,0,0,0);
		
		
		
		//hitung semua prediksi
		for ($i = 0; $i < 12; $i++) {
			$prediksi_pass_all_month[$i] =  $this->hitungPassangerTreePerBulan(
										
					Input::get('airline'),
					Input::get('originAirport'),
					Input::get('destinationAirport'),
					Input::get('originState'),
					Input::get('destinationState'),
					Input::get('originWac'),
					Input::get('destinationWac'),
					Input::get('serviceClass'),
					Input::get('year'),
					$i

			);

			$prediksi_seat_all_month[$i] =  $this->hitungSeatTreePerBulan(	
					Input::get('airline'),
					Input::get('originAirport'),
					Input::get('destinationAirport'),
					Input::get('originState'),
					Input::get('destinationState'),
					Input::get('originWac'),
					Input::get('destinationWac'),
					Input::get('serviceClass'),
					Input::get('year'),
					$i
			);		
			
			$prediksi_pass_all_month_2017[$i]=  $this->hitungPassangerTreePerBulan(
										
					Input::get('airline'),
					Input::get('originAirport'),
					Input::get('destinationAirport'),
					Input::get('originState'),
					Input::get('destinationState'),
					Input::get('originWac'),
					Input::get('destinationWac'),
					Input::get('serviceClass'),
					2017,
					$i

			);		

		}
		$prediksi_pass_all_month = collect($prediksi_pass_all_month);
		$prediksi_seat_all_month = collect($prediksi_seat_all_month);
		$prediksi_pass_all_month_2017 = collect($prediksi_pass_all_month_2017);


		$pass_all_month_json_2017 = DB::table('all_year_processing_for_ml')->select('month','passengers')
		    	->where([['airline_id', '=', '21171'],
		    		['origin_airport_id', '=', '11618'],
		    		['dest_airport_id', '=', '14771'],
		    		['origin_state_fips', '=', '34'],
		    		['dest_state_fips', '=', '6'],
		    		['origin_wac', '=', '21'],
		    		['dest_wac', '=', '91'],
		    		['class', '=', '4'],
		    		['year', '=', '2017'],
		    		])
		    	->get();


		//  dd($pass_all_month_json_2017);


		$year = Input::get('year');
		

		
		// return view("test" , array('prediksi_pass_all_month_seat_all_month' => $prediksi_seat_all_month, 'prediksi_pass_all_month' => $prediksi_pass_all_month, 'prediksi_pass_all_month_2017' => $prediksi_pass_all_month_2017, 'year' => $year) );


		//dd($pass_all_month_json_2017);


		return view("test" , array('prediksi_pass_all_month' => $prediksi_pass_all_month, 'prediksi_pass_all_month_2017' => $prediksi_pass_all_month_2017, 'pass_all_month_json_2017' => $pass_all_month_json_2017));


					/*  contoh ambil variable dari controller , bikin ini di blade
					ya Con nanti hapus setelah lo pake @foreach ($prediksi_seat_all_month as $prediksi_seat_all_month)
							<div> 
						
									{{$prediksi_seat_all_month}}

							</div>
					  @endforeach -->
					*/
		

    }


	
	//model prediksi passanger per bulan
	public function hitungPassangerTreePerBulan(
		
		$airline,
		$originAirport,
		$destinationAirport,
		$originState,
		$destinationState,
		$originWac,
		$destinationWac,
		$serviceClass,
		$year,
		$month
	){
		//tuliskan algoritma model prediksi passanger per bulan disini
		//untuk sementara dikasih dummy setiap bulan passangernya 1
		

		return 10000;
	
	}
	//model prediksi seat per bulan
	public function hitungSeatTreePerBulan(
		$airline,
		$originAirport,
		$destinationAirport,
		$originState,
		$destinationState,
		$originWac,
		$destinationWac,
		$serviceClass,
		$year,
		$month
	
	
	){
		//tuliskan algoritma model prediksi seat per bulan disini
		//untuk sementara dikasih dummy setiap bulan seat 1
				
		return 1;
	
	}
	
	

}