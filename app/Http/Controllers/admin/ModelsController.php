<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Models;
use App\Models\ModelCategory;
use App\Models\ModelEthnicity;
use App\Models\ModelFetishes;
use App\Models\ModelHair;
use App\Models\ModelLanguage;
use App\Models\Tags;
use App\Models\ModelOrientation;
use App\Models\User;
use App\Models\User_documents;
use Hash;
use DB;
Use Image;
use Carbon\Carbon;
use Intervention\Image\ImageManager;

class ModelsController extends Controller
{
    public function index(Request $request){
        $d['title'] = "Model";
         $d['buton_name'] = "ADD NEW";
        $pagination=10;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
        $q=DB::table('users')
                    ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                    ->leftjoin('models', 'models.user_id', '=', 'users.id')
                    ->select('users.*','models.*','users.id as users_auto_id')
                    ->where('role_user.role_id', '=', 6)
                    ->where('users.deleted_at','=',null)
                    ->where('models.deleted_at','=',null)
                    ->orderBy('models.created_at','desc');


        if(!empty($request->search)){
            $q->where('first_name', 'like', "%$request->search%")
            ->orWhere('last_name', 'like', "%$request->search%")
            ->orWhere('email', 'like', "%$request->search%") ->where('users.deleted_at','=',null);
          
        }
      
        $d['model']=$q->paginate($pagination)->withQueryString();
        return view('admin.models.index',$d);
    }

    public function create(){


        $d['tags']  = Tags::all()->pluck('title', 'id');
        $d['title'] = "Model Add";
        $d['roles'] = Role::all()->pluck('title', 'id');
        $d['model_cate'] = ModelCategory::where('status','active')->get();
        $d['model_ethnic'] = ModelEthnicity::where('status','active')->get();
        $d['model_fet'] = ModelFetishes::where('status','active')->get();
        $d['model_hair'] = ModelHair::where('status','active')->get();
        $d['model_lang'] = ModelLanguage::where('status','active')->get();
        $d['model_orient'] = ModelOrientation::where('status','active')->get();
        $d['model'] = DB::table('users')
                    ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                    ->leftjoin('models', 'models.user_id', '=', 'users.id')
                    ->select('users.*','models.*')
                    ->where('role_user.role_id', '=', 6)
                    ->get();

                    $country_list = DB::Table('country_list')->get();
                    $d['country_list']=$country_list;
        return view('admin.models.create', $d);
    }


