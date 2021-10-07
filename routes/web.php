<?php

use App\Models\Company;
use App\Models\Department;
use App\Models\Office;
use App\Models\Penalty;
use App\Models\Position;
use App\Models\Req;
use App\Models\SignInOut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome', [
    	'company' => Company::count() ,
    	'office' => Office::count() , 
    	'department' => Department::count() , 
    	'position' => Position::count() , 
    	'user' => User::count() , 
    	'sign_in_out' => SignInOut::count() , 
    	'penalty' => Penalty::count() , 
    	'request' => Req::count()
    ]);
});




Route::post('/loadtest', function(Request $request) {

	//Company

	//Offices

	//Users
	//
	//Attendance profiles 


	//Sign ins

	//Requests

	//Penalties



	if (!is_numeric($request ->d_factor)) {

		dd('Should be numiric') ; 
	}

	// dd($request ->d_factor) ;
	for ($i = 0; $i < $request  ->d_factor; $i++) {

		$data = array() ;
		foreach (Company::all() as $company) {

			$c = $company ->replicate()  ; 
			$c ->save() ;

			$data ['company'][$company ->id] = $c ->id ;

			foreach ($company ->offices as $office) {

				$o = $office ->replicate() ;
				$o ->company_id = $c ->id ; 
				$o ->save() ;

				$data ['office'][$office ->id] = $o ->id ;  

				unset($o) ;

			}

			foreach ($company ->departments as $department) {

				$d = $department ->replicate() ;
				$d ->company_id = $data ['company'][$department ->company_id] ; 
				$d ->office_id = $data ['office'][$department ->office_id] ?? 0 ;
				$d ->save() ;

				$data ['department'][$department ->id] = $d ->id ;  
				unset($d) ;

			}

			foreach ($company ->positions as $position) {

				$p = $position ->replicate() ;
				$p ->company_id = $data ['company'][$position ->company_id] ; 
				$p ->office_id = $data ['office'][$position ->office_id] ?? 0 ;
				$p ->save() ;

				$data ['position'][$position ->id] = $p ->id ;  
				unset($p) ;

			}


			foreach ($company ->holidayProfiles as $holidayProfile) {

				$h = $holidayProfile ->replicate() ;
				$h ->company_id = $data ['company'][$holidayProfile ->company_id] ; 
				$h ->office_id = $data ['office'][$holidayProfile ->office_id] ?? 0 ;
				$h ->save() ;

				$data ['holidayProfile'][$position ->id] = $h ->id ;  

				unset($h) ;

			}

		// dd($data ['holidayProfile']) ;
			foreach ($company ->holidays as $holiday) {

				$h = $holiday ->replicate() ;
				$h ->company_id = $data ['company'][$holiday ->company_id] ; 
				$h ->office_id = $data ['office'][$holiday ->office_id] ?? 0 ;
				$h ->save() ;

				$data ['holiday'][$position ->id] = $h ->id ;  

				unset($h) ;
			}

			foreach ($company ->attProfiles as $attProfile) {

				$a = $attProfile ->replicate() ;
				$a ->company_id = $data ['company'][$attProfile ->company_id] ; 
				$a ->office_id = $data ['office'][$attProfile ->office_id] ?? 0 ;
				$a ->holiday_profile_id = $data ['holidayProfile'][$attProfile ->holiday_profile_id] ?? null ;
				$a ->office_id = $data ['office'][$attProfile ->office_id] ?? 0 ;
				$a ->save() ;

				$data ['attProfile'][$position ->id] = $a ->id ;  
				unset($a) ; 

			}

			foreach ($company ->users as $user) {

				$e = $user ->replicate() ;
				$e ->company_id = $data ['company'][$user ->company_id] ; 
				$e ->office_id = $data ['office'][$user ->office_id] ?? 0 ;
				$e ->att_profile_id = $data ['attProfile'][$user ->att_profile_id] ?? 0 ;
				$e ->email = 'l' . uniqid() . '@arabiclocalizer.com' ;
				$e ->save() ;

			// $data ['employee'][$position ->id] = $e ->id ;  

				foreach ($user ->signIns as $signIn) {

					$s = $signIn ->replicate() ;
					$s ->emp_id = $e ->id ;
					$s ->save() ;
					$data ['signIn'][$signIn ->id] = $s ->id ;  

					unset($s) ;

				}

				foreach ($user ->penalties as $penalty) {

					$p = $penalty ->replicate() ;
					$p ->emp_id = $penalty ->emp_id ;
					$p ->sign_in_id = $data ['signIn'][$penalty ->sign_in_id] ?? null ;
					$p ->save() ;

					unset($p) ;
				}

				foreach ($user ->requests as $request) {

					$r = $request ->replicate() ;
					$r ->emp_id = $e ->id ;
					$r ->sign_in_id = $data ['signIn'][$request ->sign_in_id] ?? null ;
					$r ->save() ;
					unset($r) ;

				}

				unset($user) ;
			}

		}

		unset($data) ; 

	}


}) ;