<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\ContactForm;

//クエリビルダ　DBのFacadesを使えるようにする
use Illuminate\Support\Facades\DB;

use App\Services\CheckFormData;

use App\Http\Requests\StoreContactForm;


class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        //エロクワント…全てのデータ　ORマッパー
        // $contacts = ContactForm::all();

        // //クエリビルダ…一部のデータ DBのFacadesを使う
        // $contacts = DB::table('contact_forms')
        // ->select('id', 'your_name', 'title', 'created_at') //表示させるものを記載
        // // ->get(); //データをもってくる
        // ->paginate(20);//20件ずつ表示する

        //検索フォーム
        $query = DB::table('contact_forms');

        //もしキーワードがあったら
        if($search !== null){
            //全角スペースを半角に変換
            $search_split = mb_convert_kana($search,'s');

            //空白で区切る.phpの関数
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($search_split2 as $value){
                $query->where('your_name','like','%'.$value.'%');
            }
        };

        $query->select('id', 'your_name', 'title', 'created_at');
        $contacts = $query->paginate(20);

        //viewファイルを書く
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //StoreContactFormいれてバリデーションかける
    public function store(StoreContactForm $request)
    {
        // dd($request);

        //インスタンス化
        $contact = new ContactForm;

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');
        
        $contact->save();

        // dd($contact);

        return redirect('contact/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contact = ContactForm::find($id);

        //ファットコントローラー　スリム化
        $gender = CheckFormData::checkGender($contact);   
        $age = CheckFormData::checkAge($contact);   

        return view('contact.show', compact('contact','gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = ContactForm::find($id);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $contact = ContactForm::find($id);

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');
        
        $contact->save();

        return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = ContactForm::find($id);
        $contact->delete();

        return redirect('contact/index');
    }
}
