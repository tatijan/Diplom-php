<?php
namespace App;
/**
 * Class StopWord
 *
 * @package App
 */
use Illuminate\Database\Eloquent\Model;

class StopWord extends Model
{
    // Mass assigned
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
    /**
     * The questions that belong to the stopword.
     */
    public function questions()
    {
        return $this->belongsTo('App\Question')->using('App\QuestionStopWords');
    }
}
