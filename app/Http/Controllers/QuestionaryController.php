<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Questionary;
use App\Entrance;

class QuestionaryController extends Controller
{
    //front
    public function explanation()
    {
        //configフォルダ直下にあるjapan_area.phpの情報(配列)を取得し、変数に格納する
        $japan_area = config('japan_area');
        //変数をviewに配列の形で渡す（これは作法）
        //dd($japan_area);
        $store = config('store');
        //dd($store);
        
        return view('questionary.explanation', ['japan_area' => $japan_area, 'store' => $store]);
    }
    
    public function next1()
    {
        return view('questionary.questionary');
    }
    
    public function next2()
    {
        return view('questionary.thanks');
    }
    
    public function post1(Request $request)
    {
        //dd($request);
        $this->validate($request, Entrance::$rules);
        $entrance = new Entrance;
        $form =$request->all();
        unset($form['_token']);
        $entrance->fill($form);
        $entrance->save();
        return view('questionary.questionary');
    }
    
    public function post(Request $request)
    {
        //バリデーションでエラーがあると、＄errorsにエラー内容を格納して、全画面に自動でリダイレクトする
        //エラーがなければ通過する
        $this->validate($request, Questionary::$rules);
        $questionary = new Questionary;
        $form = $request->all();
        //dump($request);
        //dump($form);
        unset($form['_token']);
        //dump($form);
        $questionary->fill($form);
        $questionary->save();
        return view('questionary.thanks');
    }
        

    public function next3()
    {
        return view('questionary.coupon');
    }
    
    
    
    
    //admin
    public function index(Request $request)
    {
        //csv();
        //Questionaryモデルで操作する、questionariesテーブルに格納されているすべてのレコードを
        //変数$listsに格納する
        //$lists = Questionary::all(); ["*"], 'userpage'
        $lists = Questionary::paginate(5, ["*"], 'lists')
                ->appends(["e_lists" => $request->input('e_lists'), "a" => 3]);
        //$e_lists = Entrance::all();
        $e_lists = Entrance::paginate(5, ["*"], 'e_lists')
                ->appends(["lists" => $request->input('lists'), "a" => 3]);
        return view('admin.top', ['lists' => $lists, 'e_lists' => $e_lists]);
    }
    
    public function extraction(Request $request)
    {
        return view('admin.extraction');
    }



    public function csv(Request $request)
    {
        $callbacks = Questionary::csv_export();
        return response()->stream($callbacks[0], 200, $callbacks[1]);
        //return redirect('admin/extraction/');
    }

        //↑↑↑
    // public function csv(Request $request)
    // {
    // $headers = array(
    //   "Content-type" => "text/csv",
    //   "Content-Disposition" => "attachment; filename=file.csv",
    //   "Pragma" => "no-cache",
    //   "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
    //   "Expires" => "0"
    // );
    // $callback = function() {
    //   $handle = fopen('php://output', 'w');
    //   $columns = [
    //     'q1',
    //     'q2',
    //     'q3',
    //   ] ;
    //   mb_convert_variables('SJIS-win', 'UTF-8', $columns);
    //   fputcsv($handle, $columns);
    //   $users = Questionary::all();
    //   foreach ($users as $user) {
    //     $csv = [
    //       $user->q1,
    //       $user->q2,
    //       $user->q3,
    //     ] ;
    //     mb_convert_variables('SJIS-win', 'UTF-8', $csv);
    //     fputcsv($handle, $csv);
    //   }
    //   fclose($handle);
    // };
    // return response()->stream($callback, 200, $headers);
    // return redirect('admin/extraction/');
    // }
    
    
}



// 【参考】front NewsController.php--------------------
// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\News;

// class NewsController extends Controller
// {
//     public function index(Request $request)
//     {
//         $posts = News::all()->sortByDesc('updated_at');
//         if (count($posts) > 0)
//         {
//             $headline = $posts->shift();
//         }else{
//             $headline = null;
//         }
//         //news/index.blade.php ファイルを渡している
//         //またViewｒテンプレートにheadline、postsという変数を渡している
//         return view('news.index',['headline' => $headline, 'posts' => $posts]);
//     }
// }



// 【参考】frint ProfileController.php--------------------
// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Profile;

// class ProfileController extends Controller
// {

    
//     public function index(Request $request)
//     {
//             $posts = Profile::all();
//                 //  dd($posts[0]->toArray());
//         return view('profile.index', ['posts' => $posts]);  
//     }
// }



// 【参考】admin NewsController.php--------------------
// <?php

// namespace App\Http\Controllers\Admin;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

// use App\News;
// use App\History;
// use Carbon\Carbon;

// class NewsController extends Controller
// {
//     public function add()
//     {
//         return view('admin.news.create');
//     }
    
