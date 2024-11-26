<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountCalculatorController extends Controller
{
    public function index(){
        return view('discount-calculator.calculator',[
            'newPrice' => null,
            'error' => null,

        ]);
    }

    public function compute(Request $request){
       $price = $request->validate([
        'price' => 'required|numeric'
       ]);
       $senior = $request->input('senior');
       $student = $request->input('student');
        // dd($request->all());
       if($student && !$senior){

        $discount = $price['price'] * 20/100;
        $discount_price = $price['price'] - $discount;

        return view('discount-calculator.calculator' , 
        [
            'newPrice' => $discount_price,
            'discount' => '20%',
            'input' => $price['price'],
            'type'=> 'Student',
        ]);
            
       }elseif($senior && !$student){
        
        $discount = $price['price'] * 50/100;
        $discount_price = $price['price'] - $discount;
        return view('discount-calculator.calculator' , 
        [
            'newPrice' => $discount_price,
            'input' => $price['price'],
            'discount' => '50%',
            'type'=> 'Senior Citizen' 
        ]);

       }elseif($senior && $student){
        return view('discount-calculator.calculator' , 
        [
            'newPrice' => 'Cannot Choose Both',
            'input' => $price['price'],
            'discount' => '',
            'type'=> '' 
        ]);
       }else{
        return view('discount-calculator.calculator' , 
        [
            'newPrice' => 'No selected',
            'input' => $price['price'],
            'discount' => '',
            'type'=> '' 
        ]);
       }
    }
}
