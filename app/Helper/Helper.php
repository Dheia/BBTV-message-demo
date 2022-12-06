<?php

namespace App\Helper;
use DB;
use App\BookingActivity;
use App\Models\LogActivity;
use App\Models\User_logs;
use Request;
use App\Models\Models;


class Helper
{
    public static function imageUpload($image,$path){

        $extention = $image->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $image->move($path, $filename);
        return $filename;
	}

    public static function multiImageUpload($images,$path){

        $multi = [];

            foreach ($images as $img) {
                $name = $img->getClientOriginalName();
                $img->move($path, $name);
                 $multi[] =  $name;
            }
            return $multi;
        
	}
    public static function addToLog($subject,$type='')
    {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['type'] = $type;
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 0;
        
        LogActivity::create($log);
    }
    public static function UserLog($subject,$type='')
    {
        $log = [];
        $log['method'] = $subject;
        $log['from'] = Request::fullUrl();
        $log['to'] = Request::method();
        $log['price'] = $type;
        $log['earning'] = Request::ip();
       
        
        User_logs::create($log);
    }


    public static function logActivityLists()
    {
        return LogActivity::latest()->get();
    }
    public static function user_logs()
    {
        return User_logs::latest()->get();
    }
    public static function online()
    {
        $d['online']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.is_online','=',1)->get();
        $d['onlinecount']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.is_online','=',1)->count();
        return $d;
    }
    function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }

}