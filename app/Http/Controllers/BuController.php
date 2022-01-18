<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bu;
use App\User;
use App\Http\Requests;
use App\Http\Requests\BuRequest;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Illuminate\Support\Facades\Auth;
use DB;

class BuController extends Controller
{
    public function index(Request $request){
       $id=$request->id!== null ? '?user_id='.$request->id : null;
      return view('admin/bu.index',compact('id'));
    }

    public function create(){
     return view('admin/bu.add');
    }
    public function store(BuRequest $buRequest ,Bu $bu){
      if ($buRequest->file('image')) {
        $fileName=uploadImage($buRequest->file('image'));
        if (!$fileName) {
          return Redirect::back()->with('success' , 'من فضلك صوره بمقاييس اصغر من 362*500');
        }
           $image=$fileName;
    }else {
      $image='';
    }
      $user=Auth::user();
      $data=[
        'bu_name'=>$buRequest->bu_name,
        'bu_price'=>$buRequest->bu_price,
        'bu_rent'=>$buRequest->bu_rent,
        'bu_square'=>$buRequest->bu_square,
        'bu_type'=>$buRequest->bu_type,
        'bu_small_dis'=>$buRequest->bu_small_dis,
        'bu_meta'=>$buRequest->bu_meta,
        'bu_langtuide'=>$buRequest->bu_langtuide,
        'bu_latituide'=>$buRequest->bu_latituide,
        'bu_large_dis'=>$buRequest->bu_large_dis,
        'bu_status'=>$buRequest->bu_status,
        'user_id'=>$user->id,
        'rooms'=>$buRequest->rooms,
        'bu_place'=>$buRequest->bu_place,
        'image'=>$image,
        'month'=>date('m'),
        'year'=>date('Y'),
      ];

      $bu->create($data);
        return Redirect('/adminpanel/bu')->with('success' , 'تم اضافة العقار بنجاح');
    }
    public function edit ($id ,User $user){

      $bu=Bu::find($id);
      if ($bu->user_id == 0) {
          $user='';
      }else {
         $user=$user->where('id',$bu->user_id)->get()[0];
      }

      return view('admin.bu.edit',compact('bu','user'));
    }
    public function update ($id ,Requests\BuRequest $request){
      $buUpdate=Bu::find($id);
      $buUpdate->fill(array_except($request->all(),['image']))->save();
      if ($request->file('image')) {
      $fileName=uploadImage($request->file('image'),'/public/website/bu_images/','500','362',$buUpdate->image);
      if (!$fileName) {
        return Redirect::back()->with('success' , 'من فضلك صوره بمقاييس اصغر من 362*500');
      }
      $buUpdate->fill(['image'=>$fileName])->save();
      }
      return Redirect::back()->with('success' , 'تم التعديل بنجاح');
    }

    public function destroy($id){
      Bu::find($id)->delete();
      return Redirect::back()->with('success' , 'تم الحذف بنجاح');
    }

