<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Category
 * @package App
 */
class Category extends Model
{
    // Массовое заполнение
    protected $fillable = [
        'title',
        'published'
    ];
    // Связь с таблицей questions один ко многим
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    // Возвращает все опубликованные категории
    /**
     * @return \Illuminate\Support\Collection
     */
    public static function published()
    {
        return Category::where('published', 1)->get();
    }

    // Возвращает все опубликованные категории имеющие хотя бы один вопрос
    /**
     * @return \App\Category[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public static function related()
    {
        return Category::whereHas('questions',
            function($q) {$q->where('published', 1);}
        )->get();
    }
}