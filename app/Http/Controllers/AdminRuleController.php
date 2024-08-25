<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Factor;
use App\Models\Name;
use App\Models\Question;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminRuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with(['name', 'factor', 'ruleQuestionsAnswers.question', 'ruleQuestionsAnswers.answer'])->get();

        return view('admin.rules.index', compact('rules'));
    }

    public function create()
    {
        $names = Name::all();
        $factors = Factor::all();
        $questions = Question::all();
        $answers = Answer::all();

        return view('admin.rules.create', compact('names', 'factors', 'questions', 'answers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|integer|exists:names,id',
            'factor' => 'required|integer|exists:factors,id',
            'solution' => 'required|string',
            'percentage' => 'nullable|numeric',
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
        ]);

        $rule = Rule::create([
            'name_id' => $validated['name'],
            'factor_id' => $validated['factor'],
            'solution' => $validated['solution'],
            'percentage' => $validated['percentage'],
        ]);

        if ($rule) {
            $rule->ruleQuestionsAnswers()->create([
                'question_id' => $validated['question_id'],
                'answer_id' => $validated['answer_id'],
            ]);
        } else {
            Log::error('Failed to create rule.');
        }

        return redirect()->route('admin.rules.index')->with('success', 'Rule added successfully.');
    }

    public function destroy(Rule $rule)
    {
        $rule->delete();
        return redirect()->route('admin.rules.index')->with('success', 'Rule deleted successfully.');
    }
}
