<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Question
 *
 * @package App
 */
class Question extends Model
{
    // Mass assigned
    protected $fillable = [
        'name',
        'email',
        'description',
        'answer',
        'category_id',
        'published'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category()
    {
        return $this->belongsTo('App\Category');

    }
    // Возвращает все опубликованные вопросы, которые имеют ненулевое значение поля "ответ"

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function published()
    {
        return Question::where('published', 1)->whereNotNull('answer')->get();
    }
    // Возвращает все вопросы, которые имеют нулевое значение поля "ответ"

    /**
     * @return \App\Question
     */
    public static function nullAnswer()
    {
        return Question::whereNull('answer')->orderBy('created_at', 'desc');
    }
    // Возвращает все вопросы, которые были скрыты

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function isHidden()
    {
        return Question::where('published', 2)->get();
    }
}