<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Question;
/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function execute (Request $request)
    {

        If ($request->isMethod('post')) {
            Question::create($request->all());

            return redirect()->route('site');
        }

        $categories = Category::related();
        $questions = Question::published();
        $categoriesAll = Category::published();

        return view('welcomeIndex')->with([
            'categories' => $categories,
            'questions' => $questions,
            'categoriesAll' => $categoriesAll
        ]);
    }
}