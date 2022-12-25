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
            $countTransactions = DB::selectOne("SELECT count(*) as count from transactions");
        } else {
            $countTransactions = DB::selectOne("SELECT count(*) as count from transactions WHERE user_id = $user->id AND deleted_at IS NULL");
        }
        
        $countElectronics = DB::selectOne("SELECT count(*) as count from electronics WHERE deleted_at IS NULL");
        
        // if($countTransactions) {
        //     $countTransactions = $countTransactions[0]->count;
        // } else {
        //     $countTransactions = 0;
        // }

        // if($countElectronics) {
        //     $countElectronics = $countElectronics[0]->count;
        // } else {
        //     $countElectronics = 0;
        // }

        return view("layouts.default")->with([
            'user' => $user,
            'countTransactions' => 0,
            'countElectronics' => 0
        ]);
    }
}
