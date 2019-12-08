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
    
    //EntranceモデルとQuestionaryモデルを「１対１」で紐づける メソッド名は単数形　主テーブル側
    public function questionary()
    {
        // Questionaryモデルのデータを引っ張ってくる
        return $this->hasone('App\Questionary','entrance_id');
    }
}
    
    
    
    // public function hasone()
    // {
    //     return $this->hasOne('App\Questionary');
    // }

// class Questionary extends Model
// {
//     protected $guarded = array('id');
    
//     public static $rules = array(
//         'q1' => 'required',
//         'q2' => 'required',
//         'q3' => 'required'
//         );
// }