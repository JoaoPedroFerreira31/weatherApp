<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use \Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->get();

        return new UserCollection($users);
    }

    /**
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\User $user
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request, User $user)
    {
        return new UserResource($user);
    }

}
