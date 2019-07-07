<?php
namespace App\Http\Controllers\Admin;
use App\Question;
use App\Category;
use App\QuestionStopWords;
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
            'questions' => Question::orderBy(
                'created_at', 'desc')
                ->where('blocked', '!=', Question::BLOCKED)
                ->paginate(10),
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
        $formattedQuestion = $this->formatQuestionMessage($question);
        AdminLogger::record(Auth::user(), "added {$formattedQuestion}");
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
     * @throws \Exception
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


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unblock(Request $request)
    {
        if(!empty($request->id)){
            $question = Question::find($request->id);
            if(!empty($question)){
                QuestionStopWords::unblock($question);
            } else {
                return response()->json([
                    'message' => 'Вопрос не найден или уже разблокирован'
                ]);
            }

        }
        return response()->json($question);
    }
}
