<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\StopWord;
use Illuminate\Http\Request;

class StopWordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stopWords.index', [
            'categories'=>StopWord::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function store(Request $request)
    {
        $message = '';
        if(!empty($request->name)) {
            $stopWord = StopWord::where('name', '=', $request->name)->first();
            if(!empty($stopWord->name)){
                $message = 'Такое слово уже есть';
            } else {
                $stopWord = new StopWord();
                $stopWord->name = $request->name;
                $stopWord->save();
            }
        } else {
            $message = 'Введите стоп-слово';
        }
        if(!empty($message)){
            return response()->json(['message' => $message]);
        }
        return response()->json($stopWord);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!empty($request->id)){
            $stopWord = StopWord::find($request->id);
            StopWord::destroy($request->id);
        }
        return response()->json(!empty($stopWord) ? $stopWord : []);
    }
}
