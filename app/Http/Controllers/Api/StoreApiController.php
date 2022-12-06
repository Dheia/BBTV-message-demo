<?php



namespace App\Http\Controllers\api;



use App\Http\Controllers\Controller;



use Illuminate\Http\Request;



use App\Models\User;
use App\Models\Setting;




use App\Models\VendorSetting;



use App\Models\Category;



use App\Http\Traits\CurrencyTrait;



use Validator;



use App\Models\Product;



use App\Models\ProductBid;



use App\Models\Role;
use App\Models\Cart;
use App\Models\Wishlist;



use Carbon;



use Auth;



class StoreApiController extends Controller



{



    use CurrencyTrait;



    public function index_bk(Request $request)



    {







        $vend = Role::where('title', 'Vendor')->first()->users();



        // if(!empty($request->location)){



        //     $vend->leftJoin('vendorsettings', 'vendorsettings.vendor_id', '=', 'users.id');



        //     $vend->where('vendorsettings.value', '=', $request->location)->select('users.*','vendorsettings.name');



        // }



        if(!empty($request->location)){



            $vend->leftJoin('city_user', 'city_user.user_id', '=','users.id')->where('city_user.city_id', $request->location);



        }



        $vendors = $vend->get();



        foreach ($vendors as $key => $value) {







              $data=$this->getVendorMeta($value->id);







              $value['profile_img']= isset($data['profile_img'])?url('images/vendor/settings/' . $data['profile_img']):'';



              $value['banner_img']= isset($data['banner_img'])?url('images/vendor/settings/' . $data['banner_img']):'';



              $value['data'] = $data;



        }



      return response()->json(['status' => true, 'message' => "Store list", 'data' => $vendors], 200);







    }


    public function index(Request $request){

        $datavendor = [];
        $storedata = [];

        $vend = Role::where('title', 'Vendor')->first()->users()->get();
        $settings  = Setting::where('name', 'app_store_banner')->first();
        $slider = [];
        foreach(json_decode($settings->value) as $sliderimg){
            $slider[] = url('images/'.$sliderimg);
        }

        foreach ($vend as $key => $value) {

            $data=$this->getVendorMeta($value->id);

              $data['profile_img']= isset($data['profile_img'])?url('images/vendor/settings/' . $data['profile_img']):'';
              $data['banner_img']= isset($data['banner_img'])?url('images/vendor/settings/' . $data['banner_img']):'';
              unset($data['citystatecountry']);
              unset($data['ship_city']);
              unset($data['selling_state']);
              unset($data['selling_city']);
              unset($data['selling_city_data']);

             // $value['data'] = $data;
              $datavendor[] = $data;


        }

        $storedata['sliders'] = !empty($slider) ? $slider : [];
        $storedata['stores'] = $datavendor;

         return response()->json(['status' => true, 'message' => "Store list", 'data' => $storedata], 200);
    }




    public function singlestore_bk( Request $request)

    {
          $data['vendor'] = User::where('id','=',$request->id)->first();

          $data=$this->getVendorMeta($request->id);

          $data['profile_img']=isset($data['profile_img'])?url('images/vendor/settings/' . $data['profile_img']):'';
            $data['banner_img']=isset($data['banner_img'])?url('images/vendor/settings/' . $data['banner_img']):'';
            $data['product'] = Product::where([['vendor_id','=',$request->id],['product_type','booking']])->get();
            foreach($data['product'] as $product_key => $product_val){
                $product_val->featured_image = isset($product_val->featured_image)?url('products/feature/' . $product_val->featured_image):'';
                 // currency 
                 if(!empty($request->currency_code)){
                    $currency = $this->currencyFetch($request->currency_code);
                    $data['product'][$product_key]['currency_sign'] = $currency['sign'];
                    $data['product'][$product_key]['currency_code'] = $currency['code'];
                 }

                  //Product Bids

                    $productbid = ProductBid::where('product_id',$product_val->id)->first();

                    if(!empty($productbid)){
                       $mytime = Carbon\Carbon::now();
                       $currenttime  =  $mytime->toDateString();
                       $productbid = ProductBid::whereDate('end_date','>=',$currenttime)->first();
                       if(!empty($productbid)){

                            $data['product'][$product_key]['bid_status'] = 'is_available';

                       }

                       else{

                            $data['product'][$product_key]['bid_status'] = 'not_available';

                       }



                        $data['product'][$product_key]['start_date']    = $productbid->start_date;

                        $data['product'][$product_key]['end_date']      = $productbid->end_date;

                        $data['product'][$product_key]['min_bid_price'] = $productbid->min_bid_price;

                        $data['product'][$product_key]['step_price']    = $productbid->step_price;

                    }
            }
        return response()->json(['status' => true, 'message' => "Store list", 'data' => $data], 200);

    }


