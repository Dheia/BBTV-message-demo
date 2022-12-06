<?php

namespace Chatify\Http\Controllers;
use App\Models\ChMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Setting;
use App\Models\User_logs;
use App\Models\Models;
use App\Models\Contacts;
class MessagesController extends Controller
{
    protected $perPage = 30;
    protected $messengerFallbackColor = '#2180f3';

    /**
     * Authenticate the connection for pusher
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function pusherAuth(Request $request)
    {
        // Auth data
        $authData = json_encode([
            'user_id' => Auth::user()->id,
            'user_info' => [
            'name' => Auth::user()->first_name
            ]
        ]);
        // check if user authorized
        if (Auth::check()) {
            return Chatify::pusherAuth(
                $request['channel_name'],
                $request['socket_id'],
                $authData
            );
        }
        // if not authorized
        return response()->json(['message'=>'Unauthorized'], 401);
    }

    /**
     * Returning the view of the app with the required data.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index( $id = null)
    {
    
        $routeName= FacadesRequest::route()->getName();
        $type = in_array($routeName, ['user','group','active'])? $routeName:'user';
        
        return view('Chatify::pages.app', [
            'id' => $id ?? 0,
            'type' => $type ?? 'user',
            'messengerColor' => Auth::user()->messenger_color ?? $this->messengerFallbackColor,
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
       
    }


    /**
     * Fetch data by id for (user/group)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function idFetchData(Request $request)
    {
       
        // Favorite
        $favorite = Chatify::inFavorite($request['id']);
     
        // User data
        if ($request['type'] == 'user') {
            $fetch = User::where('id', $request['id'])->first();
            if($fetch->wallet_visible=='1'){
              $wallet=$fetch->wallet.' Cr';
            }else{
                $wallet='';
            }
            if($fetch){
                $userAvatar = Chatify::getUserWithAvatar($fetch)->profile_image;
                $number = Chatify::getUserWithAvatar($fetch)->phone;
            }
        }

        // send the response
        return Response::json([
            'favorite' => $favorite,
            'fetch' => $fetch ?? [],
            'wallet' => $wallet,
            'user_avatar' => $userAvatar ?? null,
            'number' => $number ?? null,
        ]);
    }

    /**
     * This method to make a links for the attachments
     * to be downloadable.
     *
     * @param string $fileName
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|void
     */
    public function download($fileName)
    {
        if (Chatify::storage()->exists(config('chatify.attachments.folder') . '/' . $fileName)) {
            return Chatify::storage()->download(config('chatify.attachments.folder') . '/' . $fileName);
        } else {
            return abort(404, "Sorry, File does not exist in our server or may have been deleted!");
        }
    }

