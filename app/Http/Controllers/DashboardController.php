<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   

    public function index() {

        $user = Auth::user();
        
        if($user->isAdmin) {
            $countTransactions = DB::selectOne("SELECT count(*) from transactions");
        } else {
            $countTransactions = DB::selectOne("SELECT count(*) from transactions WHERE user_id = $user->id AND deleted_at IS NULL");
        }
        
        $countElectronics = DB::selectOne("SELECT count(*) from electronics WHERE deleted_at IS NULL");
        
        return view("layouts.default")->with([
            'user' => $user,
            'countTransactions' => $countTransactions->count,
            'countElectronics' => $countElectronics->count
        ]);
    }
}
