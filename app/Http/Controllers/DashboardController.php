<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\course;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use JD\Cloudder\Facades\Cloudder;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware(['auth', 'suspend', 'defaultPayment']);
    }

    public function index()
    {
        
        
        return view('dashboard.index');
        

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    // public function edit()
    // {
        
    //     return view('dashboard');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id) {
        // dd($request->file);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $request->user()->fill([
            'password' => Hash::make($request->input('password'))
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            Cloudder::upload($image);
            $upload = Cloudder::getResult();
            $image = $upload['url'];
            $user->image = $image;   
              
        }
        
        $user->save();
        return redirect('/dashboard')->with('success', 'Profile successfully updated');
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

    public function tasks(){
        $usercourse = Auth::user()->courses()->first();
        $tasks = Task::where('course_name', $usercourse['name'])->get();
        
       
        return view('dashboard.task')->with('tasks', $tasks)->with('usercourse',$usercourse);
    }
    public function task($id){
        $task = Task::find($id);
        return view('dashboard.show')->with('task',$task);
    }
    
}
