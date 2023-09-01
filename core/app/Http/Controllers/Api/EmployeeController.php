<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\WorkDelivery;

class EmployeeController extends Controller
{
    //


    public function employList(){
        $notify[] = 'Hire Employees list';
        $bookings = Booking::where('status', '!=', '0')->whereNotNull('job_biding_id')->with('user', 'biding.user')->get();
        return response()->json([
            'code'=>200,
            'status'=>'ok',
            'message'=>['success'=>$notify],
            'data'=>$bookings
        ]);
    }

    public function employDetails($id){
        $notify[] = 'Hire Employees Details';
        $booking =Booking::with(['user', 'biding','workFile'])->where('id', $id)->where('status', '!=', '0')->whereNotNull('job_biding_id')->firstOrFail(); 
        return response()->json([
            'code'=>200,
            'status'=>'ok',
            'message'=>['success'=>$notify],
            'data'=>$booking
        ]);
    }

    public function workFileDownload($id)
    {
        $work = WorkDelivery::where('id',$id)->firstOrFail();
        $file = $work->work_file;
        $path = imagePath()['workFile']['path'];
        $full_path = $path.'/'. $file;
      
        if (file_exists($full_path)) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $mimetype = mime_content_type($full_path);
            header('Content-Disposition: softwareFile; filename="' . $file . '";');
            header("Content-Type: " . $mimetype);

            return response()->json([
                'code'=>200,
                'status'=>'ok',
                'message'=>['success'=>'Work File Download'],
                'data'=>$full_path
            ]);
        }else{
	
            return response()->json([
                'code'=>200,
                'status'=>'error',
                'message'=>['error'=>'File does not exist.'],
            ]);
		}
    }
}