    public function thumbnail($originalPath, $file, $user, $width, $height){        
         $ogImage = Image::make($file);
        $ogImage->fit($width, $height);
      
        $img = explode('.', $file->getClientOriginalName());
        $thImage = $ogImage->save($originalPath.$img[0].'_'.$width.'x'.$height.'.'.$img[1],70);
          return  $thImage;

      
    }
    public function store(Request $request)
    {  
   
        if ($request->userid == '') {
            $validated = $request->validate([
                'email' => 'required|unique:users',
               
            ]);
        }


        if ($request->userid == '') {
           
            if ( empty($request->hasfile('profile_image'))  && $request->status=='Active') {

                return redirect()->back()->with('error', 'Account status cannot be activated without profile');

            }
            
        }
        


      
      
      
        $d['model'] = DB::table('users')
                    ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                    ->leftjoin('models', 'models.user_id', '=', 'users.id')
                    ->select('users.*','models.*')
                    ->where('role_user.role_id', '=', 6)
                    ->get();
        $password = Hash::make($request->password);
        $user = User::updateOrCreate(['id'=>$request->userid],[

            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'dob'           => $request->dob,
            'email'         => $request->email,
            // 'password'      => $password,
            'phone'         => $request->phone_number,
            'city'          => $request->city,
            'state'         => $request->state,
            'gender'        => $request->gender,
            
            'user_status'   => $request->user_status,
            'discription'   => $request->description,
            'country'   => $request->country,
            'loginphone'   => $request->loginphone,
            'bbphone'   => $request->bbphone,


        ]);
        $user->roles()->sync(6);
       
        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $ogImage = Image::make($file);
            $file->getClientOriginalName();
            
            $originalPath = time().'_user_'.$user->id;
            $ogImage =  $ogImage->save('profile-image/'.$originalPath.$file->getClientOriginalName(),70);
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '600','550');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '250','300');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '300','300');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '300','350');
            $this->thumbnail('profile-image/'.$originalPath,$file, $user->id, '175','175');
            
            $user->profile_image = $originalPath.$file->getClientOriginalName(); 
            
        }

       

        if(isset($user->profile_image)) {
            $user->status = $request->status;
        }else{
            $user->status = 'Blocked';
        }

        $user->update();
        if(isset($request->id)){
            $user_id=$request->user_id;
        }else{
            $user_id =  $user->id;
        }
        

        $social_links = [];
        $social_links = [
            'twitter'       => "$request->link1",
            'instagram'     => "$request->link2",
            'snapchat'      => "$request->link3",
            'spankpay'      => "$request->link4",
            'website'       => "$request->link5",
            'camsite'       => "$request->link6",
        ];

        if($request->featured == 1){
            $featured=1;
        }else{
             $featured=0;
        }
        if($request->input('trending')==1){
            $trending=1;
        }else{
             $trending=0;
        }
        if($request->input('explore')==1){
            $explore=1;
        }else{
             $explore=0;
        }

        $last_id=User::orderBy('id', 'DESC')->first();

            if(empty($request->userid)){
                $user_id1= $last_id->id;
            }else{
                $user_id1=$request->userid;
            }
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


       $model_name=$request->first_name.' '.$request->last_name;
    
        $models = Models::updateOrCreate(['id'=>$request->id],[

            'user_id'           => $user_id1,
            'model_name'        => $model_name,
            'phone'             => $request->phone,
            'video'             => $request->video,
            'stage_name'        => $request->stage_name,
            'Orientation'       => $request->orientation,
            'Model_Category'    => $request->modelcategory,
            'Ethnicity'         => $request->ethnicity,
            'Language'          => $request->language,
            'Hair'              => $request->hair,
            'Fetishes'          => $request->fetishes,
            'url1'              => $request->url1,
            'url2'              => $request->url2,
            'url3'              => $request->url3,
            'cost_msg'          => $request->costmsg,
            'cost_pic'          => $request->costpicture,
            'cost_videomsg'     => $request->costvideo_msg,
            'cost_audiomsg'     => $request->costaudio_msg,
            'cost_audiocall'    => $request->costaudio_call,
            'cost_videocall'    => $request->cost_videocall,
            'socail_links'      => json_encode($social_links, true),
            'featured'          => $featured,
            'trending'          => $trending,
            'explore'           => $explore,

        ]);
        $models->tags()->sync($request->input('tags', []));
        if($request->hasfile('gallery_image'))
        {
            $file1 = $request->file('gallery_image');
            foreach($file1 as $image)
            {
              $name =$image->getClientOriginalName();
              $destinationPath = 'gallery images';
              $image->move($destinationPath, $name);
              $gallery_image_name[] =  $name;

            }
        }

        $result = [];
        // dd($request->gallery_images_old);
        $varimg = $request->gallery_images_old;

        if(!empty($gallery_image_name) && !empty($varimg)){

            $result = array_merge($gallery_image_name, $varimg);
        }
        else if(!empty($gallery_image_name)) {

            $result = $gallery_image_name;

        } else {
            $result = $varimg;
        }

        Models::where('id','=',$models->id)->update([
            'gallery_image' => json_encode($result,true)
        ]);

        $models->update();
        return redirect()->route('dashboard.models.index');
    }
    public function edit($id)
    {
        $d['title'] = "Model Edit";
        $d['buton_name'] = "Edit";
        $d['model_cate'] = ModelCategory::where('status','active')->get();
        $d['model_ethnic'] = ModelEthnicity::where('status','active')->get();
        $d['model_fet'] = ModelFetishes::where('status','active')->get();
        $d['model_hair'] = ModelHair::where('status','active')->get();
        $d['model_lang'] = ModelLanguage::where('status','active')->get();
        $d['model_orient'] = ModelOrientation::where('status','active')->get();
        $model = User::leftjoin('models', 'models.user_id', '=', 'users.id')
                    ->select('users.*','models.*','users.id as users_auto_id','users.phone as phoneno')
                    ->where('models.user_id', '=', $id)
                    ->where('users.id', '=', $id)
                    ->first();
           
       $model_tags=Models::where('user_id',$id)->first();
       
       
        
        
        $tags = Tags::all()->pluck('title', 'id');
         $d['model']=$model;
         $d['tags']=$tags;
         $d['model_tags']=$model_tags;
  
        $country_list = DB::Table('country_list')->get();
                    $d['country_list']=$country_list;
        return view('admin.models.create', $d);

    }

    public function update(UpdateUserRequest $request, User $user)
    {

    }

    public function show()
    {

    }
    public function bankdetail($id)
    {
        $d['title'] = "Model Bank Detail";
        $d['model'] = Models::where('user_id', $id)->first();
        $d['user']=User::where('id', $id)->first();
        return view('admin.models.bank', $d);
    }
    public function destroy($id)
    { 
        $mytime = Carbon::now();
       
        $user_delete = User::where('id', $id)->delete();
        $model_delete = Models::where('user_id', $id)->delete();
    
        return back();
    }
    public function sortmodel(Request $request)
    {
       
        $d['title'] = "Model";

        // dd($d['model']);
        $d['buton_name'] = "ADD NEW";
        $pagination=10;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
        $q=DB::table('users')
                    ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                    ->leftjoin('models', 'models.user_id', '=', 'users.id')
                    ->select('users.*','models.*','users.id as users_auto_id')
                    ->where('role_user.role_id', '=', 6);
      if(!empty($request->sorting)){
        if ($request->sorting=='Female') {
            $q->where('gender','female');
           }else{
             if($request->sorting=='Male'){
                 $q->where('gender','male');
             }else{
                 if($request->sorting=='Verified'){
                 $q->where('user_status','verified');
                 }else{
                     if($request->sorting=='Unverified'){
                         $q->where('user_status','unverified');
                     }else{
                        if($request->sorting=='Blocked'){
                            $q->where('status','Blocked');
                        }else{
                            if($request->sorting=='Pending'){
                                $q->where('status','Pending'); 
                            }
                        }
                     }
             }
             }
           }
      }
      

        $d['model']=$q->paginate($pagination)->withQueryString();
        
        return view('admin.models.index',$d);
    }
    public function document_delete($id){
        $document_delete = User_documents::where('id', $id)->delete();
        return back();
    }

}
