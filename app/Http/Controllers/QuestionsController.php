<?php

namespace App\Http\Controllers;

use App\Models\questions;
use App\Models\quiz;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Questions/Index', [
            'quizzes' => quiz::where('visibility', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $quest = questions::create($request->all());
        // $validate = $request->validate([
        //     'texte' => 'required|string|max:255',
        //     'image' => 'string|max:255',
        //     'type' => 'required|string|max:255',
        // ]);
        // dd($request);
        // $request->user()->quizzes()->question()->create($validate);
        // return QuizzesController::index();
    }

    /**
     * Display the specified resource.
     */
    public function show(quiz $quiz)
    {
        // dd($quiz);
        // $quiz = quiz::with(['question','possible_answer'])->get();
        $quiz = quiz::with('question')->with('possible_answer', function ($query) {
            $query->with('question');
        })->findOrFail(866263337);
        
        return Inertia::render('Questions/Show', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(questions $questions)
    {
        //
    }

}