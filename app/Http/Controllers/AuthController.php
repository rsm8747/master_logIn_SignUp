<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('auth.login');
    }
    function list()
    {
        return Client::all();
        return view('list');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        //login code.
        if (\Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        return redirect('login')->withError('Login Details are not valid..');
    }
    public function register_view()
    {
        //
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'

        ]);
        // save in users table
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);
        // login user here
        if (\Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        return redirect('register')->withError('Error');

    }
    public function home()
    {
        return view('home');
    }
    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     function create(Request $request)
     {
         $client = new Client;
         $client->title = $request->input('salute'); 
         $client->name = $request->input('name');
         $client->email = $request->input('email');
         $client->address = $request->input('address');
         $client->gender = $request->input('gender');
         $client->terms = $request->has('terms') ? 1 : 0; 
         $client->image = $request->input('image');
         $client->save();
         $request->session()->flash('status','Profile Added Successfully...');
         return redirect('list');
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
    public function edit($id)
{
    $data = Client::find($id);
    return view('edit', ['data' => $data]);
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
    $client = Client::find($id);
    $client->title = $request->input('salute');
    $client->name = $request->input('name');
    $client->email = $request->input('email');
    $client->address = $request->input('address');
    $client->gender = $request->input('gender');
    $client->terms = $request->has('terms') ? 1 : 0;
    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $client->image = $imageName;
    }
    $client->save();
    $request->session()->flash('status', 'Profile Updated Successfully...');
    return redirect('list');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
{
    Client::find($id)->delete();
    \Session::flash('status', 'Profile is deleted');
    return redirect('list');
}

}
