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
    const BLOCKED = 1;
    const UNBLOCKED = 0;

    // Mass assigned
    protected $fillable = [
        'name',
        'email',
        'description',
        'answer',
        'category_id',
        'published',
        'blocked',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Возвращает все опубликованные вопросы, которые имеют ненулевое значение поля "ответ"
     * @return \Illuminate\Support\Collection
     */
    public static function published()
    {
        return Question::where('published', '!=', 0)->whereNotNull('answer')->get();
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
        return Question::where('published', '=', 2)->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getBlocked()
    {
        return Question::where('blocked', '=', Question::BLOCKED)->get();
    }

    public static function unblock($id)
    {
        $result = self::find($id);
        if(empty($result)){
            throw new \Exception('Вопрос не найден');
        } else {
            return true;
        }
    }
}