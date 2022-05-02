<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mobile;
use Hash;
use Session;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    public function profile($id)
    {
        $user = User::where('id','=',$id)->first();
        return View('users.profile')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'first_name' => 'required|max:225',
            'last_name' => 'required|max:225',
            'username' => 'required|max:225|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:6',
            'phone_number' => 'required|max:12',
            'dob' => 'required|date',  
            'terms' => 'required',
        ]);

        $newUser = new User;
        $newUser->first_name = $validatedData['first_name'];
        $newUser->last_name = $validatedData['last_name'];
        $newUser->username = $validatedData['username'];
        $newUser->email = $validatedData['email'];
        $newUser->password = Hash::make($validatedData['password']);
        $newUser->dob = $validatedData['dob'];
        $newUser->save();

        $newMobile = new Mobile;
        $newMobile->phone_number = $validatedData['phone_number'];
        $newUser->mobile()->save($newMobile);

        if($newUser){
            $request->session()->put('user_id',$newUser->id);
            return redirect('/posts/index/getUserDetails')->with('success', 'Welcome New Paw Friend!');
            Session::flash('messsage', 'Welcome New Paw Friend!');
        }else{
            return back()->with('fail','Something Wrong!');
        }
        session()->flash('messsage', 'Welcome New Paw Friend!');

        //return redirect()->to('/posts/index');

        //dd($request['first_name']);
        //return "Passed Validation";
    }

    public function userLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('user_id',$user->id);
                return redirect('/posts/index/getUserDetails')->withSuccess('success', 'Welcome Back Paw Friend!');
            }else{
                return back()->with('fail', 'Your Username or Password is Incorrect!');
            }
        }else{
            return back()->with('fail', 'Your Username or Password is Incorrect!');

        }
        //dd($request['email']);
    
    }
    public function getUserDetails(){
        $user= array();
        if(Session::has('user_id')){
            $user = User::where('id','=',Session::get('user_id'))->first();
            if($user->is_admin==0){
                return redirect('/posts/index')->with(['user'=>$user]);
            }else{
                return View('users.admin', ['user'=> $user]);
            }
        }
            
    }


    public function profileUpdate(Request $request)
    {
        
        if($request->hasFile('user_image')){
    		$user_image = $request->file('user_image');
    		$filename = time() . '.' . $user_image->getClientOriginalExtension();
    		Image::make($user_image)->resize(300, 300)->save( public_path('prof/' . $filename ) );


            $user = User::find($request->id);
            $user->user_image = $filename;
            $user->save();
            return redirect('/posts/index/getUserDetails');
    		
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
        //
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
        //
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
