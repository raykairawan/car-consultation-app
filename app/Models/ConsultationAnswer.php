<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationAnswer extends Model
{
    use HasFactory;

    protected $table = 'consultation_answers';

    protected $fillable = ['consultation_id', 'question_id', 'answer_id'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
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
