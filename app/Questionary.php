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
    
    static function csv_export()
    {
    $headers = array(
      "Content-type" => "text/csv",
      "Content-Disposition" => "attachment; filename=file.csv",
      "Pragma" => "no-cache",
      "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
      "Expires" => "0"
    );
    $callback = function() {
      $handle = fopen('php://output', 'w');
      $columns = [
        'q1',
        'q2',
        'q3',
      ] ;
      mb_convert_variables('SJIS-win', 'UTF-8', $columns);
      fputcsv($handle, $columns);
      $qs = Questionary::all();
      foreach ($qs as $q) {
        $csv = [
          $q->q1,
          $q->q2,
          $q->q3,
        ] ;
        mb_convert_variables('SJIS-win', 'UTF-8', $csv);
        fputcsv($handle, $csv);
      }
      fclose($handle);
    };
    return [$callback,$headers];
    }

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