//     public function create(Request $request)
//     {
//         //dd($request);
//         //13章_Varidationを行う
//         $this->validate($request, News::$rules);
//         $news = new News;
//         $form = $request->all();
//         //フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
//         if (isset($form['image'])) {
//             $path = $request->file('image')->store('public/image');
//             $news->image_path = basename($path);
//         } else {
//             $news->image_path = null;
//         }
//         //フォームから送信されてきた_tokenを削除する
//         unset($form['_token']);
//         //フォームから送信されてきたimageを削除する
//         unset($form['image']);
//         //データベースに保存する
//         $news->fill($form);
//         $news->save();
//         //admin/news/createにリダイレクトする
//         return redirect('admin/news/create');
//     }
    
//     public function index(Request $request)
//     {
//         $cond_title = $request->cond_title;
//         if ($cond_title != '') {
//             //検索されたら検索結果を取得する
//             $posts = News::where('title', $cond_title)->get();
//         } else {
//             //それ以外はすべてニュースを取得する
//             $posts = News::all();
//         }
//         return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
//     }
    
//     public function edit(Request $request)
//     {
//         // News Modelからデータを取得する
//         $news = News::find($request->id);
//         //dd($news);
//         if (empty($news)) {
//         abort(404);    
//         }
        

//         return view('admin.news.edit', ['news_form' => $news]);
//     }
    
//     public function update(Request $request)
//     {
//         // Validationをかける
//         $this->validate($request, News::$rules);
//         // News Modelからデータを取得する
//         // dump($request);
//         $news = News::find($request->id);
//         // dump($news);
//         // 送信されてきたフォームデータを格納する
//         $news_form = $request->all();
//         // dump($news_form);
//         if (isset($news_form['image'])) {
//         $path = $request->file('image')->store('public/image');
//         $news->image_path = basename($path);
//         unset($news_form['image']);
//         } elseif (isset($request->remove)) {
//         $news->image_path = null;
//         unset($news_form['remove']);
//         }
//         unset($news_form['_token']);
//         // 該当するデータを上書きして保存する
//         $news->fill($news_form)->save();
        
        
//         //17章追記
//         $history = new History;
//         $history->news_id = $news->id;
//         $history->edited_at = Carbon::now();
//         $history->save();
        
//         return redirect('admin/news/');
//     }
    
    
//     public function delete(Request $request)
//     {
//         // 該当するNews Modelを取得
//         $news = News::find($request->id);
//         // 削除する
//         $news -> delete();
//         return redirect('admin/news/');
//         }
// }



// 【参考】admin ProfileController.php--------------------
// <?php

// namespace App\Http\Controllers\Admin;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

// use App\Profile;
// use App\Profile_history;
// use Carbon\Carbon;

// class ProfileController extends Controller
// {
//     public function add()
//     {
//       return view('admin.profile.create');
//     }

//     public function create(Request $request)
//     {
//         //varidate関数を使用して、&requestの中の情報にProfileモデルの$rulesに当てはまるものがあれば適用する
//         $this->validate($request, Profile::$rules);
//         //$profilesという変数をProfileモデルの新規レコードとする
//         $profile = new Profile;
//         //$formという変数に$requestのすべてを代入する（'name','gender','hobby','introduction','_token'）
//         $form = $request->all();
//         //dump($request);
//         //dump($form);        
//         //送信されてきた$form内の'_token'を削除する
//         unset($form['_token']);
//         //データベースに保存する
//         $profile->fill($form);
//         $profile->save();
//         //dump($form);     
//         return redirect('admin/profile/create');
//     }
    
//     public function index(Request $request)
//     {
//         $cond_name = $request->cond_name;
//         if ($cond_name != '') {
//             //検索されたら検索結果を取得する
//             $posts = Profile::where('name', $cond_name)->get();
//         } else {
//             //それ以外はすべてニュースを取得する
//             $posts = Profile::all();
//         }
//         return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
//     }

//     public function edit(Request $request)
//     {
//         // Profile Modelからデータを取得する
//         $profile = Profile::find($request->id);
//         //dump($profiles);
//         if (empty($profile)) {
//         abort(404);    
//         }
        
//         //ページネーション
//         $pg = Profile_history::paginate(4);
//         //ページネーション'pg' => $pgの部分を追加
//         return view('admin.profile.edit', ['profile_form' => $profile,'pg' => $pg]);
        
        
//     }
    
//     public function update(Request $request)
//     {
//         // Validationをかける
//         $this->validate($request, Profile::$rules);
//         // News Modelからデータを取得する
//         $profile = Profile::find($request->id);
//         //$aaa = 5;
//         // 送信されてきたフォームデータを格納する
//         $profile_form = $request->all();
//         // dd($profile_form);
//         unset($profile_form['_token']);
        
//         // dump($profile_form);
//         // dump($profile);
       
//         //前回から変更があった場合にのみ編集履歴に保存する
        
//         $profile_history = new Profile_history;
//         $profile_history->koushin($profile, $profile_form);
        
//         $profile->fill($profile_form)->save();
//         return redirect('admin/profile/');
//     }
    

//     public function delete(Request $request)
//     {
//         // 該当するNews Modelを取得
//         $profile = Profile::find($request->id);
//         // 削除する
//         $profile->delete();
//         return redirect('admin/profile/');
//         }
// }