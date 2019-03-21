<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class InfoController extends Controller
{
    public function info(Request $request)
    {
        return response()->json($request->user());
    }
}