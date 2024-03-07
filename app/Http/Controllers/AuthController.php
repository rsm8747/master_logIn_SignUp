<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserRequest;



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
    public function registerView()
    {
        return view('auth.register');
    }
    public function register(StoreUserRequest $request)
    {
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
        return redirect()->route('logout');
    }
    public function create(UserRequest $request)
    {
        $client = new Client;
        $client->fill($request->all());
        $client->terms = $request->has('terms') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $client->image = $imageName;
            var_dump($request->file('images'));
        }
        $client->save();
        $request->session()->flash('status', 'Profile Added Successfully...');
        return redirect()->route('list');
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
    public function update(UserRequest $request, $id)
    {
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
        session()->flash('status', 'Profile is Deleted');
        return redirect()->route('list');
    }
    public function advance(Request $request)
    {
        $query = Client::query();
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('email', 'LIKE', '%' . $request->name . '%')
                ->orWhere('address', 'LIKE', '%' . $request->name . '%')
                ->orWhere('gender', 'LIKE', '%' . $request->name . '%')
                ->orWhere('salute', 'LIKE', '%' . $request->name . '%');
        }
        $data = $query->paginate(5);
        if ($data->isEmpty()) {
            $request->session()->flash('status', 'Not Available');
        }
        return view('list', compact('data'));
    }

}
