<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Send_emails;
use Mail;
class EmailMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $title='Mails';
      $email=Send_emails::all();
      
      return view('admin.email.index',compact('email','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user=User::where('status','Active')->get();
        
       return view('admin.email.create  ',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     
     if (!empty($request->allfan) OR !empty($request->allmodel) OR !empty($request->users)) {
          
      if ($request->allfan=='1') {
       $allfan=User::whereHas('roles', function($q){
        $q->where('title', '=', 'Fan');})->get();
       $getfan=[];
     foreach($allfan as $item){
       $getfan[]=$item->email;
     }           
      }else{
        $getfan[]='';
      }
      
      if($request->allmodel=='1'){
      $allmodel=User::whereHas('roles', function($q){
        $q->where('title', '=', 'Model');})->get();
       $getmodel=[];
     foreach($allmodel as $item){
       $getmodel[]=$item->email;
     } 
    }else{
        $getmodel[]='';
    }
    if (!empty($request->allfan) && !empty($request->allmodel) && !empty($request->users)) {
      $merge=array_merge($getfan,$getmodel,$request->users);
    }elseif(!empty($request->allmodel) && !empty($request->users)){
      $merge=array_merge($getmodel,$request->users);
    }else{
      if (!empty($request->allfan) && !empty($request->users)) {
        $merge=array_merge($getfan,$request->users);
      }elseif(!empty($request->allfan) && !empty($request->allmodel)){
        $merge=array_merge($getfan,$getmodel);
      }else{
        if (!empty($request->allfan)) {
         $merge=$getfan;
        }elseif(!empty($request->allmodel)){
          $merge=$getmodel;
        }else{
          if (!empty($request->users)) {
            
            $merge=$request->users;
          }else{
            return redirect()->back()->with('error', 'Something Went Wrong Try Again');
          }
          
        }
      }
    }


     if(!empty($merge)) {
      if(count($merge)>0) {
               
        foreach($merge as $item){
           
          $details = [
            'email' => $item,
            'message' => $request->content,
            ];
            
        if (!empty($details['email'])) {
          Mail::send('mails.mail', $details, function($message) use ($details){
            $message->to($details['email'])->subject('Test Mail')->from(env('MAIL_FROM_ADDRESS'));
        });
        }

          }
         
        }
     }else{
      return 'No mail select';
     }      
     
              $encode=json_encode($merge);
            

              $mail= new Send_emails;
              $mail->message=$request->content;
              $mail->emails=$encode;
          
              $mail->save();
     return redirect()->back()->with('success', 'Mail send successfully');
       }else{
         return redirect()->back()->with('error', 'No email selected');
       }  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
