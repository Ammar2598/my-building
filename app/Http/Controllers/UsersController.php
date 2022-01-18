<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequestAdmin;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdatePassword;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Datatables;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Bu;
class UsersController extends Controller
{
    public function index(){


      return view('admin.user.index');
    }

    public function create(){
      return view('admin.user.add');
    }
    public function store(AddUserRequestAdmin $reuest ,User $user)
    {
         $user->create([
            'name' => $reuest->name,
            'email' => $reuest->email,
            'password' => bcrypt($reuest->password),
        ]);
        return redirect('adminpanel/users')->with('success' , 'تم  اضافة العضو بنجاح');
    }

    public function edit($id,User $user,Bu $bu){

      $user=$user->find($id);
      $buwating=$bu->where('user_id',$id)->where('bu_status','0')->get();
      $buenable=$bu->where('user_id',$id)->where('bu_status','1')->get();
      return view('admin.user.edit',compact('user','buwating','buenable'));
    }

    public function update($id,User $user,Request $reuest ){
      
      $userupdate=$user->find($id);
      $userupdate->fill($reuest->all())->save();
      return Redirect::back()->with('success' , 'تم التعديل بنجاح');
    }

    public function updatePassword(Request $reuest,User $user){
      $userupdate=$user->find($reuest->user_id);
      $password = bcrypt($reuest->password);
      $userupdate->fill(['password'=>$password])->save();
        return Redirect::back()->with('success' , 'تم تغيير كلمه المرور بنجاح');

    }
    public function destroy($id,User $user){
      if($id !=1){
        $user=$user->find($id)->delete();
        Bu::where('user_id',$id)->delete();
          return redirect('adminpanel/users')->with('success' , 'تم الحذف بنجاح');
        }
        else {
            return redirect('adminpanel/users')->with('success' , 'لا يمكن حذف العضويه رقم 1');
        }
    }

    public function anyData(User $user)
   {

     $users = $user->all();

       return Datatables::of($users)

           ->editColumn('name', function ($model) {
               return '<a href="'.url('/adminpanel/users/' . $model->id . '/edit').'">'.$model->name.'</a>';
           })
           ->editColumn('admin', function ($model) {
               return $model->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span>' : '<span class="badge badge-warning">' . 'مدير الموقع' . '</span>';
           })


           ->editColumn('mybu', function ($model) {
               return '<a href="'.url('/adminpanel/bu/' . $model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>';
           })

           ->editColumn('control', function ($model) {
               $all = '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
               if($model->id != 1){

                   $all .= '<a href="' . url('/adminpanel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>';

               }
               return $all;
           })
           ->make(true);

   }
   public function usereditInfo(){
     $user=Auth::user();
     return view('website.profile.edit',compact('user'));
   }


   public function userUpdateProfile(User $users,UserUpdateRequest $request){
        $user=Auth::user();
        if($request->email != $user->email){
          $checkmail=$users->where('email',$request->email)->count();
          if($checkmail==0){
            $user->fill($request->all())->save();
          }else {
            return Redirect::back()->with('success','هذا الايميل موجود مسبقا لدينا برجاء استخدام ايميل اخر');
          }
          }else {
            $user->fill(['name'=>$request->name])->save();
          }
        return Redirect::back()->with('success','تم التعديل بنجاح');
   }
   public function changePassword(User $users,UserUpdatePassword $request){
         $user=Auth::user();
         if (Hash::check($request->password ,$user->password)) {
          $hash=Hash::make($request->newpassword);
          $user->fill(['password'=>$hash])->save();
           return Redirect::back()->with('success','تم تعديل الباسورد بنجاح');
         }else {
           return Redirect::back()->with('success','الباسورد القديم غير مطابق للمسجل لدينا');
         }
   }
}
