<?php

namespace App\Http\Controllers;

use App\Http\Services\OrderService;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class AccauntController extends Controller
{
    public function index(){
        $userID = User::find(Auth()->user()->id)->order()->get();
        return view('accaunt', ['userID' => $userID]);
    }

    public function show($id){
        $user_schot = User::find($id)->order()->get();
        return view('schot', ['user_id' => $user_schot, 'id' => $id]);
        
    }

    public function create(){
        return view('schot');
    }

    public function add(Request $request){
        if(!Auth::user()->id){
            Auth::logout();
            Session::flush();
            return redirect('/');
        }
        Order::create(['user_id' => Auth()->user()->id, 'summa' => $request->summa, 'currency'=>$request->currency]);
        return redirect()->route('accaunt');

    }

    public function edit($id){
        $snyat_summa = OrderService::snyatNalichku($id);
        if(!$snyat_summa){
            return back()->withErrors('ne dostatochno sredsvo');
        }
        return view('snyat_schot', ['snyat_summa' => $snyat_summa]);
    }

    public function reStore($id, Request $request){
        $save = Order::find($id);
        if($request->summa <= $save->summa){
            $result = $save->summa - $request->summa;
            $save->summa = $result;
            $save->save();
            return redirect()->route('accaunt');
        }
        return back()->withErrors('ne dostatochno sredstvo');
    }

    public function editSchot($id){
        $edit_sum = Order::find($id);
        return view('popolnit_schot', ['schot' => $edit_sum]);
    }

    public function popolnitSchot($id,Request $request){
        $save = Order::find($id);
        $result = $save->summa + $request->summa;
        $save->summa = $result;
        $save->save();
        return redirect()->route('accaunt');
    }

    public function destroy($id){
        $delete = OrderService::checkOrder($id);
        if(!$delete){
            return back()->withErrors('schot ne pustoy');
        }
        $delete->delete();
        return redirect()->route('accaunt');
    }

    public function convert($id, Request $request){
        $convert = Order::find($id);
        $result = OrderService::convertSummu($request->currency, $convert);
        $convert->summa = $result;
        $convert->currency = $request->currency;
        $convert->save();
        return redirect()->route('accaunt');
    }

    public function convertForm($id){
        $convertSchot = Order::find($id);
        return view('convert_schot', ['convert' => $convertSchot]);
    }

    public function schotUser(){
        $userID = User::find(Auth()->user()->id)->order()->get();
        return view('schoti', ['userID' => $userID]);
    }

    public function perevod($id){
        return view('perevod', ['schot_id' => $id]);
    }

    public function actionToOrder(Request $request){
        $orderAction = $request->orderAction;
        return $this->$orderAction($request->order);
        
    }

    public function perevodSum(Request $request, $id){
        try {
            OrderService::perevodMony($request, $id);
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
       
       return redirect()->route('accaunt');

    }

}
