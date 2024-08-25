<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = [
        'consultation_id', 'rule_id', 'factor', 'solution', 'percentage'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }
}
