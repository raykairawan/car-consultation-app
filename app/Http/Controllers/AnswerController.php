<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::all();
        return view('admin.answers.index', compact('answers'));
    }

    public function edit(Answer $answer)
    {
        return view('admin.answers.edit', compact('answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'answer_code' => 'required|numeric',
            'answer_name' => 'required|string|max:255',
        ]);

        $answer->update($request->all());

        return response()->json(['success' => true, 'message' => 'Data mesin berhasil diubah.']);
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('admin.answers.index')
            ->with('success', 'Answer deleted successfully.');
    }
}
