<?php

// This class file to define all general functions

namespace App\Helpers;

use App;
use Illuminate\Support\Str;
use Auth;


class Helper {

   static function is_permission(){

        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return true;
            }
        }

        return false;
    }

}


//execute= file_attach();
// function file_attach($file_attach){

// include($file_attach.'.php');

// }