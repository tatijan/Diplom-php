<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
    // Mass assigned
    protected $fillable = ['title', 'published'];
    public function questions () {
        return $this->hasMany('App\Question');
    }
}