    /**
     * Send a message to database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function wallet()
    {
       $credits= Auth::user()->wallet;
       return $credits;
    }
    public function massmessage(Request $request)
    {
        // dd($request);
        $error = (object)[
            'status' => 0,
            'message' => null
        ];
        $attachment = null;
        $attachment_title = null;
        $type='message';
      
        if ($request->hasFile('file')) {
            // allowed extensions
            $allowed_images = Chatify::getAllowedImages();
            $allowed_files  = Chatify::getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);
            $file = $request->file('file');
            // check file size
            if ($file->getSize() < Chatify::getMaxUploadSize()) {
                if (in_array(strtolower($file->getClientOriginalExtension()), $allowed)) {
                    // get attachment name
                    $attachment_title = $file->getClientOriginalName();
                    // upload attachment and store the new name
                    $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
                   
                    if($file->getClientOriginalExtension() == 'mp4'){
                        $type='video';
                    }elseif($file->getClientOriginalExtension() == 'mp3'){
                        $type='audio';
                    }else{
                        $type='image';
                    }
                    // $file->storeAs(config('chatify.attachments.folder'), $attachment, config('chatify.storage_disk_name'));
                    $file->move('storage/attachments', $attachment);
                } else {
                    $error->status = 1;
                    $error->message = "File extension not allowed!";
                }
            } else {
                $error->status = 1;
                $error->message = "File size you are trying to upload is too large!";
            }
        }
        if (!$error->status) {
           
            // send to database
          
            $Get_fanid = Auth::user()->id;
            $Get_feed=Models::where('user_id',$request['id'])->first('cost_msg');
            $favorites = Favorite::where('user_id', Auth::user()->id);
            $messageID = mt_rand(9, 999999999) + time();
      
         
                if ($request->user == '2') {
                    foreach ($favorites->get() as $favorite) {
                        // get user data
                        //  dd('$attachment_title');
                        $messageID = mt_rand(9, 999999999) + time();
                        $user = User::where('id', $favorite->favorite_id)->first();
                        Chatify::newMessage([
                            'id' => $messageID,
                            'type' => 'user',
                            'from_id' => Auth::user()->id,
                            'to_id' =>  $user->id,
                            'mass_status' => '1',
                            'attachment_price' => $request->price,
                            'attachment_type' =>$type,
                            'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                            'attachment' => ($attachment) ? json_encode((object)[
                                'new_name' => $attachment,
                                'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                            ]) : null,
                        ]);
                    }
                    return redirect()->back();
                   
                        
            }
            if ($request->user == '1') {
              
                $contacts = Contacts::where('model_id', Auth::user()->id)->get();
               
                foreach ($contacts as $contact) {
                $messageID = mt_rand(9, 999999999) + time();
                Chatify::newMessage([
                    'id' => $messageID,
                    'type' => 'user',
                    'from_id' => Auth::user()->id,
                    'to_id' => $contact->fan_id,
                    'mass_status' => '1',
                    'attachment_price' => $request->price,
                    'attachment_type' => $type,
                    'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                    'attachment' => ($attachment) ? json_encode((object)[
                        'new_name' => $attachment,
                        'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                    ]) : null,
                ]);
            }
            }
            return redirect()->back();
                
          
       
            // fetch message to send it with the response
             $messageData = Chatify::fetchMessage($messageID);
            
            // send to user using pusher
            Chatify::push('private-chatify', 'messaging', [
                'from_id' => Auth::user()->id,
                'to_id' => $request['id'],
                'message' => Chatify::messageCard($messageData, 'default')
            ]);
          
        }

        // send the response
        return Response::json([
            'status' => '200',
            'error' => $error,
            'message' => Chatify::messageCard(@$messageData),
            'tempID' => $request['temporaryMsgId'],
        ]);
    }
    
    public function payment(Request $request)
    {
     
        if (Auth::user()->wallet>=$request->price) {
            $fan_charge=User::where('id',Auth::user()->id)->first();
            $fan_charge->wallet=$fan_charge->wallet-$request->price;
            $fan_charge->save();
            $commission = Setting::pluck("value", "name");
            $admin_comi=($request->price*$commission['commission'])/100;
            $model_comi=$request->price-$admin_comi;
            $model_earning=User::where('id',$request->to)->first();
            $model_earning->wallet=$model_earning->wallet + $model_comi;
            $model_earning->save();
            $messageunlock=Message::where('id',$request->messageid)->first();
            $stringvar = "0.00";
            $floatvar =  floatval($stringvar);
            $messageunlock->attachment_price =  $floatvar ;
            $messageunlock->save();         
            $User_logs= new User_logs;
            $User_logs->method=$request->type;
            $User_logs->from=Auth::user()->id;
            $User_logs->to=$request->to;
            $User_logs->fan_balance=$fan_charge->wallet;
            $User_logs->price=$request->price;
            $User_logs->model_earning=$model_comi;
            $User_logs->earnings=$admin_comi;
            $User_logs->save();
             return redirect()->back();
        }else{
            return redirect()->back()->with('error', 'Insufficient Credit');
        }
    }
    // public function send(Request $request)
    // {
    //     // default variables
    //     $error = (object)[
    //         'status' => 0,
    //         'message' => null
    //     ];
    //     $attachment = null;
    //     $attachment_title = null;
    //     $type='message';
    //     // if there is attachment [file]
    //     if ($request->hasFile('file')) {
    //         // allowed extensions
    //         $allowed_images = Chatify::getAllowedImages();
    //         $allowed_files  = Chatify::getAllowedFiles();
    //         $allowed        = array_merge($allowed_images, $allowed_files);
    //         $file = $request->file('file');
    //         // check file size
    //         if ($file->getSize() < Chatify::getMaxUploadSize()) {
    //             if (in_array(strtolower($file->getClientOriginalExtension()), $allowed)) {
    //                 // get attachment name
    //                 $attachment_title = $file->getClientOriginalName();
    //                 // upload attachment and store the new name
    //                 $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
    //                 if($file->getClientOriginalExtension() == 'mp4'){
    //                     $type='video';
    //                 }elseif($file->getClientOriginalExtension() == 'mp3'){
    //                     $type='audio';
    //                 }else{
    //                     $type='image';
    //                 }
    //                 //$file->storeAs('storage/attachments', $attachment);
    //                 $file->move('storage/attachments', $attachment);
    //             } else {
    //                 $error->status = 1;
    //                 $error->message = "File extension not allowed!";
    //             }
    //         } else {
    //             $error->status = 1;
    //             $error->message = "File size you are trying to upload is too large!";
    //         }
    //     }
    //     if (!$error->status) {
    //         $attachment = null;
    //     $attachment_title = null;
    //         // send to database
    //         $messageID = mt_rand(9, 999999999) + time();
    //         $Get_fanid = Auth::user()->id;
    //         $Get_feed=Models::where('user_id',$request['id'])->first('cost_msg');
    //         if (Auth::user()->roles->first()->title == 'Fan') {
    //             if(!empty($request->message)){
    //                 if (Auth::user()->wallet >= $Get_feed->cost_msg) {
    //                     $commission = Setting::pluck("value", "name");
    //                     $admin_comi=($Get_feed->cost_msg*$commission['commission'])/100;
    //                     $model_comi=$Get_feed->cost_msg-$admin_comi;
    //                     $fan_charge=User::where('id',Auth::user()->id)->first();
    //                     $fan_charge->wallet=$fan_charge->wallet-$Get_feed->cost_msg;
    //                     $fan_charge->save();
    //                     $model_earning=User::where('id',$request['id'])->first();
    //                     $model_earning->wallet=$model_earning->wallet + $model_comi;
    //                     $model_earning->save();
    //                     $User_logs= new User_logs;
    //                     $User_logs->method='message';
    //                     $User_logs->from=Auth::user()->id;
    //                     $User_logs->to=$request['id'];
    //                     $User_logs->price=$Get_feed->cost_msg;
    //                     $User_logs->model_earning=$model_comi;
    //                     $User_logs->earnings=$admin_comi;
    //                     $User_logs->save();  
               
    //                     $messageID = mt_rand(9, 999999999) + time();
    //                     Chatify::newMessage([
    //                         'id' => $messageID,
    //                         'type' => $request['type'],
    //                         'from_id' => Auth::user()->id,
    //                         'to_id' => $request['id'],
    //                         'attachment_price' => $request->price,
    //                         'attachment_type' => $type,
    //                         'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
    //                         'attachment' => ($attachment) ? json_encode((object)[
    //                             'new_name' => $attachment,
    //                             'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
    //                         ]) : null,
    //                     ]);
    //                     // return redirect()->back();
    //                 }else{
    //                     return Response::json([
    //                         'status' => 'insufficentcredit',
    //                         'message' => 'Insufficient Credit',
                           
    //                     ]);
                       
    //                 }
    //             }else{
              
    //                 $messageID = mt_rand(9, 999999999) + time();
    //                 Chatify::newMessage([
    //                     'id' => $messageID,
    //                     'type' => $request['type'],
    //                     'from_id' => Auth::user()->id,
    //                     'to_id' => $request['id'],
    //                     'attachment_price' => $request->price,
    //                     'attachment_type' => $type,
    //                     'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
    //                     'attachment' => ($attachment) ? json_encode((object)[
    //                         'new_name' => $attachment,
    //                         'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
    //                     ]) : null,
    //                 ]);
    //             }
    //         }else{
                
    //             $messageID = mt_rand(9, 999999999) + time();
    //             Chatify::newMessage([
    //                 'id' => $messageID,
    //                 'type' => $request['type'],
    //                 'from_id' => Auth::user()->id,
    //                 'to_id' => $request['id'],
    //                 'attachment_price' => $request->price,
    //                 'attachment_type' => $type,
    //                 'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
    //                 'attachment' => ($attachment) ? json_encode((object)[
    //                     'new_name' => $attachment,
    //                     'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
    //                 ]) : null,
    //             ]);
    //         }
    //         // fetch message to send it with the response
    //          $messageData = Chatify::fetchMessage($messageID);
    //         // send to user using pusher
    //         Chatify::push('private-chatify', 'messaging', [
    //             'from_id' => Auth::user()->id,
    //             'to_id' => $request['id'],
    //             'message' => Chatify::messageCard($messageData, 'default')
    //         ]);
          
    //     }
    //     // send the response
    //     return Response::json([
    //         'status' => '200',
    //         'error' => $error,
    //         'message' => Chatify::messageCard(@$messageData),
    //         'tempID' => $request['temporaryMsgId'],
    //     ]);
    // }
    public function send(Request $request)
    {
      
      
        // default variables
        $error = (object)[
            'status' => 0,
            'message' => null
        ];
        $attachment = null;
        $attachment_title = null;
        $type='message';
        // if there is attachment [file]
        if ($request->hasFile('file')) {
            // allowed extensions
            $allowed_images = Chatify::getAllowedImages();
            $allowed_files  = Chatify::getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);

            $file = $request->file('file');
            
            // check file size
            if ($file->getSize() < Chatify::getMaxUploadSize()) {
                if (in_array(strtolower($file->getClientOriginalExtension()), $allowed)) {
                    // get attachment name
                    $attachment_title = $file->getClientOriginalName();
                    // upload attachment and store the new name
                    $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
                   
                    if($file->getClientOriginalExtension() == 'mp4'){
                        $type='video';
                    }elseif($file->getClientOriginalExtension() == 'mp3'){
                        $type='audio';
                    }else{
                        $type='image';
                    }
                    // $file->storeAs(config('chatify.attachments.folder'), $attachment, config('chatify.storage_disk_name'));
                    $file->move('storage/attachments', $attachment);
                } else {
                    $error->status = 1;
                    $error->message = "File extension not allowed!";
                }
            } else {
                $error->status = 1;
                $error->message = "File size you are trying to upload is too large!";
            }
        }
     
        if (!$error->status) {
            // send to database
            $messageID = mt_rand(9, 999999999) + time();
            $Get_fanid = Auth::user()->id;
            $Get_feed=Models::where('user_id',$request['id'])->first();
            if (Auth::user()->roles->first()->title == 'Fan') {
             if(!empty($request->message)){
                
              if (Auth::user()->wallet >= $Get_feed->cost_msg) {
                Chatify::newMessage([
                    'id' => $messageID,
                    'type' => $request['type'],
                    'from_id' => Auth::user()->id,
                    'to_id' => $request['id'],
                    'attachment_price' => $request->price,
                    'mass_status' => '0',
                    'seen' => '0',
                    'attachment_type' => $type,
                    'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                    'attachment' => ($attachment) ? json_encode((object)[
                        'new_name' => $attachment,
                        'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                    ]) : null,
                ]);
                        $commission = Setting::pluck("value", "name");
                        $admin_comi=($Get_feed->cost_msg*$commission['commission'])/100;
                        $model_comi=$Get_feed->cost_msg-$admin_comi;
                        $fan_charge=User::where('id',Auth::user()->id)->first();
                        $fan_charge->wallet=$fan_charge->wallet-$Get_feed->cost_msg;
                        $fan_charge->save();
                        $model_earning=User::where('id',$request['id'])->first();
                        $model_earning->wallet=$model_earning->wallet + $model_comi;
                        $model_earning->save();
                        $User_logs= new User_logs;
                        $User_logs->method='message';
                        $User_logs->from=Auth::user()->id;
                        $User_logs->to=$request['id'];
                        $User_logs->fan_balance=$fan_charge->wallet;
                        $User_logs->price=$Get_feed->cost_msg;
                        $User_logs->model_earning=$model_comi;
                        $User_logs->earnings    =$admin_comi;
                        $User_logs->save();   
                    }else{
                        return Response::json([
                                        'status' => 'insufficentcredit',
                                        'message' => 'Insufficient Credit',
                                    ]);
                    }
            }
            if($type == 'image'){
                if (Auth::user()->wallet >= $Get_feed->cost_pic) {
                    Chatify::newMessage([
                        'id' => $messageID,
                        'type' => $request['type'],
                        'from_id' => Auth::user()->id,
                        'to_id' => $request['id'],
                        'mass_status' => '0',
                        'attachment_price' => $request->price,
                        'attachment_type' => $type,
                        'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                        'attachment' => ($attachment) ? json_encode((object)[
                            'new_name' => $attachment,
                            'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                        ]) : null,
                    ]);
                            $commission = Setting::pluck("value", "name");
                            $admin_comi=($Get_feed->cost_pic*$commission['commission'])/100;
                            $model_comi=$Get_feed->cost_pic-$admin_comi;
                            $fan_charge=User::where('id',Auth::user()->id)->first();
                            $fan_charge->wallet=$fan_charge->wallet-$Get_feed->cost_pic;
                            $fan_charge->save();
                            $model_earning=User::where('id',$request['id'])->first();
                            $model_earning->wallet=$model_earning->wallet + $model_comi;
                            $model_earning->save();
                            $User_logs= new User_logs;
                            $User_logs->method='image';
                            $User_logs->from=Auth::user()->id;
                            $User_logs->to=$request['id'];
                            $User_logs->fan_balance=$fan_charge->wallet;
                            $User_logs->price=$Get_feed->cost_pic;
                            $User_logs->model_earning=$model_comi;
                            $User_logs->earnings    =$admin_comi;
                            $User_logs->save();   
                        }else{
                            return Response::json([
                                            'status' => 'insufficentcredit',
                                            'message' => 'Insufficient Credit',
                                        ]);
                        }

            }
            if($type == 'audio'){
                if (Auth::user()->wallet >= $Get_feed->cost_audiomsg) {
                    Chatify::newMessage([
                        'id' => $messageID,
                        'type' => $request['type'],
                        'from_id' => Auth::user()->id,
                        'mass_status' => '0',
                        'to_id' => $request['id'],
                        'attachment_price' => $request->price,
                        'attachment_type' => $type,
                        'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                        'attachment' => ($attachment) ? json_encode((object)[
                            'new_name' => $attachment,
                            'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                        ]) : null,
                    ]);
                            $commission = Setting::pluck("value", "name");
                            $admin_comi=($Get_feed->cost_audiomsg*$commission['commission'])/100;
                            $model_comi=$Get_feed->cost_audiomsg-$admin_comi;
                            $fan_charge=User::where('id',Auth::user()->id)->first();
                            $fan_charge->wallet=$fan_charge->wallet-$Get_feed->cost_audiomsg;
                            $fan_charge->save();
                            $model_earning=User::where('id',$request['id'])->first();
                            $model_earning->wallet=$model_earning->wallet + $model_comi;
                            $model_earning->save();
                            $User_logs= new User_logs;
                            $User_logs->method='Audio message';
                            $User_logs->from=Auth::user()->id;
                            $User_logs->to=$request['id'];
                            $User_logs->fan_balance=$fan_charge->wallet;
                            $User_logs->price=$Get_feed->cost_audiomsg;
                            $User_logs->model_earning=$model_comi;
                            $User_logs->earnings    =$admin_comi;
                            $User_logs->save();   
                        }else{
                            return Response::json([
                                            'status' => 'insufficentcredit',
                                            'message' => 'Insufficient Credit',
                                        ]);
                        }

            }
            if($type == 'video'){
                if (Auth::user()->wallet >= $Get_feed->cost_videomsg) {
                    Chatify::newMessage([
                        'id' => $messageID,
                        'type' => $request['type'],
                        'mass_status' => '0',
                        'from_id' => Auth::user()->id,
                        'to_id' => $request['id'],
                        'attachment_price' => $request->price,
                        'attachment_type' => $type,
                        'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                        'attachment' => ($attachment) ? json_encode((object)[
                            'new_name' => $attachment,
                            'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                        ]) : null,
                    ]);
                            $commission = Setting::pluck("value", "name");
                            $admin_comi=($Get_feed->cost_videomsg*$commission['commission'])/100;
                            $model_comi=$Get_feed->cost_videomsg-$admin_comi;
                            $fan_charge=User::where('id',Auth::user()->id)->first();
                            $fan_charge->wallet=$fan_charge->wallet-$Get_feed->cost_videomsg;
                            $fan_charge->save();
                            $model_earning=User::where('id',$request['id'])->first();
                            $model_earning->wallet=$model_earning->wallet + $model_comi;
                            $model_earning->save();
                            $User_logs= new User_logs;
                            $User_logs->method='video';
                            $User_logs->from=Auth::user()->id;
                            $User_logs->to=$request['id'];
                            $User_logs->fan_balance=$fan_charge->wallet;
                            $User_logs->price=$Get_feed->cost_videomsg;
                            $User_logs->model_earning=$model_comi;
                            $User_logs->earnings    =$admin_comi;
                            $User_logs->save();   
                        }else{
                            return Response::json([
                                            'status' => 'insufficentcredit',
                                            'message' => 'Insufficient Credit',
                                        ]);
                        }

            }

                
            }else{
                Chatify::newMessage([
                    'id' => $messageID,
                    'type' => $request['type'],
                    'from_id' => Auth::user()->id,
                    'to_id' => $request['id'],
                    'attachment_price' => $request->price,
                    'mass_status' => '0',
                    'attachment_type' => $type,
                    'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                    'attachment' => ($attachment) ? json_encode((object)[
                        'new_name' => $attachment,
                        'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                    ]) : null,
                ]);
            }
        
            // fetch message to send it with the response
             $messageData = Chatify::fetchMessage($messageID);
            
            // send to user using pusher
            Chatify::push('private-chatify', 'messaging', [
                'from_id' => Auth::user()->id,
                'to_id' => $request['id'],
                'message' => Chatify::messageCard($messageData, 'default')
            ]);
          
        }

        // send the response
        return Response::json([
            'status' => '200',
            'error' => $error,
            'message' => Chatify::messageCard(@$messageData),
            'tempID' => $request['temporaryMsgId'],
        ]);
    }
    /**
     * fetch [user/group] messages from database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request)
    {
        $query = Chatify::fetchMessagesQuery($request['id'])->latest();
        $messages = $query->paginate($request->per_page ?? $this->perPage);
        $totalMessages = $messages->total();
        $lastPage = $messages->lastPage();
        $response = [
            'total' => $totalMessages,
            'last_page' => $lastPage,
            'last_message_id' => collect($messages->items())->last()->id ?? null,
            'messages' => '',
        ];
        // if there is no messages yet.
        if ($totalMessages < 1) {
            $response['messages'] ='<p class="message-hint center-el"><span>Say \'hi\' and start messaging</span></p>';
            return Response::json($response);
        }
        if (count($messages->items()) < 1) {
            $response['messages'] = '';
            return Response::json($response);
        }
        $allMessages = null;
        foreach ($messages->reverse() as $index => $message) {
            $allMessages .= Chatify::messageCard(
                Chatify::fetchMessage($message->id, $index)
            );
        }
        $response['messages'] = $allMessages;
        return Response::json($response);
    }
    /**
     * Make messages as seen
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function seen(Request $request)
    {
        // make as seen
        $seen = Chatify::makeSeen($request['id']);
        // send the response
        return Response::json([
            'status' => $seen,
        ], 200);
    }
    /**
     * Get contacts list
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getContacts(Request $request)
    {
        // get all users that received/sent message from/to [Auth user]
        $users = Message::join('users',  function ($join) {
            $join->on('ch_messages.from_id', '=','users.id')
                ->orOn('ch_messages.to_id', '=','users.id');
        })
        ->where(function ($q) {
            $q->where('ch_messages.from_id',Auth::user()->id)
            ->orWhere('ch_messages.to_id',Auth::user()->id);
        })
        ->where('users.id','!=',Auth::user()->id)
        ->select('users.*',DB::raw('MAX(ch_messages.created_at) max_created_at'))
        ->orderBy('max_created_at', 'desc')
        ->groupBy('users.id')
        ->paginate($request->per_page ?? $this->perPage);
        // dd($users);
        $usersList = $users->items();
        if (count($usersList) > 0) {
            $contacts = '';
            foreach ($usersList as $user) {
                $contacts .= Chatify::getContactItem($user);
            }
        } else {
            $contacts = '<p class="message-hint center-el"><span>Your contact list is empty</span></p>';
        }
        return Response::json([
            'contacts' => $contacts,
            'total' => $users->total() ?? 0,
            'last_page' => $users->lastPage() ?? 1,
        ], 200);
    }
    /**
     * Update user's list item data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateContactItem(Request $request)
    {
        // Get user data
        $user = User::where('id', $request['user_id'])->first();
        if(!$user){
            return Response::json([
                'message' => 'User not found!',
            ], 401);
        }
        $contactItem = Chatify::getContactItem($user);

        // send the response
        return Response::json([
            'contactItem' => $contactItem,
        ], 200);
    }
    /**
     * Put a user in the favorites list
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function favorite(Request $request)
    {
        // check action [star/unstar]
        if (Chatify::inFavorite($request['user_id'])) {
            // UnStar
            Chatify::makeInFavorite($request['user_id'], 0);
            $status = 0;
        } else {
            // Star
            Chatify::makeInFavorite($request['user_id'], 1);
            $status = 1;
        }
        // send the response
        return Response::json([
            'status' => @$status,
        ], 200);
    }
    /**
     * Get favorites list
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function getFavorites(Request $request)
    {
        $favoritesList = null;
        $favorites = Favorite::where('user_id', Auth::user()->id);
        foreach ($favorites->get() as $favorite) {
            // get user data
            $user = User::where('id', $favorite->favorite_id)->first();
            $favoritesList .= view('Chatify::layouts.favorite', [
                'user' => $user,
            ]);
        }
        // send the response
        return Response::json([
            'count' => $favorites->count(),
            'favorites' => $favorites->count() > 0
                ? $favoritesList
                : 0,
        ], 200);
    }
    public function getactive(Request $request)
    {
        $activeList = null;
       
        if(Auth::user()->roles->first()->title == 'fan'||Auth::user()->roles->first()->title == 'Fan') {
            $active = Contacts::join('users','users.id','contacts.model_id')->where('users.is_online','1')->where('contacts.fan_id',Auth::user()->id);
            foreach ($active->get() as $actives) {
                // get user data
                $user = User::where('id', $actives->model_id)->first();
                $activeList .= view('Chatify::layouts.activelist', [
                    'user' => $user,
                ]);
            }
        }elseif(Auth::user()->roles->first()->title == 'model'||Auth::user()->roles->first()->title == 'Model') {
            $active = Contacts::join('users','users.id','contacts.fan_id')->where('users.is_online','1')->where('contacts.model_id',Auth::user()->id);
            foreach ($active->get() as $actives) {
                // get user data
                $user = User::where('id', $actives->fan_id)->first();
                $activeList .= view('Chatify::layouts.activelist', [
                    'user' => $user,
                ]);
            }
        }
      
       
        // send the response
        return Response::json([
            'count' => $active->count(),
            'active' => $active->count() > 0
                ? $activeList
                : 0,
        ], 200);
    }
    /**
     * Search in messenger
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function search(Request $request)
    {
        $getRecords = null;
        $input = trim(filter_var($request['input']));
        $records = Contacts::join('users','users.id','contacts.model_id')->where('contacts.fan_id',Auth::user()->id)
                    ->where('users.first_name', 'LIKE', "%{$input}%")
                    ->paginate($request->per_page ?? $this->perPage);
                    // dd($records);
        foreach ($records->items() as $record) {
            $getRecords .= view('Chatify::layouts.listItem', [
                'get' => 'search_item',
                'type' => 'user',
                'user' => Chatify::getUserWithAvatar($record),
            ])->render();
        }
        if($records->total() < 1){
            $getRecords = '<p class="message-hint center-el"><span>ooops.</span></p>';
        }
        // send the response
        return Response::json([
            'records' => $getRecords,
            'total' => $records->total(),
            'last_page' => $records->lastPage()
        ], 200);
    }
    /**
     * Get shared photos
     *
     * @param Request $request
     * @return JsonResponse|void
     */
    public function sharedPhotos(Request $request)
    {
   
        $ModelsPricing=Models::where('user_id',$request->user_id)->first();

        if(!empty($ModelsPricing))
        {
            $textMsg= '$'.$ModelsPricing->cost_msg.' / msg sent';
            $videoMsg='$'.$ModelsPricing->cost_videomsg.' / video sent';
            $imageMsg='$'.$ModelsPricing->cost_pic.' / image sent';
            $audioMsg='$'.$ModelsPricing->cost_audiomsg.' / audio sent';
            $audioCall='$'.$ModelsPricing->cost_audiocall.' / minute*';
            $videoCall='$'.$ModelsPricing->cost_videocall.' / minute*';
        }

        $shared = Chatify::getSharedPhotos($request['user_id']);
        $sharedPhotos = null;
        // shared with its template
        for ($i = 0; $i < count($shared); $i++) {
            $sharedPhotos .= view('Chatify::layouts.listItem', [
                'get' => 'sharedPhoto',
                'image' => Chatify::getAttachmentUrl($shared[$i]),
            ])->render();
        }
        // send the response
        return Response::json([
            'shared' => count($shared) > 0 ? $sharedPhotos : '<p class="message-hint"><span>Nothing shared yet</span></p>',
            'textMsg'=>$textMsg??'',
            'videoMsg'=>$videoMsg ?? '',
            'imageMsg'=>$imageMsg ?? '',
            'audioMsg'=>$audioMsg ?? '',
            'audioCall'=>$audioCall ?? '',
            'videoCall'=>$videoCall ?? '',
        ], 200);
    }
    /**
     * Delete conversation
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteConversation(Request $request)
    {
        // delete
        $delete = Chatify::deleteConversation($request['id']);
        // send the response
        return Response::json([
            'deleted' => $delete ? 1 : 0,
        ], 200);
    }
    /**
     * Delete message
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteMessage(Request $request)
    {
        // delete
        $delete = Chatify::deleteMessage($request['id']);
        // send the response
        return Response::json([
            'deleted' => $delete ? 1 : 0,
        ], 200);
    }
    public function updateSettings(Request $request)
    {
        $msg = null;
        $error = $success = 0;
        // dark mode
        if ($request['dark_mode']) {
            $request['dark_mode'] == "dark"
                ? User::where('id', Auth::user()->id)->update(['dark_mode' => 1])  // Make Dark
                : User::where('id', Auth::user()->id)->update(['dark_mode' => 0]); // Make Light
        }
        // If messenger color selected
        if ($request['messengerColor']) {
            $messenger_color = trim(filter_var($request['messengerColor']));
            User::where('id', Auth::user()->id)
                ->update(['messenger_color' => $messenger_color]);
        }
        // if there is a [file]
        if ($request->hasFile('avatar')) {
            // allowed extensions
            $allowed_images = Chatify::getAllowedImages();
            $file = $request->file('avatar');
            // check file size
            if ($file->getSize() < Chatify::getMaxUploadSize()) {
                if (in_array(strtolower($file->getClientOriginalExtension()), $allowed_images)) {
                    // delete the older one
                    if (Auth::user()->avatar != config('chatify.user_avatar.default')) {
                        $avatar = Auth::user()->avatar;
                        if (Chatify::storage()->exists($avatar)) {
                            Chatify::storage()->delete($avatar);
                        }
                    }
                    // upload
                    $avatar = Str::uuid() . "." . $file->getClientOriginalExtension();
                    $update = User::where('id', Auth::user()->id)->update(['avatar' => $avatar]);
                    $file->storeAs(config('chatify.user_avatar.folder'), $avatar, config('chatify.storage_disk_name'));
                    $success = $update ? 1 : 0;
                } else {
                    $msg = "File extension not allowed!";
                    $error = 1;
                }
            } else {
                $msg = "File size you are trying to upload is too large!";
                $error = 1;
            }
        }
        // send the response
        return Response::json([
            'status' => $success ? 1 : 0,
            'error' => $error ? 1 : 0,
            'message' => $error ? $msg : 0,
        ], 200);
    }

    /**
     * Set user's active status
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function setActiveStatus(Request $request)
    {
        $update = $request['status'] > 0
            ? User::where('id', $request['user_id'])->update(['active_status' => 1])
            : User::where('id', $request['user_id'])->update(['active_status' => 0]);
        // send the response
        return Response::json([
            'status' => $update,
        ], 200);
    }
}
