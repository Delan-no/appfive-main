<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        dd($request);
        $request->validate([
            'interne_user_id' => 'integer' ,
            'externe_user_id' => 'integer',
            'quiz_id' => 'required|integer',
            'possible_answer_id' => 'required|integer',
            'question_id' => 'required|integer',
        ]);
        $interne_user_id = 1;
        $answer = new UserAnswer;
        $answer->interne_user_id = $interne_user_id;
        $answer->externe_user_id = null;
        $answer->quiz_id = $request->quiz_id;
        $answer->possible_answer_id = $request->input('possible_answer_id');
        $answer->question_id = $request->$request->question_id;
        // $answer->question_id = $request->input('questions_id');
        $answer->save();
       
        return redirect()->route('/')->with('Vous venez de soumettre vos réponses');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAnswer $UserAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAnswer $UserAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAnswer $UserAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAnswer $UserAnswer)
    {
        //
    }
}
