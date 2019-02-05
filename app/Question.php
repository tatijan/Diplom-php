<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
    // Mass assigned
    protected $fillable = ['name', 'email', 'description', 'answer', 'category_id', 'published'];
    public function category () {
        return $this->belongsTo('App\Category');
    }
}