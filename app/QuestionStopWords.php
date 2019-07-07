<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionStopWords extends Model
{
    // Mass assigned
    protected $fillable = [
        'question_id',
        'stop_word_id',
    ];

    public static function checkForStopWords(Question $question)
    {
        $description = $question->description;

        $allStopWords = StopWord::all();
        $foundStopWords = [];

        foreach ($allStopWords as $stopWord){
            if(preg_match("/\b{$stopWord->name}\b/iu", $description)){
                $foundStopWords[] = $stopWord;
            }
        }

        return $foundStopWords;
    }

    public static function block(Question $question, array $stopWords)
    {
        $links = [];
        $question_id = $question->id;
        foreach ($stopWords as $stopWord){
            $links[] = [
                'question_id' => $question_id,
                'stop_word_id' => $stopWord->id
            ];
        }
        if(!empty($links)){
            self::insert($links);
        }
        $question->blocked = Question::BLOCKED;
        $question->save();
    }

    public static function unblock(Question $question)
    {
        self::where(['question_id' => $question->id])->delete();
        $question->blocked = Question::UNBLOCKED;
        $question->save();
    }
}
