<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changeUserPassword(Request $request,User $user){
        $request->validate([
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success','Password Update successfully');

        // dd($request->all() , $user);
    }
}
