<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View, Input, Validator, Redirect, DB;

class EodController extends Controller {

	/**
	 * Profile Repository
	 *
	 * @var Profile
	 */
	protected $eod;

	public function __construct()
	{
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/* $input = array_except(Input::all(), '_method');
		$file_path = $input['excel_file']; */
		
		/* $target_dir = public_path()."\uploads\eod_data\\";
		$target_file = $target_dir . basename($_FILES["excel_file"]["name"]); */
		//$target_file = 'C:\xampp\htdocs\sharemarket_app\uploads\eod_data\Copy (2) of fo28AUG2015bhav.csv';
		$target_file = 'uploads/eod_data/fo28AUG2015bhav - Copy (2).csv';
		//$target_file = 'C:\xampp\htdocs\sharemarket_app\uploads\eod_data\fo28AUG2015bhav - Copy.csv';
		
		/* if (move_uploaded_file($_FILES["excel_file"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["excel_file"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
			die;
		} */
		
		set_time_limit(6000);
		$data = array();
		\Excel::filter('chunk')->load($target_file)->chunk(250, function($results) use (&$data){
			$results_array = $results->toArray();
			//print_r($results_array);
			$i=1;
			foreach ($results_array as $row) {
				//print_r($row);die;
				$datetime = strtotime($row['expiry_dt']);
				$datetime *= 1000;
				$data[] = "[$datetime, $row[open], $row[high], $row[low], $row[close]]";
				//print_r($data);die;
			}
			//print_r($data);die;
		});		
		//print_r($data);
		//die;
		return View::make('eod.index')->with('data', $data);
	}
}