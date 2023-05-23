<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService{

    //Kurs valyuta
    const USD = 70;
    const EUR = 80;

    //Komissiya 
    const COMMISSION = 10;
    


    public static function checkOrder($id){
        $delete = Order::find($id);
        if($delete->summa <= 0){
            return $delete;
        }
        return false;
    }

    public static function snyatNalichku($id){
        $edit_summa = Order::find($id);
        if($edit_summa->summa > 0){
            return $edit_summa;
        }
        return false;
    }

    public static function convertSummu($currency, Order $convert){
       $convertSum = 0;
        switch($currency){
            case 'eur':
                $convertSum = $convert->summa / self::EUR;
                break;
            case 'usd':
                $convertSum = $convert->summa / self::USD;
                break;
            case 'rub':
                if($convert->currency == 'usd'){
                    $convertSum = $convert->summa * self::USD;
                }elseif($convert->currency == 'eur'){
                    $convertSum = $convert->summa * self::EUR;
                }
                break;
        }
        return $convertSum;
    }

    public static function perevodMony(Request $request, $schotId){
        $user = User::where('phone', $request->phone)->first();
        if(empty($user->phone)){
            return back()->withErrors('Na etom nomere bank ne zaregistrirovan');
        }
        try {
            DB::beginTransaction();
            $current = Order::where('id', $schotId)->where('user_id', Auth()->user()->id)->first();
            $userOrder = Order::where('user_id', $user->id)->first();
            $current->summa = $current->summa - $request->summa;
            if($user->bank != Auth()->user()->bank){
                $current->summa = $current->summa - self::COMMISSION;
            }
                switch($userOrder->currency){
                    case 'eur':
                        $userOrder->summa += $request->summa / self::EUR;
                        break;
                    case 'usd':
                        $userOrder->summa += $request->summa / self::USD;
                        break;
                    default:
                        $userOrder->summa += $request->summa;
                        break;
                }
            
            $current->save();
            $userOrder->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        
        
        
    }




}