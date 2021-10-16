<?php
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;

function changeDateFormate($date, $date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}


if (!function_exists('get_user')) {
    function get_user()
    {
        $users = DB::table('users')
                ->get();
        return $users; 
    }
}

function tets(){
    $users = DB::table('users')
                ->get();
    return $users;    
}
   
function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}