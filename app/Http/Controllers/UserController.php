<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\PostUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return response()->json($user,200);
    }

    public function destroy($id)
    {
        
        $auth = auth()->user();
        if($auth->type !== User::TYPE_DOCTOR)
        {
            return response()->json(["message"=> "Unauthenticated."],401);
        }
        $user = User::find($id);
        $user->delete();
        return response()->json($user,204);
    }

    public function find($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user,200);

    }
    
    public function update(UpdateUserRequest $request )
    {
        $user = auth()->user();
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->date_de_naissance = $request->date;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password);
        $user->save();

        return response()->json($user,200);
    }

    

    public function store(PostUserRequest $request)
    {
        $user = new User();
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->date_de_naissance = $request->date;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json($user,200);
    }
}
