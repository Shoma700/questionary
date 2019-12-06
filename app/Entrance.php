<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrance extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'n2' => 'required',
        'n3' => 'required'
    );
    
    // public function hasone()
    // {
    //     return $this->hasOne('App\Questionary');
    // }
}
// class Questionary extends Model
// {
//     protected $guarded = array('id');
    
//     public static $rules = array(
//         'q1' => 'required',
//         'q2' => 'required',
//         'q3' => 'required'
//         );
// }