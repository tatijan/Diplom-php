<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;
/**
 * Class DashboardController
 *
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    //Панель для администратора
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {

        $categories = Category::withCount('questions')->get();
        $questions = Question::get();
        $countNull = Question::nullAnswer()->count();
        $questions2 = Question::isHidden();

        return view('admin.dashboard')->with([
            "categories" => $categories,
            'questions' => $questions,
            'countNull' => $countNull,
            'questions2' => $questions2
        ]);
    }

    // Все вопросы в конкретной категории

    /**
     * @param \App\Question $question
     * @param \App\Category $category
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('admin.questions.show', [
            'categories' => Category::get(),
            'request' => $request,
            'questions' => Question::where('category_id', $request->category)->paginate(10)
        ]);
    }

    // Все вопросы без ответов

    /**
     * @param \App\Question $question
     * @param \App\Category $category
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllNullAnswer(Request $request)
    {

        return view('admin.questions.showAllNullAnswer', [
            'categories' => Category::get(),
            'request' => $request,
            'questions' => Question::nullAnswer()->paginate(10)
        ]);
    }

    // Все вопросы без ответов в конкретной категории

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showNullAnswer(Request $request)
    {

        return view('admin.questions.showNullAnswer', [
            'categories' => Category::get(),
            'request' => $request,
            'questions' => Question::where('category_id', $request->category)->whereNull('answer')->paginate(10)
        ]);
    }
}