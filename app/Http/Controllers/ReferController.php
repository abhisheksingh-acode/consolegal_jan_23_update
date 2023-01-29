<?php

namespace App\Http\Controllers;

use App\Models\Refer;
use Illuminate\Http\Request;

class ReferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Refer::first();

        return view('refer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('refer.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->id){
            $save = Refer::find($request->id)->update($request->only(['amount']));
        }else{
            $save = Refer::create([
                'name' => 'refer',
                'amount' => $request->amount,
                'method' => 'flat',
                'status' => 1
            ]);
        }

        if($save){
            return redirect()->back()->with('success','data saved successfuly');
        }else{
            return redirect()->back()->with('error','data failed to save');
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
        // show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $save = Refer::find($id)->update($request->only(['amount']));

        if($save){
            return redirect()->back()->with('success','data updated successfuly');
        }else{
            return redirect()->back()->with('error','data failed to update');
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
        //
    }
}
