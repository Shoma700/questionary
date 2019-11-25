<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionary extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'q1' => 'required',
        'q2' => 'required',
        'q3' => 'required'
        );
}


// <?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;

// //News はモデルである(継承)
// class News extends Model
// {
//     protected $guarded = array('id');
    
//     public static $rules = array(
//         'title' => 'required',
//         'body' => 'required',
//         );

    
//     //hasManyは1対多の関連付けを行う
//     //newsテーブル(モデル)1に対して、historiesテーブル(モデル)多の関連付け
//     public function histories()
//     {
//       return $this->hasMany('App\History');

//     }

// }
