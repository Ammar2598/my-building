<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bu;
use App\User;
use App\ContactUs;
use App\Http\Requests;
use App\Http\Requests\BuRequest;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{


  public  function index(User $user,Bu $bu,ContactUs $contactUs){
    $buCountActive=countBuAppendTostatus(1);
    $buWating=countBuAppendTostatus(0);
    $usersCount=$user->count();
    $contactUsCount=$contactUs->count();
    $sample=$bu->select('bu_langtuide','bu_latituide','bu_name')->latest('id')->first();
    $chart=$bu->select(DB::raw('COUNT(*) as counting ,month'))->where('year',date('Y'))->groupBy('month')->orderBy('month','asc')->get()->toArray();
    $array=[];
    if (isset($chart[0]['month'])) {
   for ($i=1; $i <$chart[0]['month'] ; $i++) {
     $array[]=0;
   }
   }
   $new=array_merge($array,$chart);
    $lastesUsers=$user->take('8')->orderBy('id','desc')->get();
    $lastesBu=$bu->take('7')->orderBy('id','desc')->get();
    $lastesContactus=$contactUs->take('6')->orderBy('id','desc')->get();

      return view('admin.home.index',compact('buCountActive','buWating','usersCount','contactUsCount','new','sample','lastesUsers','lastesBu','lastesContactus'));
    }

    public function showYearStatics(Bu $bu){
      $year=date('Y');
      $chart=$bu->select(DB::raw('COUNT(*) as counting ,month'))->where('year',date('Y'))->groupBy('month')->orderBy('month','asc')->get()->toArray();
       $array=[];
       if (isset($chart[0]['month'])) {
         for ($i=1; $i <$chart[0]['month'] ; $i++) {
           $array[]=0;
         }
       }

      $new=array_merge($array,$chart);
      return view('admin.home.statics',compact('year','new'));
    }
    public function showThisYear(Request $request,Bu $bu){
      $year=$request->year;
      $chart=$bu->select(DB::raw('COUNT(*) as counting ,month'))->where('year',$year)->groupBy('month')->orderBy('month','asc')->get()->toArray();
       $array=[];
       if (isset($chart[0]['month'])) {
      for ($i=1; $i <$chart[0]['month'] ; $i++) {
        $array[]=0;
      }
    }
      $new=array_merge($array,$chart);
      return view('admin.home.statics',compact('year','new'));
    }
}
