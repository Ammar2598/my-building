<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BuRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'bu_name' =>'required|min:5|max:100',
          'bu_price'=>'required',
          'bu_rent'=>'required',
          'bu_square'=>'required',
          'bu_type'=>'required',
          // 'bu_small_dis'=>'required|min:5|max:160',
          'bu_meta'=>'required|min:5|max:200',
          'bu_langtuide'=>'required',
          'bu_latituide'=>'required',
          'bu_large_dis'=>'required',
          // 'bu_status'=>'required|integer',
          'rooms'=>'required|integer',
          'bu_place'=>'required',
          'image'=>'mimes:png,jpg,jpeg',
        ];
    }
}
