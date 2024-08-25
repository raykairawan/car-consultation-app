<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $table = 'rules';
    protected $fillable = [
        'name_id', 'factor_id', 'solution', 'percentage'
    ];

    public function name()
    {
        return $this->belongsTo(Name::class, 'name_id');
    }

    // Relationship to factor (assuming 'Factor' is the model name for the factor table)
    public function factor()
    {
        return $this->belongsTo(Factor::class, 'factor_id');
    }

    public function ruleQuestionsAnswers()
    {
        return $this->hasMany(RuleQuestionAnswer::class);
    }

    // Relationship to results
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
