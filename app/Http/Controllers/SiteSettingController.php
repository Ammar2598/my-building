<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siteSetting;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class SiteSettingController extends Controller
{
    public function index(siteSetting $siteSetting){
      $siteSetting=$siteSetting->all();
      return view('admin.sitesetting.index',compact('siteSetting'));
    }

    public function store(Request $request,siteSetting $siteSetting){
      foreach (array_except( $request->toArray(),['_token','submit']) as $key=> $req) {


        $siteSettingUpdate=$siteSetting->where('namesetting',$key)->get()[0];
        if ($siteSettingUpdate->type !=3) {
            $siteSettingUpdate->fill(['value'=>$req])->save();
        }else {
          $fileName=uploadImage($req,'/public/website/slider/','1600','500',$siteSettingUpdate->value);
          if ($fileName) {
             $siteSettingUpdate->fill(['value'=>$fileName])->save();
          }
        }


      }
      return Redirect::back()->withFlashMessage('تم التعديل علي الاعدادات بنجاح');
    }
}
