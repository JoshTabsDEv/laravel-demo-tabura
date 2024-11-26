<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrelimTaburaController extends Controller
{
    public function index(){
        return view('prelim-joshua.operator');
    }

    public function addPage(){
        return view('prelim-joshua.addition',[
            'result'=> null
        ]);
    }
    public function subtractPage(){
        return view('prelim-joshua.subtraction',[
            'result'=> null
        ]);
    }
    public function multiplyPage(){
        return view('prelim-joshua.multiplication',[
            'result'=> null
        ]);
    }
    public function dividePage(){
        return view('prelim-joshua.division',[
            'result'=> null
        ]);
    }

    public function add(Request $request){
        $validatedData = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric'
        ]);

        $num1 = $validatedData['number1'];
        $num2 = $validatedData['number2'];

        $result = $num1 + $num2;

        if($result == 0){
            $result = '0';
        }
        

        return view('prelim-joshua.addition', [
            'result' => $result
        ]);
    }

    
    public function subtract(Request $request){
        $validatedData = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric'
        ]);

        $num1 = $validatedData['number1'];
        $num2 = $validatedData['number2'];

        $result = $num1 - $num2;

        if($result == 0){
            $result = '0';
        }

        return view('prelim-joshua.subtraction', [
            'result' => $result
        ]);
    }

    public function multiply(Request $request){
        $validatedData = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric'
        ]);

        $num1 = $validatedData['number1'];
        $num2 = $validatedData['number2'];

        $result = $num1 * $num2;

        if($result == 0){
            $result = '0';
        }

        return view('prelim-joshua.multiplication', [
            'result' => $result
        ]);
    }

    public function divide(Request $request){
        $validatedData = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric'
        ]);

        $num1 = $validatedData['number1'];
        $num2 = $validatedData['number2'];

        if($num2 == 0){
            $result = 'undefined';
        }else{
            $result = $num1 / $num2;
        }
       
        return view('prelim-joshua.division', [
            'result' => $result
        ]);
    }
}
