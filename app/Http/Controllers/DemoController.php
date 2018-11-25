<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class DemoController extends Controller
{
    public static $model = null;

    public function demoRequest() {
        return $this->response()->noContent();
    }
}
