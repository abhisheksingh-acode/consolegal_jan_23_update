<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use Illuminate\Http\Request;

class KycController extends Controller
{
    public function create(Request $req)
    {

        $req->validate([
            "user_type" => 'required',
            "user_id" => 'required',
            "pan"     => 'required',
            "aadhaar" => 'required',
            "photo"   => 'required'
        ]);

        $create = new Kyc;

        $create->user_type = $req->user_type;
        $create->user_id = $req->user_id;

        $pan = $req->file('pan');
        $aadhaar = $req->file('aadhaar');
        $photo = $req->file('photo');

        $pan_name = time() . '_kyc.' . $pan->extension();
        $aadhaar_name = time() . '_kyc.' . $aadhaar->extension();
        $photo_name = time() . '_kyc.' . $photo->extension();

        $pan->move(public_path('storage'), $pan_name);
        $aadhaar->move(public_path('storage'), $aadhaar_name);
        $photo->move(public_path('storage'), $photo_name);

        $create->pan = $pan_name;
        $create->aadhaar = $aadhaar_name;
        $create->photo = $photo_name;

        if ($req->other_label) {
            $other_doc = $req->file('other_doc');
            $other_doc_name = time() . '_kyc.' . $other_doc->extension();
            $create->other_label = $req->other_label;
            $create->other_doc = $other_doc_name;
        }

        $create->save();

        return redirect()->back()->with('success','Kyc Uploaded Successfuly');
    }

    public function update($id, Request $req)
    {
        $create = Kyc::find($id);

        // $create->user_type = $req->user_type;
        // $create->user_id = $req->user_id;


        if ($req->hasfile('pan')) {
            $pan = $req->file('pan');
            $pan_name = time() . '_kyc.' . $pan->extension();
            $pan->move(public_path('storage'), $pan_name);
            $create->pan = $pan_name;
        }

        if ($req->hasfile('aadhaar')) {
            $aadhaar = $req->file('aadhaar');
            $aadhaar_name = time() . '_kyc.' . $aadhaar->extension();
            $aadhaar->move(public_path('storage'), $aadhaar_name);
            $create->aadhaar = $aadhaar_name;
        }

        if ($req->hasfile('photo')) {
            $photo = $req->file('photo');
            $photo_name = time() . '_kyc.' . $photo->extension();
            $photo->move(public_path('storage'), $photo_name);
            $create->photo = $photo_name;
        }

        if ($req->other_label) {
            $create->other_label = $req->other_label;
        }

        if ($req->hasfile('other_doc')) {
            $other_doc = $req->file('other_doc');
            $other_doc_name = time() . '_kyc.' . $other_doc->extension();
            $other_doc->move(public_path('storage'), $other_doc_name);
            $create->other_doc = $other_doc_name;
        }

        $create->save();

        return redirect()->back()->with('success','Kyc Updated Successfuly');
    }


    public function show($id){
        $create = Kyc::where($id);
        return $create;
    }
}
