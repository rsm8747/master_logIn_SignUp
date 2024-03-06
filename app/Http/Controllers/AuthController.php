<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function list()
{
    $data = Client::all();
    return view('list', ['data' => $data]);
}


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->withError('Login Details are not valid..');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::login($user)) {
            return redirect()->route('home');
        }

        return redirect()->route('register')->withError('Error');
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('');
    }

    public function create(Request $request)
    {
        $request->validate([
            // Define validation rules here
        ]);

        $client = new Client;
        $client->fill($request->all());
        $client->terms = $request->has('terms') ? 1 : 0;
        
        // Handle image upload
        if ($request->hasFile('image')) {
        
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/clients/', $filename);
            $client->image = $filename;
        }

        $client->save();
        return redirect()->back()->with('message','Profile Image Upload Successfully');
            //     $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        //     $request->file('image')->move(public_path('images'), $imageName);
        //     $client->image = $imageName;
        // }

        // $client->save();
        // $request->session()->flash('status', 'Profile Added Successfully...');
        // return redirect()->route('list');
    }

    public function viewUser($id)
    {
        $user = Client::findOrFail($id);
        return view('view', compact('user'));
    }

    public function edit($id)
{
    $data = Client::find($id);
    return view('edit', ['data' => $data]);
}


    public function update(Request $request, $id)
    {
        $request->validate([
            // Define validation rules here
        ]);

        $client = Client::find($id);
        $client->fill($request->all());
        $client->terms = $request->has('terms') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
            $client->image = $imageName;
        }

        $client->save();
        $request->session()->flash('status', 'Profile Updated Successfully...');
        return redirect()->route('list');
    }

    public function delete($id)
    {
        Client::find($id)->delete();
        session()->flash('status', 'Profile is deleted');
        return redirect()->route('list');
    }
}
