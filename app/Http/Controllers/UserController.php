<?php

namespace App\Http\Controllers;

use App\Quotation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image'));
        $filename = $request->image->getClientOriginalName();
        if (auth()->user()->avatar){
            Storage::delete('/public/images/' . auth()->user()->avatar);

        }

        $request->image->storeAs('images', $filename, 'public');
        auth()->user()->update(['avatar' => $filename]);
        $request->session()->flash('message', 'Image uploaded.');
        return redirect()->back();
    }

    public function index()
    {
        // DB::insert('insert into users(name,email,password)
        
        // values(?,?,?)', [
        //     'danielgo', 'danielsk1@gmail.com', 'password',
        //     ]);
        
        // $users = DB ::select('select * from users');
        // return $users;
        //  $user = new User();
        // // dd($user);
        // $user->name='filip';
        // $user->email='filipgosev@gmail.com';
        // $user->password='filip123';
        // $user ->save();



        $user = User::all();
        return $user;
        

       // User::where('id=2')->delete();
        return view ('home');
    }
}
