<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}

class flightController extends Controller
{


    public function index()
	{
		return view("viewflight");	
	}
	public function save(Request $request)
	{
		$carrier = $request->input('inp_carrier');
		$data = array(
			'inp_carrier' => $carrier
		);
		return view("viewflight",$data);	
	}

}
