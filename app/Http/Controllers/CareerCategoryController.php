<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\CareerCategory;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CareerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CareerCategory::orderBy('id','DESC')->simplePaginate(20);

        return view('career.category.index',compact('data'));
    }

    public function careers(){
        $data = Career::orderBy('id','DESC')->simplePaginate(40);

        return view('career.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('career.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = CareerCategory::create($request->only(['category_name','job_type','location']));

        if($data){
            return redirect(route('career.category'))->with('success','Data inserted successfuly');
        }else{
            return redirect()->back()->with('error','Data inserted successfuly');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CareerCategory::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = CareerCategory::find($id);

        return view('career.category.show',compact('data'));
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
        $data = CareerCategory::find($id)->update($request->only('category_name','job_type','location'));
        
        if($data){
            return redirect(route('career.category'))->with('success','Data updated successfuly');
        }else{
            return redirect()->back()->with('error','Data failed to update');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CareerCategory::find($id)->delete();

        if(CareerCategory::find($id)->delete()){
            return redirect(route('career.category'))->with('success','Data deleted successfuly');
        }else{
            return redirect()->back()->with('error','Data failed to delete');
        }
    }
}
