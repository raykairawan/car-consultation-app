<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations';
    protected $fillable = ['user_name', 'user_tlp', 'user_gender', 'user_address', 'user_date'];

    public function consultationAnswers()
    {
        return $this->hasMany(ConsultationAnswer::class);
    }
}
