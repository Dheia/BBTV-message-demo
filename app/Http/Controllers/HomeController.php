<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helper\Helper;
use App\Models\LogActivity;
use App\Models\User_logs;
use RTippin\Messenger\Facades\Messenger;
use Validator;
use Auth;
use Mail;
use Session;
use App\Models\User;
use App\Models\Earning;
use App\Models\User_documents;
use App\Models\refferal_users;
use App\Models\Blogs;
use App\Models\Models;
use App\Models\User_support;
use Hash;
use DateTime;
use Carbon\Carbon;
use App\Models\ModelCategory;
use App\Models\ModelEthnicity;
use App\Models\ModelFetishes;
use App\Models\ModelHair;
use App\Models\ModelLanguage;
use App\Models\ModelOrientation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function forgot()
    {
        return view('auth.passwords.reset');
    }
    public function index()
    {
        $dt = new DateTime();


        $fancount = User::whereHas('roles', function ($q) {
            $q->where('title', '=', "Fan");
       })->get();
        $modelcount = User::whereHas('roles', function ($q) {
            $q->where('title', '=', "Model");
       })->get();
       $date = \Carbon\Carbon::today()->subDays(7);
       $countusers = User::where('created_at', '>=', $date)->get();
       $total_earning = Earning::sum('amount');

        $today_date= $dt->format('Y-m-d');

       $today_earning = Earning::whereDate('created_at',$today_date)->sum('amount');

       $today_feeds = Blogs::whereDate('created_at',$today_date)->get();



       $OnlineModel = User::whereHas('roles', function ($q) {
        $q->where([
            'title'=> "Model",
            'is_online'=> "1",
        ]);
   })->get();
       $Onlinefan = User::whereHas('roles', function ($q) {
        $q->where([
            'title'=> "Fan",
            'is_online'=> "1",
        ]);
   })->get();

       $d['countusers']=$countusers;
       $d['fancount']=$fancount;
       $d['modelcount']=$modelcount;
       $d['total_earning']=$total_earning;
       $d['today_earning']=$today_earning;
       $d['OnlineModel']=$OnlineModel;
       $d['Onlinefan']=$Onlinefan;
       $d['today_feeds']=$today_feeds;
        return view('index', $d);
    }
     public function myTestAddToLog()
    {
        \Helper::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {  $data['title'] = "Logs";
        $logs = LogActivity::where('user_id','!=','0')->orderby('created_at','desc')->paginate(20);

        return view('logActivity',compact('logs'));
    }

    public function user_logs(Request $request)
    {
         $year=Carbon::now()->format('Y');

        $data['title'] = "Logs";
        $d['model']=Models::join('users','users.id','=','models.user_id')->select('models.*','users.*')->where('users.status','=','Active')->get();
        $d['today_total_earning'] = user_logs::whereDate('created_at',Carbon::today())->sum('price');
        $d['today_total_admin'] = user_logs::whereDate('created_at',Carbon::today())->sum('earnings');
        $d['month_total_earning'] = user_logs::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $d['month_total_admin'] = user_logs::whereMonth('created_at',Carbon::now()->month)->sum('earnings');
        $d['year_total_earning'] = user_logs::whereYear('created_at',$year)->sum('price');
        $d['year_total_admin'] = user_logs::whereYear('created_at',$year)->sum('earnings');
        
        $d['user']=User::where('status','Active')->where('first_name',"!=",['Admin','admin'])->get();
        
        $logs = user_logs::orderby('id','desc');

       if($request->date_sorting){
        if($request->date_sorting !='all'){
           
             if($request->date_sorting=='today'){
                 $logs->whereDate('created_at',Carbon::today());
               }
               if($request->date_sorting=='month'){
                 $logs->whereMonth('created_at',Carbon::now()->month);
               }
               if($request->date_sorting=='year'){
                 $logs->whereYear('created_at',$year);
                 }
       }
     
        }
        if ($request->model_sorting) {
            if($request->model_sorting !='all'){
                $logs->where('to',$request->model_sorting);
       }
        }
         if ($request->fan_sorting) {
            if($request->fan_sorting !='all'){
            
                $logs->where('from',$request->fan_sorting);
            }
         }


        $d['logs']=$logs->paginate(10)->withQueryString();
        return view('User_logs',$d);
    }
    public function logsdelete($id)
    {
        $log = LogActivity::findOrFail($id);
        $log->delete();
        return back();
    }
    public function earning_time_filter(Request $request)
    { 
        $thismonth=Carbon::now()->format('m');
        $year=Carbon::now()->format('Y');
        $today=Carbon::now();
        $dt = new DateTime();
        $today=$dt->format('Y-m-d H:i:s');

         if($request->search=='month'){
        $thismont_data=user_logs::whereMonth('created_at', Carbon::now()->month)->get();
      
        }else{
            if ($request->search=='today') {
                $thismont_data=user_logs::whereDate('created_at', Carbon::today())->get();
            }else{
                if ($request->search=='year') {
                    $thismont_data=user_logs::whereYear('created_at', $year)->get();
                }
            }
          
        }
        $online = '';
        $status = false;
        
        if (count($thismont_data) > 0) {
            $status = true;
            $data = ' ';
            $url= url('dashboard.user-logsdelete');
            foreach ( $thismont_data as $key => $item) {
               
                $data .= ' <tr>
               
               <td><b> '.$item->user->first_name.' '.$item->method.' To  '.$item->model->first_name.'  </b></td>
                <td> $'.$item->price.'</td>
                <td> $'.$item->model_earning.'</td>
                <td> $'.$item->earnings.'</td>

                <td>
                <div class="btn btn-sm btn-primary" ><i class="fa fa-eye" data-toggle="modal" data-target="#logview"></i></div>         
                    <form action="'.$url.'/'.$item->id.'" method="POST"
                          onsubmit="return confirm("Are you sure");" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-danger"
                            value="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
                </tr>
            ';



              $data .= '';
            }
          
        }else{
            $data = '';
        }
    
        
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function user_logsdelete($id)
    {
        $log = User_logs::findOrFail($id);
        $log->delete();
        return back();
    }
    public function earning_model_filter(Request $request)
    { 
        $year=Carbon::now()->format('Y');
        if (!empty($request)) {
            $thismont_data=user_logs::where('to', $request->search)->get();
            $data = '';
            $status = false;
            // if (!empty($request->time)) {
            //    if ($request->time=='today') {
                
            //   $thismont_data->whereDate('created_at', Carbon::today())->get();
            //    }elseif($request->time=='month') {
            //    $thismont_data->whereMonth('created_at', Carbon::now()->month)->get();
            //    }else{if ($request->time=='yaer') {
            //     $thismont_data->whereYear('created_at', $year)->get();
            //    }

            //    }
            // }  

            if (count($thismont_data) > 0) {
                $status = true;
                $data = ' ';
                $url= url('dashboard.user-logsdelete');
                foreach ( $thismont_data as $key => $item) {
                   
                    $data .= ' <tr>
                     <td><b> '.$item->user->first_name.' '.$item->method.' To  '.$item->model->first_name.'  </b></td>
                    <td> $'.$item->price.'</td>
                     <td> $'.$item->model_earning.'</td>
                    <td> $'.$item->earnings.'</td>
    
                    <td>
                    <div class="btn btn-sm btn-primary" ><i class="fa fa-eye" data-toggle="modal" data-target="#logview"></i></div>
                        <form action="'.$url.'/'.$item->id.'" method="POST"
                              onsubmit="return confirm("Are you sure");" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-sm btn-danger"
                                value="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    </tr>
                ';
    
                  $data .= '';
                }
                $data .= '';
            }
      
            
            return response()->json(['status' => 'success', 'data' => $data]);


        }
    }
    public function earning_user_filter(Request $request)
    {
        if (!empty($request)) {
            $thismont_data=user_logs::where('from', $request->search)->get();
            $data = '';
            $status = false;
            
            if (count($thismont_data) > 0) {
                $status = true;
                $data = ' ';
                $url= url('dashboard.user-logsdelete');
                foreach ( $thismont_data as $key => $item) {
                   
                    $data .= ' <tr>
                     <td><b> '.$item->user->first_name.' '.$item->method.' To  '.$item->model->first_name.'  </b></td>
                    <td> $'.$item->price.'</td>
                     <td> $'.$item->model_earning.'</td>
                    <td> $'.$item->earnings.'</td>
    
                    <td>
                    <div class="btn btn-sm btn-primary" ><i class="fa fa-eye" data-toggle="modal" data-target="#logview"></i></div>
                        <form action="'.$url.'/'.$item->id.'" method="POST"
                              onsubmit="return confirm("Are you sure");" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-sm btn-danger"
                                value="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    </tr>
                ';
    
    
    
    
    
    
    
    
    
    
    
    
                  $data .= '';
                }
                $data .= '';
            }
      
            
            return response()->json(['status' => 'success', 'data' => $data]);


        }
    }
    public function userlogin()
    {
        if (Auth::user()) {
            if (Auth::user()->roles->first()->title == 'admin' || Auth::user()->roles->first()->title == 'Admin') {
                 return redirect('/admin');
            }
            if (Auth::user()->roles->first()->title == 'Fan' || Auth::user()->roles->first()->title == 'Fan') {
               if (Auth::user()->status=='Active') {
                    return redirect('fan/dashboard');
               }else{
                return redirect()->back();
               }
            }
            if (Auth::user()->roles->first()->title == 'Model' || Auth::user()->roles->first()->title == 'Model') {
                return redirect('model/dashboard');
            }
        } else {
            return view('frontend.auth.login');
        }
    }
    public function logs()
    {
        return view('frontend.auth.login');
    }
    public function signup()
    {
        return view('frontend.auth.signup');
    }
    public function registeruser()
    {
        return view('auth.register');
    }
    public function postlogin(Request $request)
    {

        request()->validate([
            'log_email' => 'required|email',
            'log_password' => 'required',
        ]);
          
        
        $user = User::where('email', '=', $request->log_email)->first();
       
        if (!Auth::attempt(array('email' =>$request->log_email, 'password' => $request->log_password))) {         
            Session::flash('error', "Email Or Password Not Match!");
            return redirect()->back();
        }
       
        $remember = true;
        Auth::login($user, $remember);
        $userdata=User::where('id','=',Auth::user()->id)->first();
        $userdata->is_online='1';
        $userdata->save();
        $type='User login';
        \Helper::addToLog('User login', $type);
        
        if (Auth::user()->roles->first()->title == 'admin' || Auth::user()->roles->first()->title == 'Admin') {
           
            return redirect('/dashboard');
        }
        if (Auth::user()->roles->first()->title == 'fan' || Auth::user()->roles->first()->title == 'Fan') {
           if (Auth::user()->status=='Active') {
                    return redirect('fan/dashboard');
               }
          
          if (Auth::user()->status=='Pending') {
            Auth::logout();
            return redirect()->back()->with('error', 'Your account is not activated');
          }
          if (Auth::user()->status=='Blocked') {
          
            Auth::logout();
            return redirect()->back()->with('error', 'Your account is blocked');
        }
        if (Auth::user()->status=='Inreview') {
            Auth::logout();
            return redirect()->back()->with('error', 'Your account is In Review');
        }else{
            return redirect()->back()->with('error', 'Something went wrong !');
        }
        }
        if (Auth::user()->roles->first()->title == 'model' || Auth::user()->roles->first()->title == 'Model') {

      
            if (Auth::user()->profile_status=='1') {
              
                if (Auth::user()->status=='Active') {
                  
                    return redirect('model/dashboard');

              }
              if (Auth::user()->status=='Pending') {
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is not activated');
              }
              if (Auth::user()->status=='Blocked') {
              
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is blocked');
            }
            if (Auth::user()->status=='Inreview') {
                Auth::logout();
                return redirect()->back()->with('error', 'Your account is In Review');
            }else{
                return redirect()->back()->with('error', 'Something went wrong !');
            }
              
            }else{
           
                return redirect('/step-form');
            }
          
        }
    }
    public function model_step(){
        $d['model_cate'] = ModelCategory::where('status','active')->get();
        $d['model_ethnic'] = ModelEthnicity::where('status','active')->get();
        $d['model_fet'] = ModelFetishes::where('status','active')->get();
        $d['model_hair'] = ModelHair::where('status','active')->get();
        $d['model_lang'] = ModelLanguage::where('status','active')->get();
        $d['model_orient'] = ModelOrientation::where('status','active')->get();
        $d['User']=User::where('id',Auth::user()->id)->first();
        $d['model']=Models::where('user_id',Auth::user()->id)->first();
        return view('frontend.model.model-profile-steps',$d);
    }
    public function storeuser(Request $request)
    {
        
        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'first_name' => 'required',
            'password' =>['required','min:8'] ,
            'readbox'=> 'required',
        ]);
  
        $user = User::create([
            'first_name'=>$request->first_name,
            'email'=>$request->email,
            'status'=>'Pending',
            'password'=>Hash::make($request->password),
            
           ]);
           Messenger::getProviderMessenger($user);
       
            $role=4;
            $user->roles()->sync($role);   

        $details = [
            'email' => $request->email,
             'user_id'=>$user->id,
            ];
       
        Session::flash('success', "Success");
             
        Mail::send('mails.new_fan_mail', $details, function($message) use ($details){
            $message->to($details['email'])->subject('Thanks for sign up')->from(env('MAIL_FROM_ADDRESS'));
        });
        return redirect()->back();


        
    }
    public function joinmodel(){
        return view('frontend.joinpage');
    }

    function rand_string( $length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789QWERTYUIOPLKJHGFDSAZXCVBNM";
        return substr(str_shuffle($chars),0,$length);
    }

    public function savemodel(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'govt_id' => 'required',
            'holding_id' => 'required',
                      
        ]);
    
           $random_password=$this->rand_string(13);
           $password = Hash::make($random_password);
            $user = User::updateOrCreate(['id'=>$request->userid],[
             'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
             'email'         => $request->email,
             'phone'         => $request->phone_number,
            'profile_image' =>$profile_image,
            'gender'        => $request->gender,
            'user_status'   =>'unverified',
            'status'        =>'Pending',
        ]);
        if(!empty($request->refer_id)){
            $refer= new refferal_users;
            $refer->refer_from=$request->refer_id;
            $refer->refer_to= $user->id;
            $refer->save();
        }
       
        $user->roles()->sync(6);
        $user->update();
        $last_id=User::orderBy('id', 'DESC')->first();
        $user_id1= $last_id->id;
        $model_name=$request->first_name.' '.$request->last_name;
        $models = Models::updateOrCreate(['id'=>$request->id],[
            'user_id'           => $user_id1,
            'phone'             => $request->phone_number,
            'model_name'        => $model_name,
            'stage_name'        => $request->stage_name,
            'url1'              => $request->url1,
            'url2'              => $request->url2,
            'url3'              => $request->url3,
        

        ]);
        $models->update();
        if($request->hasfile('govt_id'))
        {
            $file1 = $request->file('govt_id');
           
              $name =$file1->getClientOriginalName();
              $namefile=time().'.'.$name;
              $destinationPath = 'assets/images/User document';
              $file1->move($destinationPath, $namefile);
              $govt_id2 =  $namefile;
                $govt_id=new User_documents;
                $govt_id->user_id=$user_id1;
                $govt_id->document_type='Govt_issued_id';
                $govt_id->document=$govt_id2;
              $govt_id->save();
        }

        if($request->hasfile('holding_id'))
        {
            $file = $request->file('holding_id');
           
              $name2 =$file->getClientOriginalName();
              $namefile2=time().'.'.$name2;
              $destinationPath = 'assets/images/User document';
              $file->move($destinationPath, $namefile2);
              $holding_id2 =  $namefile2;



                $holding_id= new User_documents;
                $holding_id->user_id=$user_id1;
                $holding_id->document_type='Holding_id';
                $holding_id->document=$holding_id2;
                $holding_id->save();

        }
       
        return redirect()->route('model-register');
    }

    // froentend user support page

    public function user_support(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $support = new User_support;
        $support->name = $request->name;
        $support->email = $request->email;
        $support->phone = $request->phone;
        $support->message = $request->message;
        $support->save();
        return redirect()->back()->with('message', 'Your Message Resverd successfully Our Team Contact With You Soon!');
    }

    public function updateCallId(Request $request)
    {
        # code...
        User::updateOrCreate(['id' => $request->user_id],[
            'call_id' => $request->call_id
        ]);
        return response()->json(['status' => true], 200);
    }

    

}
