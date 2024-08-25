<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    protected $fillable = ['answer_code', 'answer_name'];

    public function ruleQuestionsAnswers()
    {
        return $this->hasMany(RuleQuestionAnswer::class);
    }
}
