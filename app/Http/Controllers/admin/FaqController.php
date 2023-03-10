<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;
use Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $d['title'] = "Faqs";
        $d['buton_name'] = "ADD NEW";
         $pagination=10;
        if(isset($_GET['paginate'])){
            $pagination=$_GET['paginate'];
        }
           $q=Faqs::select('*');
            if($request->search){
                $q->where('title', 'like', "%$request->search%");  
            }
             $d['faqs']=$q->paginate($pagination)->withQueryString();
        
        return view('admin/faq/index',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d['title'] = "Faq Create";
        return view('admin/faq/add',$d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $faq = Faqs::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
            'title'                 => $request->input('title'),
            'arab_title'                 => $request->input('arab_title'),
            'status'     => $request->input('status'),
            'description'      => $request->input('description'),
            'arab_description'      => $request->input('arab_description')
            
        ]);
        return redirect('/dashboard/faq');
    
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
        
        $d['title'] = "Faq";
        $d['faq']   =Faqs::findorfail($id);
        return view('admin/faq/add',$d);
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
        $tax = Faqs::findOrFail($id);
        $tax->delete();
        return back();
    }
}
