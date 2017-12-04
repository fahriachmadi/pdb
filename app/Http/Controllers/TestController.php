<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
	
	
    public function index_submit() {
		
		//variable penampung semua prediksi setiap bulan, 
		$prediksi_pass_all_month = array(0,0,0,0,0,0,0,0,0,0,0,0);
		$prediksi_seat_all_month = array(0,0,0,0,0,0,0,0,0,0,0,0);
		//hitung semua prediksi
		for ($i = 0; $i < 12; $i++) {
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
					$i

			);
			$prediksi_seat_all_month[$i] =  $this->hitungSeatPerBulan(	
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
			
		}
		
	

		
		return view("test" , array('prediksi_seat_all_month' => $prediksi_seat_all_month, 'prediksi_pass_all_month' => $prediksi_pass_all_month) );
		
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
		$month
	){
		//tuliskan algoritma model prediksi passanger per bulan disini
		//untuk sementara dikasih dummy setiap bulan passangernya 1
		
		return 1;
	
	}
		//model prediksi seat per bulan
	public function hitungSeatPerBulan(
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