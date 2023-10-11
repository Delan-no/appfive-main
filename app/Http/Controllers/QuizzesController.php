<?php

namespace App\Http\Controllers;

use App\Models\quiz;
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
		// dd($request);
		$validate = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:255',
			'type' => 'required|string|max:255',
			'visibility' => 'required|boolean',
		]);
		$request->user()->quiz()->create($validate);
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
	public function update(Request $request, quiz $quiz)
	{
		// dd($request, $quiz);
		$validated = $request->validate([
			'visibility' => 'required|boolean',
		]);

		$quiz->update($validated);

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