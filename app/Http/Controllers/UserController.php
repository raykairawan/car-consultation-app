<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Consultation;
use App\Models\ConsultationAnswer;
use App\Models\Question;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $consultations = Consultation::all();
        return view('user.index', compact('consultations'));
    }

    public function create()
    {
        $questions = Question::all();
        $answers = Answer::all();
        return view('user.create', compact('questions', 'answers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_tlp' => 'required|string|max:15',
            'user_gender' => 'required|in:male,female',
            'user_address' => 'required|string',
            'question_id' => 'required|array',
            'question_id.*' => 'exists:questions,id',
            'answer_id' => 'required|array',
            'answer_id.*' => 'exists:answers,id',
        ]);

        $consultation = Consultation::create([
            'user_name' => $validatedData['user_name'],
            'user_tlp' => $validatedData['user_tlp'],
            'user_gender' => $validatedData['user_gender'],
            'user_address' => $validatedData['user_address'],
        ]);

        foreach ($validatedData['question_id'] as $key => $questionId) {
            ConsultationAnswer::create([
                'consultation_id' => $consultation->id,
                'question_id' => $questionId,
                'answer_id' => $validatedData['answer_id'][$key],
            ]);
        }

        return redirect()->route('user.index')->with('success', 'Consultation created successfully.');
    }

    public function show(Consultation $consultation)
    {
        return view('user.show', compact('consultation'));
    }
}
