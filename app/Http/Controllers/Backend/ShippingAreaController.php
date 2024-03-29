<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivison;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function AllDivison(){
        $divison = ShipDivison::latest()->get();
        return view('backend.ship.divison.divison_all',compact('divison'));
    }//End Method

    public function AddDivison(){
        return view('backend.ship.divison.divison_add');
    }//End Method

    public function StoreDivision(Request $request){
      
        ShipDivison::insert([
            'division_name' => $request->division_name,
        ]);
        $notification = array (
            'message' => 'Divison Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.divison')->with($notification);
    }//End Method 

    public function EditDivision($id){
        $divison = ShipDivison::findOrFail($id);
        return view('backend.ship.divison.divison_edit',compact('divison'));

    }//end method

    public function UpdateDivision(Request $request){

        $divison_id = $request->id;
        ShipDivison::findOrFail($divison_id)->update([
            'division_name' => $request->division_name,
        ]);
        $notification = array (
            'message' => 'Divison Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.divison')->with($notification);
    }//End Method 

    public function DeleteDivision($id){
        ShipDivison::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Divison Deleted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);

    }//End Method


    //////////////////////////////// District 

    public function AllDistrict(){
        $district = ShipDistricts::latest()->get();
        return view('backend.ship.district.district_all',compact('district'));
    }//End Method

    public function AddDistrict(){
        $divison = ShipDivison::orderBy('division_name','ASC')->get();
        return view('backend.ship.district.district_add',compact('divison'));
    }//End Method

    public function StoreDistrict(Request $request){
      
        ShipDistricts::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);
        $notification = array (
            'message' => 'District Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.district')->with($notification);
    }//End Method 

    public function EditDistrict($id){
        $divison = ShipDivison::orderBy('division_name','ASC')->get();
        $district = ShipDistricts::findOrFail($id);
        return view('backend.ship.district.district_edit',compact('divison','district'));

    }//end method

    public function UpdateDistrict(Request $request){

        $district_id = $request->id;
        ShipDistricts::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);
        $notification = array (
            'message' => 'District Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.district')->with($notification);
    }//End Method 

    public function DeleteDistrict($id){
        ShipDistricts::findOrFail($id)->delete();

        $notification = array (
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);

    }//End Method


    //////////////////////////////// State 

    public function AllState(){
        $state = ShipState::latest()->get();
        return view('backend.ship.state.state_all',compact('state'));
    }//End Method

    public function AddState(){
        $divison = ShipDivison::orderBy('division_name','ASC')->get();
        $district = ShipDistricts::orderBy('district_name','ASC')->get();
        return view('backend.ship.state.state_add',compact('divison','district'));
    }//End Method

    public function GetDistrict($division_id){
        $district = ShipDistricts::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
         return json_encode($district);
 
     }//End Method

     public function StoreState(Request $request){
      
        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
        ]);
        $notification = array (
            'message' => 'State Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.state')->with($notification);
    }//End Method 

    public function EditState($id){
        $divison = ShipDivison::orderBy('division_name','ASC')->get();
        $district = ShipDistricts::orderBy('district_name','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.ship.state.state_edit',compact('divison','district','state'));

    }//end method

    public function UpdateState(Request $request){

        $state_id = $request->id;
        ShipState::findOrFail($state_id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
        ]);
        $notification = array (
            'message' => 'State Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.state')->with($notification);
    }//End Method 


    public function DeleteState($id){
        ShipState::findOrFail($id)->delete();

        $notification = array (
            'message' => 'State Deleted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);

    }//End Method
}
