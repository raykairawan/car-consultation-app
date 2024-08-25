<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleQuestionAnswer extends Model
{
    use HasFactory;

    protected $table = 'rule_question_answer';

    protected $fillable = [
        'rule_id', 'question_id', 'answer_id'
    ];

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
