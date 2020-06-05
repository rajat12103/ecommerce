<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Banners;
use Image;
use Illuminate\Support\Facades\Input;

class BannersController extends Controller
{
    public function banners(){
    	$bannerDetails= Banners::get();
    	return view('admin.banner.banners')->with(compact('bannerDetails'));
    }

    public function addBanner(Request $request){
    	if($request->ismethod('post')){
    		$data= $request->all();
    		$banner= new Banners;
    		$banner->name= $data['banner_name'];
    		$banner->text_style= $data['text_style'];
    		$banner->content= $data['banner_content'];
    		$banner->link= $data['link'];
    		$banner->sort_order= $data['sort_order'];

    		if($request->hasfile('image')){
    			$img_tmp=Input::file('image');
    			if($img_tmp->isValid()){

    			//image path code
    			$extension= $img_tmp->getClientOriginalExtension();
    			$filename= rand(111, 99999).'.'.$extension;
    			$img_path= 'uploads/banners/'.$filename;

    			//image resize
    			Image::make($img_tmp)->save($img_path);

    			$banner->image=$filename;
    			}
    		}

    		$banner->save();
    		return redirect('/admin/banners')->with('flash_message_success','Banners has been updated successfully!!');
    	}
    	return view('admin.banner.add_banner');
    }

    public function editBanner(Request $request, $id=null){
    	if($request->ismethod('post')){
    		$data= $request->all();

    		if($request->hasfile('image')){
    			$image_tmp=Input::file('image');
    			if($image_tmp->isValid()){

    			//image path code
    			$extension= $image_tmp->getClientOriginalExtension();
    			$filename= rand(111, 99999).'.'.$extension;
    			$banner_path= 'uploads/products/'.$filename;

    			//image resize
    			Image::make($image_tmp)->resize(500,500)->save($banner_path);
    			}
    		}
    		elseif(!empty($data['current_image'])){
    			$filename=$data['current_image'];
    		}else{
    			$filename="";
    		}


    		Banners::where(['id'=>$id])->update(['name'=>$data['banner_name'], 'text_style'=>$data['text_style'], 'content'=>$data['banner_content'], 'link'=>$data['link'], 'sort_order'=>$data['sort_order'], 'image'=>$filename]);
    		return redirect('/admin/banners')->with('flash_message_success','Bannwr has been edited successfully!!');
    	}

    	$bannerDetails= Banners::where(['id'=>$id])->first();
    	return view('admin.banner.edit_banner')->with(compact('bannerDetails'));
    }

    public function deleteBanner($id=null){
        Banners::where(['id'=>$id])->delete();
        Alert::Success('Deleted', 'Success Message');
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id=null){
        $data= $request->all();
        Banners::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

}
