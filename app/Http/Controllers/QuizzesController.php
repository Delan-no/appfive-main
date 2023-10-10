<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use App\Models\questions;
use App\Models\PossibleAnswer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuizzesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$quizzes = quiz::all();
		return Inertia::render('Quizzes/Index', [
			'quizzes' => $quizzes
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return Inertia::render('Quizzes/Quiz');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$validate = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:255',
			'type' => 'required|string|max:255',
			'visibility' => 'required|boolean',
		]);
		// $request->user()->quiz()->create($validate);
		// dd($request);



		$quiz = quiz::create([
			'id' => $request->id,
			'title' => $request->title,
			'description' => $request->description,
			'type' => $request->type,
			'visibility' => $request->visibility,
			'duration' => $request->duration,
			'interne_user_id' => 1,
		]);
		


		// dd($request->questions[0]['id']);
		for ($i=0; $i < count($request->questions); $i++) {
			$question = questions::create([
			'id' => $request->questions[$i]['id'],
			'text' => $request->questions[$i]['text'],
			'image' => $request->questions[$i]['image'],
			'quiz_id' => $request->questions[$i]['quiz_id'],
			]);
		}

		
		for ($i=0; $i < count($request->possibleAnswers); $i++) { 
			$possibleAnswer = possibleAnswer::create([
				'id' => $request->possibleAnswers[$i]['id'],
				'text' => $request->possibleAnswers[$i]['text'],
				'state' => $request->possibleAnswers[$i]['etat'],
				'quiz_id' => $request->possibleAnswers[$i]['quiz_id'],
				'question_id' => $request->possibleAnswers[$i]['question_id'],
				]);
		}
		return $this->index();
	}

	/**
	 * Display the specified resource.
	 */
	public function show(quiz $quizzes)
	{
		$quiz = quiz::where('id', $quizzes->id)->get();
		return Inertia::render('Quizzes/Show', [
			'quiz' => $quiz,
		]);

	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(quiz $quizzes)
	{
		//    
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, quiz $quizzes)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(quiz $quizzes)
	{
		$quizzes->delete();
		return $this->index();
	}
}