<?php

namespace App\Http\Controllers;

use App\Ramen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use rameninfo\Infrastructure\Eloquent\EloquentRamen;

class RamenController extends Controller
{
    public function index(Request $request){
        $json_php = file_get_contents($request->file('json'));
        $contents = json_decode($json_php);
        foreach ($contents as $content){
            $ramen = new Ramen;
            foreach ($content as $key => $value){
                print $key.'=>'.$value.'<br />';
                $ramen->$key = $value;
            }
            $ramen->save();
        }
        return redirect('/show');
//        redirect('/');
//        $json_array = File::get($request->json);
//        Log::info($json_array);

//        $validator = Validator::make($request->all(),[
//            'name' => 'required|max:12',
//        ]);
//        if ($validator->fails()){
//            return redirect('/')
//                ->withInput()
//                ->withErrors($validator);
//        }
//        $ramen = new Ramen;
//        $ramen->name = $request->name;
//        $ramen->address = $request->address;
//        $ramen->timestamps = false;
//        $ramen->save();
    }

    public function show(){
        $ramen = new EloquentRamen();
        $ramen_data = $ramen->all();
        return view('ramen.show',compact('ramen_data'));
    }

    public function delete(){
        DB::table('ramens')->truncate();
    }
}
