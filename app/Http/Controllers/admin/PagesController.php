<?php



namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
use App\Models\PageMeta;
class PagesController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {
        $d['title'] = "PAGE";
        $d['buton_name'] = "ADD NEW";
        $d['page']=Page::all();
        $pagination=10;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }

        $q=Page::select('*');
            if($request->search){
                $q->where('title', 'like', "%$request->search%");
            }
             $d['page']=$q->paginate($pagination)->withQueryString();
        return view('admin/page/index',$d);
    }

     public function dummydesign(Request $request){
         return view('admin/dummy-page-design');
     }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create(){
        $d['title'] = "PAGE";
        return view('admin/page/add',$d);
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        $page = Page::updateOrCreate(
            ['id' => $request->id ],
            [
            // 'user_id'   => Auth::user()->id,
             'title'     => $request->input('title'),
             'content'     => $request->input('content'),
            'arab_title'     => $request->input('arab_title'),
            'arab_content'     => $request->input('arab_content'),
            'status'     => $request->status,
        ]);
        $metaarray=[
            'pagemeta_title'=>$request->input('page_title'),
            'pagemeta_keywords' =>$request->input('page_keywords'),
            'pagemeta_details'=>$request->input('page_details'),
        ];

        foreach($metaarray as $key=> $vl){
            if(!empty($vl)){
                $homepage= PageMeta::where('page_id','=',$request->id)->updateOrCreate([
                'page_id'=> $page->id,
                'key'=>$key,
            ], ['value'=>$vl]);
            }
        }
 //PhoneSex banner,tranding model banner,join adultX banner insert code

        $imagesarray=[
             'phone_sex_banner'=>$request->file('phone_sex_banner'),
            'trending_models_banner'=>$request->file('trending_models_banner'),
            'join_adultx_banner'=>$request->file('join_adultx_banner'),
        ];
        foreach ($imagesarray as $key => $cabinet) {
            if(!empty($cabinet)){
                 $imageName = uniqid().$cabinet->getClientOriginalName();
                $cabinet->move('images/Home-page-images', $imageName);
                $homepage= PageMeta::where('page_id','=',$request->id)->updateOrCreate([
                    'page_id'=> $page->id,
                        'key'=>$key,
                      ], [
                        'value'=>$imageName,
                    ]);
              }
        }
    //Home slider title, desc and image insert
            $slider_title  =  isset($request->slider_title) ? $request->slider_title : "" ;
            $slider_sub_title  =  isset($request->slider_sub_title) ? $request->slider_sub_title : "" ;
            $slider_desc  =   isset($request->slider_desc) ? $request->slider_desc : "" ;
            $slider_image  =isset($request->slider_image) ? $request->slider_image : "" ;
            $slider_imageold  =isset($request->slider_imageold) ? $request->slider_imageold : "" ;
           $Meta_Slider_Array = [];
           if(!empty($slider_title)){
            foreach ($slider_title as $key => $cabinet) {
             if(!empty($slider_title[$key])){
              if(!empty($slider_image[$key])){              
              $imagePath = $slider_image[$key];
               $imageName = uniqid().$imagePath->getClientOriginalName();              
               $slider_image[$key]->move('images/Home-page-images', $imageName);
             }else if(!empty($slider_imageold[$key])){
                $url = url('images/Home-page-images');
                $imageName = $replaced = str_replace($url, '', $slider_imageold[$key]);            
            }            
             $Meta_Slider_Array[] = [
               "slider_title"      =>$slider_title[$key],
               "slider_sub_title"      =>$slider_sub_title[$key],
               "slider_image" =>$imageName,
               "slider_desc"         => $slider_desc[$key] 
             ];

             PageMeta::where('page_id','=',$request->id)->updateOrCreate([
                'page_id'=> $page->id,
                    'key'=>'home_slider',
                  ], [
                    'value'=>json_encode($Meta_Slider_Array),
                ]);
           }
         }
       }

//Home Category icons and titles
$category_title  =  isset($request->category_title) ? $request->category_title : "" ;
$category_icon  =isset($request->category_icon) ? $request->category_icon : "" ;
$category_iconold  =isset($request->category_iconold) ? $request->category_iconold : "" ;
$Meta_Category_Array = [];
if(!empty($category_title)){
 foreach ($category_title as $key => $cabinet) {
  if(!empty($category_title[$key])){ 
   if(!empty($category_icon[$key])){ 
    $imagePath = $category_icon[$key];
    $imageName = uniqid().$imagePath->getClientOriginalName();
    $category_icon[$key]->move('images/Home-page-images', $imageName);   
  }else if(!empty($category_iconold[$key])){
    $url = url('images/Home-page-images');
    $imageName = $replaced = str_replace($url, '', $category_iconold[$key]);
}
$Meta_Category_Array[] = [
    "category_title"      =>$category_title[$key],
    "category_icon" =>$imageName,];
  PageMeta::where('page_id','=',$request->id)->updateOrCreate([
     'page_id'=> $page->id,
         'key'=>'home_page_category',
       ], [
         'value'=>json_encode($Meta_Category_Array),
     ]);
}

}

}
   $page->update();
    return redirect('/dashboard/pages')->with('status', 'your data is updated');
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



        $d['title'] = "PAGE";

        $d['page']=Page::findorfail($id);

        $page_id =$id;

         $d['setting']=PageMeta::where('page_id', '=' , $id)->first();

        $d['data'] = $this->getPageMeta($page_id);
        $d['homepage']=PageMeta::where('page_id','=' , 1)->pluck('value','key');
        return view('admin/page/add',$d);

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

        $page = Page::findOrFail($id);

        $page->delete();

        return back();

    }

}

