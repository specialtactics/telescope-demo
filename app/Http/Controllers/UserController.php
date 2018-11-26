<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static $model = User::class;

    public function post(Request $request)
    {
        $user = parent::post($request);

        // Fire off enw user event
        event(new UserCreated($user));

        return $this->response->item($user, $this->getTransformer())->setStatusCode(201);
    }
}
