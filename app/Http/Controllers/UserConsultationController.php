<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Question;
use App\Models\Rule;
use Illuminate\Http\Request;

class UserConsultationController extends Controller
{
    public function index()
    {
        return view('user.consultation.index');
    }

    public function create()
    {
        $questions = Question::all();
        return view('user.consultation.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string',
            'user_tlp' => 'required|string',
            'user_gender' => 'required|string',
            'user_address' => 'required|string',
            'user_date' => 'required|date',
            'answers' => 'required|array'
        ]);

        $consultation = Consultation::create($validated);

        $rules = Rule::with('ruleQuestionsAnswers')->get();

        foreach ($rules as $rule) {
            $isRuleSatisfied = true;
            foreach ($rule->ruleQuestionsAnswers as $ruleQA) {
                $userAnswer = $request->answers[$ruleQA->question_id];
                if ($userAnswer <= $ruleQA->answer_threshold) {
                    $isRuleSatisfied = false;
                    break;
                }
            }

            if ($isRuleSatisfied) {
                $consultation->results()->create([
                    'rule_id' => $rule->id,
                    'factor' => $rule->factor,
                    'solution' => $rule->solution,
                    'percentage' => $rule->percentage
                ]);
            }
        }

        return redirect()->route('user.consultation.result', $consultation)->with('success', 'Konsultasi selesai.');
    }

    public function result(Consultation $consultation)
    {
        $results = $consultation->results;
        return view('user.consultation.result', compact('consultation', 'results'));
    }
}
