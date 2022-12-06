<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mail;
use App\Models\PageMeta;
use App\Models\User;
use App\Models\Models;
use App\Models\UserMeta;
use Carbon;

use RTippin\Messenger\Facades\MessengerComposer as MessengerComposer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $receiver = 183;
        $sender = 14;

    //     MessengerComposer::to($receiver)
    // ->from($sender)
    // ->emitTyping()
    // ->message('Hello!');
        // dd(MessengerComposer);
        // MessengerComposer::to($receiver)
        //     ->from($sender)
        //     ->emitTyping()
        //     ->message('Hello!');
        // echo "dsfsd";
        // exit;
    }
    public function getPageMeta($id, $key="")
    {
        if (empty($key)) {

            $PageMeta = PageMeta::where('page_id', $id)->select('key', 'value')
                ->pluck('value', 'key')
                ->toArray();
            return $PageMeta;
        }
        else {

            if ($status) {
                // 
                $PageMeta = PageMeta::where('page_id', $id)->where('key', $key)->first();
                if (!empty($PageMeta))
                    return $PageMeta->value;
                else
                    return "";
            }
            else {
                $PageMeta = PageMeta::where('page_id', $id)->where('key', $key)->select('key', 'value')
                    ->pluck('value', 'key')
                    ->toArray();
                return $PageMeta;
            }
        }
    }
    public static function getUserMeta($id, $key = "", $status = false)
    {
        if (empty($key)) {
            // 
            $user_details_add = UserMeta::where('user_id', $id)->select('key', 'value')
                ->pluck('value', 'key')
                ->toArray();
            return $user_details_add;
        } else {
            //
            if ($status) {
                // 
                $user_details_add = UserMeta::where('user_id', $id)->where('key', $key)->first();
                if (!empty($user_details_add))
                    return $user_details_add->value;
                else
                    return "";
            } else {
                $user_details_add = UserMeta::where('user_id', $id)->where('key', $key)->select('key', 'value')
                    ->pluck('value', 'key')
                    ->toArray();
                return $user_details_add;
            }
        }
    }
    public function onlinemodel(Request $request){
        $data=Models::join('users','users.id','=','models.user_id')->get();
        dd($data);
    }
   public  static  function modelImage($image, $size) {
        // 
        $file=explode('.',$image);
        $new_img = $file[0].$size.'.'.$file[1];
        return $new_img;

        // $external_link = url('profile-image') . '/' . $new_img;
        // if (@getimagesize($external_link)) {
        //     return $new_img;
        // } else {
        //     return $image;
        // }
    }

    

}



