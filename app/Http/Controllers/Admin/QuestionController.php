<?php
namespace App\Http\Controllers\Admin;
use App\Question;
use App\Category;
use App\Utils\AdminLogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class QuestionController
 *
 * @package App\Http\Controllers\Admin
 */
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.questions.index', [
            'questions' => Question::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create', [
            'question' => [],
            'categories' => Category::get(),
            'delimiter' => ''
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        AdminLogger::record(Auth::user(), "added {$this->formatQuestionMessage($question)}");
        return redirect()->route('admin.question.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', [
            'question' => $question,
            'categories' => Category::get()
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Category $category)
    {
        $question->update($request->all());
        AdminLogger::record(Auth::user(), "updated {$this->formatQuestionMessage($question)}");
        return redirect()->route('admin.question.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        AdminLogger::record(Auth::user(), "deleted {$this->formatQuestionMessage($question)}");
        return redirect()->route('admin.question.index');
    }

    /**
     * @param Question $question
     * @return string
     */
    private function formatQuestionMessage(Question $question) {
        return "question \"{$question->description}\" ({$question->id}) from category \"{$question->category->title}\" ({$question->category->id})";
    }
}