    public function singlestore( Request $request){
        $currencycode = $request->currency_code;
        $user = auth()->guard('api')->user();
        if(!empty($user)){
            $userid = $user->id;
        }
         $data=$this->getVendorMeta($request->id);
         $data['profile_img']=isset($data['profile_img'])?url('images/vendor/settings/' . $data['profile_img']):'';
         $data['banner_img']=isset($data['banner_img'])?url('images/vendor/settings/' . $data['banner_img']):'';
         $data['product'] = Product::where([['vendor_id','=',$request->id],['product_type','!=','giftcard'],['is_publish','=',1],['product_type','!=','card']])->get();
         foreach($data['product'] as $product_key => $product_val){
            $product_val->featured_image = isset($product_val->featured_image)?url('products/feature/' . $product_val->featured_image):'';
                $gallery = json_decode($product_val->gallery_image);
                if(!empty($gallery)){
                    foreach ($gallery as $key1 => $value) {
                        $value1 = url('products/gallery/' . $value);
                        $gallery_data[] = $value1;
                    }
                     $data['product'][$product_key]['gallery_image'] = $gallery_data;
                }

                    if(isset($userid)){

                        $Cart =    Cart::where('user_id',$user_id)->where('product_id',$val->id)->first();
                        if(!empty($Cart)){
                            $data['product'][$product_key]['in_cart'] = true;

                        }
                        else{
                             $data['product'][$product_key]['in_cart'] = false;
                        }
                        $wishlist = Wishlist::where('user_id',$user_id)->where('product_id',$val->id)->first();
                        if(!empty($wishlist)){
                             $data['product'][$product_key]['in_wishlist'] = true;
                        }
                        else{
                             $data['product'][$product_key]['in_wishlist'] = false; 

                        }
                    }

                    else{
                         $data['product'][$product_key]['in_cart'] = false;
                         $data['product'][$product_key]['in_wishlist'] = false;

                    }
                 // currency 
                 if(!empty($request->currency_code)){
                    $currency = $this->currencyFetch($request->currency_code);
                    $data['product'][$product_key]['currency_sign'] = $currency['sign'];
                    $data['product'][$product_key]['currency_code'] = $currency['code'];
                 }

                  //Product Bids

                    $productbid = ProductBid::where('product_id',$product_val->id)->first();

                    if(!empty($productbid)){
                       $mytime = Carbon\Carbon::now();
                       $currenttime  =  $mytime->toDateString();
                       $productbid = ProductBid::whereDate('end_date','>=',$currenttime)->first();
                       if(!empty($productbid)){

                            $data['product'][$product_key]['bid_status'] = 'is_available';

                       }

                       else{

                            $data['product'][$product_key]['bid_status'] = 'not_available';

                       }



                        $data['product'][$product_key]['start_date']    = $productbid->start_date;

                        $data['product'][$product_key]['end_date']      = $productbid->end_date;

                        $data['product'][$product_key]['min_bid_price'] = $productbid->min_bid_price;

                        $data['product'][$product_key]['step_price']    = $productbid->step_price;

                    }
         }

          unset($data['citystatecountry']);
          unset($data['ship_city']);
          unset($data['selling_state']);
          unset($data['selling_city']);
          unset($data['selling_city_data']);

         return response()->json(['status' => true, 'message' => "Store list", 'data' => $data], 200);

    }







     public function singlestorecategory(Request $request)



    {







        $validator = Validator::make($request->all(), [







            'id' => 'required'







        ]);







        if ($validator->fails()) {







            return response()->json(['status' => false,'code'=>$succcessCode, 'message' => implode("", $validator->errors()->all())], 200);







        }







        $vendor = User::where('id','=',$request->id)->first();







        $productcat = Product::select('products.id as pro_id','products.vendor_id','categories.*')->Join('categories', 'categories.id', '=', 'products.cat_id')->groupBy('categories.slug')->get();







        if(count($productcat)>0){







            foreach($productcat as $key => $val){







                $val->category_image = url('category/' . $val->category_image );







                $val->category_image_banner = url('category/' . $val->category_image_banner );



            }







            return response()->json(['status' => true, 'message' => "Store Category list", 'data' => $productcat], 200);  



        }







        else{



            return response()->json(['status' => false, 'message' => "Store category not found", 'data' => []], 200);  



        }



        //   $vendor = User::where('id','=',$request->id)->get();



        //     foreach ($vendor as $key => $value) {







        //         $product = Product::where('vendor_id','=',$request->id)->groupBy('cat_id')->get();



        //         foreach ($product as $key => $value) {



        //             $data['categories'][] = Category::where('id','=',$value->cat_id)->get();  



        //         }  











        //     }



        //     return response()->json(['status' => true, 'message' => "Store list", 'data' => $data], 200);  







    }















    public function singlestorecategoryproduct(Request $request){



        $validator = Validator::make($request->all(), [



            'id' => 'required',



        ]);







        if ($validator->fails()) {



            return response()->json(['status' => false, 'message' => implode("", $validator->errors()->all())], 200);



        }







        if(isset($request->cat_id) && !empty($request->cat_id)){



            $products = Product::where('cat_id',$request->cat_id)->get();



        }



        else{



            $products = Product::where('vendor_id',$request->id)->get();



        }







        if(count($products)>0){







            foreach($products as $key => $val){



                // currency 



                if(!empty($request->currency_code)){



                    $currency = $this->currencyFetch($request->currency_code);



                    $products[$key]['currency_sign'] = $currency['sign'];



                    $products[$key]['currency_code'] = $currency['code'];



                }



            }



            return response()->json(['status' => false, 'message' => "Store Category Product List", 'data' => $products], 200); 







        }







        else{







            return response()->json(['status' => false, 'message' => "Store Category Product List not found", 'data' =>[]], 200); 







        }







    }















    



}















