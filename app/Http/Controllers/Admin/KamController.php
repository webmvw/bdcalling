<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use File;

class KamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
    	$allData = User::where('role_id', '2')->orderBy('id', 'desc')->get();
    	return view('admin.pages.kam.view-kam', compact('allData'));
    }


	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function add(){
        $data['department'] = Department::all();
        $data['designation'] = Designation::all();
    	return view('admin.pages.kam.add-kam', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // start generate kam id number
        $kam = User::where('role_id', '2')->orderBy('id','desc')->get()->count();
        if($kam == 0){
            $firstReg = 0;
            $kamId = $firstReg+1;
            if($kamId<10){
                $id_no = '000'.$kamId;
            }elseif($kamId<100){
                $id_no = '00'.$kamId;
            }elseif ($kamId<1000) {
                $id_no = '0'.$kamId;
            }
        }else{
            $kam = User::where('role_id', '2')->orderBy('id','desc')->first()->id;
            $kamId = $kam+1;
            if($kamId<10){
                $id_no = '000'.$kamId;
            }elseif($kamId<100){
                $id_no = '00'.$kamId;
            }elseif ($kamId<1000) {
                $id_no = '0'.$kamId;
            }
        }
        $id_code = rand(0000, 9999);
        $final_id_no = $id_code.$id_no;
        // end generate kam id number

        // start insert kam data in user model
        $user = new User;
        $code = rand(0000, 9999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($code);
        $user->mobile = $request->phone;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->id_no = $final_id_no;
        $user->code = $code;
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->role_id = '2';
        $user->status = '1';
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('img/kam/',$filename);
            $user->image = $filename;
        }
        $user->save();
        // end insert student data in user model

        return redirect()->route('kam.view')->with('success', 'Kam Registration Successfully!!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$data['getKem'] = User::find($id);
        $data['department'] = Department::all();
        $data['designation'] = Designation::all();
        return view('admin.pages.kam.edit-kam', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    	$user = User::find($id);
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->phone;
        $user->department_id = $request->department;
        $user->designation_id = $request->designation;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        if($request->hasfile('image')){
        	if(File::exists('img/kam/'.$user->image)){
                File::delete('img/kam/'.$user->image);
            }
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('img/kam/',$filename);
            $user->image = $filename;
        }
        $user->save();
    	return redirect()->route('kam.view')->with('success', 'Kam Updated Success');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
    	$user = User::find($id);
    	if(File::exists('img/kam/'.$user->image)){
            File::delete('img/kam/'.$user->image);
        }
    	$user->delete();
    	return redirect()->route('kam.view')->with('success', 'Kam Deleted Success');
    }



}
