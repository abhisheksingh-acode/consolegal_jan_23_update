<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\CareerCategory;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(){

        $data = CareerCategory::orderBy('id','DESC')->get();
        return view("web.career",compact('data'));
    }
   
    public function store(Request $request){
        try {
        $inputs = $request->only(['name','email','phone','city','category_id','message']);
        $file = $request->file('resume');

        $data = $inputs;

        if ($request->file('resume')) {
            $image_file = time() . '.' . $request->file('resume')->extension();

            $path = $request->file('resume')->move(public_path('storage'), $image_file);
            $data['resume'] = $image_file;
         }

        //  return $request->all();

         $save = Career::create($data);

         if($save){
            return ['msg' => 'form submitted','data' => $save,'status' => true];
         }else{
            return ['msg' => 'failed to submit','status' => false];
         }
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage(),'status' => false];
        }
    }

    public function get($id){
        return "career form details";
    }
}
