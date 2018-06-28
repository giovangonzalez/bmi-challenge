<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get authenticated user data
        $user = Auth::user();
        
        //Define each value
        $weight = $user->weight;
        $height = $user->height / 100; //We need the value in meters
        $height2 = bcpow($height,2,2);
        
        //We calculate the bmi
        $bmi =number_format( $weight / ($height2), 2, '.', '');;
        
        //We calculate the category
        
        if($bmi < 15)
        {
            $category = "Very severely underweight";
            
        }   
        
        if( $this->inRange($bmi,15,16) )
        {
            $category = "Severely underweight";
            
        }
        
        if( $this->inRange($bmi,16,18.5) )
        {
            $category = "Underweight";
            
        }
        
        if( $this->inRange($bmi,18.5,25) )
        {
            $category = "Normal (healthy weight)	";
            
        }
        
        if( $this->inRange($bmi,25,30) )
        {
            $category = "Overweight";
            
        }
        
        if( $this->inRange($bmi,30,35) )
        {
            $category = "Obese Class I (Moderately obese)	";
            
        }
        
        if( $this->inRange($bmi,35,40) )
        {
            $category = "Obese Class II (Severely obese)	";
            
        }
        
        if( $this->inRange($bmi,40,45) )
        {
            $category = "Obese Class III (Very severely obese)	";
            
        }
        
        if( $this->inRange($bmi,45,50) )
        {
            $category = "Obese Class IV (Morbidly Obese)	";
            
        }
        
        if( $this->inRange($bmi,50,60) )
        {
            $category = "Obese Class V (Super Obese)	";
            
        }
        
        if( $bmi > 60 )
        {
            $category = "Obese Class VI (Hyper Obese)	";
            
        }
        
        
        return view('home', ['user' => $user, 'bmi' => $bmi, 'category' => $category]);
    }
    
    /**
     * Determines if $number is between $min and $max inclusive
     *
     * @param  integer  $number     The number to test
     * @param  integer  $min        The minimum value in the range
     * @param  integer  $max        The maximum value in the range
     * @return boolean              Whether the number was in the range
     */
    public function inRange($number, $min, $max) 
    {
        //Verify if is greater than min
        if( bccomp($number,$min) == -1 ) return false;
        
        //Verify if is lesser than max
        if( bccomp($number,$max) == 1 ) return false;
        
        return true;
    }
}