    public function anyData(Request $request,Bu $bu)
   {
     if ($request->user_id) {
         $bus = $bu->where('user_id',$request->user_id)->get();

     }else{
        $bus = $bu->all();
     }




       return Datatables::of($bus)

           ->editColumn('bu_name', function ($model) {
               return '<a href="'.url('/adminpanel/bu/' . $model->id . '/edit').'">'.$model->bu_name.'</a>';
           })
           ->editColumn('bu_type', function ($model) {
             $type=bu_type();
               return '<span class="badge badge-info">' . $type[$model->bu_type] . '</span>';
           })


           ->editColumn('bu_status', function ($model) {
               return $model->bu_status == 0 ? '<span class="badge badge-info">' . 'غير مفعل' . '</span>' : '<span class="badge badge-warning">' . 'مفعل' . '</span>';
           })

           ->editColumn('control', function ($model) {
               $all = '<a href="' . url('/adminpanel/bu/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';


                   $all .= '<a href="' . url('/adminpanel/bu/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>';


               return $all;
           })
           ->make(true);

   }
   public function showAllEnable(Bu $bu){
    $buAll=$bu->where('bu_status',1)->orderBy('id','des')->paginate(15);
    return view('website.bu.all',compact('buAll'));
   }
   public function ForRent(Bu $bu){
    $buAll=$bu->where('bu_status',1)->where('bu_rent',1)->orderBy('id','des')->paginate(15);
    return view('website.bu.all',compact('buAll'));
   }
   public function ForBuy(Bu $bu){
    $buAll=$bu->where('bu_status',1)->where('bu_rent',0)->orderBy('id','des')->paginate(15);
    return view('website.bu.all',compact('buAll'));
   }
   public function showByType($type,Bu $bu){
     if (in_array($type,['0','1','2'])) {
       $buAll=$bu->where('bu_status',1)->where('bu_type',$type)->orderBy('id','des')->paginate(15);
       return view('website.bu.all',compact('buAll'));
     }else{
       return Redirect::back();
     }
   }
   public function search(Request $request,Bu $bu ){

     $requestAll=array_except($request->toArray(),['submit','_token','page']);
     $query=DB::table('bu')->select('*');
     $array=[];
     $count=count($requestAll);
     $i=0;
     foreach ($requestAll as $key=>$req) {
       $i++;
         if($req !=''){
         if ($key =='bu_price_from' && $request->bu_price_to=='') {
           $query->where('bu_price','>=',$req );
         }elseif ($key == 'bu_price_to'&& $request->bu_price_from=='') {
             $query->where('bu_price','<=',$req );
         }
         else {
           if ($key !='bu_price_from' && $key !='bu_price_to' ) {
             $query->where($key , $req);
           }

         }

        $array[$key]=$req;

     }elseif ($count==$i && $request->bu_price_from !='' && $request->bu_price_to !='') {
      $query->whereBetween('bu_price', [$request->bu_price_from, $request->bu_price_to]);
          $array[$key]=$req;
     }
   }
     $buAll=$query->paginate(15);

     return view('website.bu.all',compact('buAll','array'));
   }

   public function showSingle(Bu $bu,$id){
    $buInfo=$bu->findOrFail($id);
    if ($buInfo->bu_status == 0) {
      $messageTitle="هذا العقار ينتظر موافقة الادارة";
      $messageBody="العقار
      $buInfo->bu_name
       موجود لدينا ولكنه في انتظار موافقة الادارة عليه
         يتم نشر العقار في مدة اقصاها 24 ساعه     ";
        return view('website.bu.noper',compact('buInfo','messageTitle','messageBody'));
    }
    $same_rent=$bu->where('bu_rent',$buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
    $same_type=$bu->where('bu_type',$buInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
    return view('website.bu.buInfo',compact('buInfo','same_rent','same_type'));
   }

   public function getAjaxInfo(Bu $bu,Request $request){
     return $bu->find($request->id)->toJson();
   }
   public function userAddview(){
     return view('website.userbu.useradd');
   }

   public function userStore(Requests\BuRequest $buRequest,Bu $bu){
     if ($buRequest->file('image')) {
       $fileName=uploadImage($buRequest->file('image'));
       if (!$fileName) {
         return Redirect::back()->with('success' , 'من فضلك صوره بمقاييس اصغر من 362*500');
       }
       $image=$fileName;
   }else {
     $image='';
   }
     $user=Auth::user() ? Auth::user()->id : 0;
     $data=[
       'bu_name'=>$buRequest->bu_name,
       'bu_price'=>$buRequest->bu_price,
       'bu_rent'=>$buRequest->bu_rent,
       'bu_square'=>$buRequest->bu_square,
       'bu_type'=>$buRequest->bu_type,
       'bu_small_dis'=>strip_tags(str_limit($buRequest->bu_large_dis,160)),
       'bu_meta'=>$buRequest->bu_meta,
       'bu_langtuide'=>$buRequest->bu_langtuide,
       'bu_latituide'=>$buRequest->bu_latituide,
       'bu_large_dis'=>$buRequest->bu_large_dis,
       'user_id'=>$user,
       'rooms'=>$buRequest->rooms,
       'bu_place'=>$buRequest->bu_place,
       'image'=>$image,
       'month'=>date('m'),
       'year'=>date('Y'),
       
     ];

     $bu->create($data);
       return view('website.userbu.done');
   }
   public function showUserBuilding(Bu $bu){
     $user=Auth::user();
     $bu=$bu->where('user_id',$user->id)->where('bu_status',1)->paginate(15);
     return view('website.userbu.showuserbu',compact('bu','user'));
   }
   public function buildingShowWating(Bu $bu){
     $user=Auth::user();
     $bu=$bu->where('user_id',$user->id)->where('bu_status',0)->paginate(15);
     return view('website.userbu.showuserbu',compact('bu','user'));
   }

   public function userEditBuilding($id,Bu $bu){
     $user=Auth::user();
     $buInfo=$bu->find($id);
     if ($user->id != $buInfo->user_id) {
       $messageTitle="هذا العقار لم تقم باضافته";
       $messageBody="العقار
       $buInfo->bu_name
       لم تقم باضافته تم اضافته من خلال عضويه تانيه";
         return view('website.bu.noper',compact('buInfo','messageTitle','messageBody'));

     }elseif ($buInfo->bu_status ==1) {
       $messageTitle="هذا العقار تم تفعيله";
       $messageBody="العقار
       $buInfo->bu_name
       قد تم تفعيله ولا يمكنك التعديل عليه حاليا واذا اردت التعديل عليه اتصل بنا وارسل طلب تعديل";
         return view('website.bu.noper',compact('buInfo','messageTitle','messageBody'));

     }
    $bu=$buInfo;
     return view('website.userbu.edituserbu',compact('bu','user'));
   }

   public function userUpdateBuilding(Requests\BuRequest $request,Bu $bu){
     $buUpdate=$bu->find($request->bu_id);
     $buUpdate->fill(array_except($request->all(),['image']))->save();
     if ($request->file('image')) {
     $fileName=uploadImage($request->file('image'),'/public/website/bu_images/','500','362',$buUpdate->image);
     if (!$fileName) {
       return Redirect::back()->with('success' , 'من فضلك صوره بمقاييس اصغر من 362*500');
     }
     $buUpdate->fill(['image'=>$fileName])->save();
     }
       return Redirect::back()->with('success' , 'تم التعديل بنجاح');
   }

   public function changeStatus($id,$status,Bu $bu){
     $buUpdate=$bu->find($id);
     $buUpdate->fill(['bu_status'=>$status])->save();
     return Redirect::back()->with('success','تم التعديل بنجاح');
   }
}
