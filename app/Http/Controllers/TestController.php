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
		
		$seatpassenger_per_month_2017 = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$keramaian_all_month = array('','','','','','','','','','','','');
		
		
						
			
			$pass_all_month_json_2017 = DB::table('all_year_processing_for_ml')->select('month','passengers', 'seat')
		    	->where([['airline_id', '=', Input::get('airline')],
		    		['origin_airport_id', '=', Input::get('originAirport')],
		    		['dest_airport_id', '=', Input::get('destinationAirport')],
		    		['origin_state_fips', '=', Input::get('originState')],
		    		['dest_state_fips', '=', Input::get('destinationState')],
		    		['origin_wac', '=', Input::get('originWac')],
		    		['dest_wac', '=', Input::get('destinationWac')],
		    		['class', '=', Input::get('serviceClass')],
		    		['year', '=', '2017'],
					
		    		])
		    	->get();
		
		
		
		
		//hitung semua prediksi
		for ($i = 0; $i < 12; $i++) {
		
			$seat = "seat".($i+1);
			$prediksi_pass_all_month[$i] =  $this->hitungPassangerPerBulan(
										
					Input::get('airline'),
					Input::get('originAirport'),
					Input::get('destinationAirport'),
					Input::get('originState'),
					Input::get('destinationState'),
					Input::get('originWac'),
					Input::get('destinationWac'),
					Input::get('serviceClass'),
					Input::get('year'),
					Input::get($seat),
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
			
 
		
			
			$seatpassenger_per_bulan_2017 = DB::table('all_year_processing_for_ml')->select('seat', 'passengers')
		    	->where([['airline_id', '=', Input::get('airline')],
		    		['origin_airport_id', '=', Input::get('originAirport')],
		    		['dest_airport_id', '=', Input::get('destinationAirport')],
		    		['origin_state_fips', '=', Input::get('originState')],
		    		['dest_state_fips', '=', Input::get('destinationState')],
		    		['origin_wac', '=', Input::get('originWac')],
		    		['dest_wac', '=', Input::get('destinationWac')],
		    		['class', '=', Input::get('serviceClass')],
		    		['year', '=', '2017'],
					['month', '=', $i+1],
		    		])->first();
		

		    $seatpassenger_per_month_2017[$i] = $seatpassenger_per_bulan_2017;

						
			if($seatpassenger_per_bulan_2017==NULL){
				$seatpassenger_per_bulan_2017 = 1000;
			}
			else{
				$seatpassenger_per_bulan_2017 = $seatpassenger_per_bulan_2017->seat;
			}
		    
			
			$prediksi_pass_all_month_2017[$i]=  $this->hitungPassangerPerBulan(
										
					Input::get('airline'),
					Input::get('originAirport'),
					Input::get('destinationAirport'),
					Input::get('originState'),
					Input::get('destinationState'),
					Input::get('originWac'),
					Input::get('destinationWac'),
					Input::get('serviceClass'),
					2017,
					$seatpassenger_per_bulan_2017,
					$i

			);	

			if($seatpassenger_per_month_2017[$i] != null){
				$passenger_per_month = $seatpassenger_per_month_2017[$i]->passengers;			

				if(($seatpassenger_per_bulan_2017 * 0.8) < $passenger_per_month){
					$keramaian_all_month[$i] = 'Tinggi';

				}else if(($seatpassenger_per_bulan_2017 * 0.7) > $passenger_per_month){
					$keramaian_all_month[$i] = 'Rendah';
				}else{
					$keramaian_all_month[$i] = 'Sedang';
				}	
			}else{
				$keramaian_all_month[$i] = 'Tidak Ada'; 
			}
		}
	
		$prediksi_pass_all_month = collect($prediksi_pass_all_month);
		$prediksi_seat_all_month = collect($prediksi_seat_all_month);
		$prediksi_pass_all_month_2017 = collect($prediksi_pass_all_month_2017);
		$keramaian_all_month = collect($keramaian_all_month);
		$seatpassenger_per_month_2017 = collect($seatpassenger_per_month_2017);
		dd($seatpassenger_per_month_2017);


		$year = Input::get('year');
		

		
		// return view("test" , array('prediksi_pass_all_month_seat_all_month' => $prediksi_seat_all_month, 'prediksi_pass_all_month' => $prediksi_pass_all_month, 'prediksi_pass_all_month_2017' => $prediksi_pass_all_month_2017, 'year' => $year) );


		//dd($pass_all_month_json_2017);


		return view("test" , array('prediksi_pass_all_month' => $prediksi_pass_all_month, 'prediksi_pass_all_month_2017' => $prediksi_pass_all_month_2017, 'pass_all_month_json_2017' => $pass_all_month_json_2017, 'keramaian_all_month' => $keramaian_all_month, 'seatpassenger_per_month_2017' => $seatpassenger_per_month_2017));


					/*  contoh ambil variable dari controller , bikin ini di blade
					ya Con nanti hapus setelah lo pake @foreach ($prediksi_seat_all_month as $prediksi_seat_all_month)
							<div> 
						
									{{$prediksi_seat_all_month}}

							</div>
					  @endforeach -->
					*/
		

    }


	
	//model prediksi passanger per bulan
	public function hitungPassangerPerBulan(
		
		$airline,
		$originAirport,
		$destinationAirport,
		$originState,
		$destinationState,
		$originWac,
		$destinationWac,
		$serviceClass,
		$year,
		$seat,
		$month
	){
		//tuliskan algoritma model prediksi passanger per bulan disini
		//untuk sementara dikasih dummy setiap bulan passangernya 1
		
		$year = $year - 1990;
		
		
		$passanger = ($seat *0.7260976892426569 ) + ($airline *-0.19728731897162055 ) +($originAirport *0.006881158839401989 ) +($originState * -3.1278306810716208) +($originWac *1.57068999395737 ) +($destinationAirport * 0.004923284574650348) +($destinationState *-3.0094147883341136 ) + ($destinationWac *1.515088473915461 ) +($month *18.134598817421452 ) +($year * 88.17906077020947) ;
		
		

		return $passanger;
	
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