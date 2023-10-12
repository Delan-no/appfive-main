<script>
import { v4 as uuid } from "uuid";
export default {
	props: {
		'quiz': Object,
	},
	data() {
		return {
			quizId: uuid(),
			questionId: uuid(),
			answerId: 0,
			monQuiz: localStorage,
			quizForm: this.$inertia.form({
				id: this.quizId,
				title: '',
				description: '',
				type: '',
				visibility: false,
				duration: 0,
				questions:[],
				possibleAnswers:[],
			}),
			questionForm: this.$inertia.form({
				id: this.questionId,
				text: '',
				image: 'sqfsdfqf',
				type: '',
				quiz_id: this.quizId,
			}),
			answersForm: this.$inertia.form({
				id: this.answerId,
				text: '',
				etat: false,
				question_id: this.questionId,
				quiz_id: this.quizId,
			}),
			answers: [],
			i: 0,
			int: 0,
			quizzes: [],
			quizz: "",
			ans: '',
			// quiz: true,
			nbrAnser: '',
			showQuestion: false,
			g: 0,
		}
	},
	methods: {
		store() {
			// this.quizForm.questions = this.quizzes
			for (let i = 0; i < this.quizzes.length; i++) {
				this.quizForm.questions.push(this.quizzes[i].question)
				for (let u = 0; u < this.quizzes[i].reponses.length; u++) {
					this.quizForm.possibleAnswers.push(this.quizzes[i].reponses[u])
				}
			}
			this.monQuiz.clear();
			this.quizForm.post('/quizzes');
			
		},
		destroy(chirp) {
			this.$inertia.delete(`/chirps/${chirp.id}`)
		},
		addQuestion() {
			console.log(this.quizForm.id);
			this.i = 0;
			this.int = 0;
			this.quizForm.id = this.quizId;
			this.quizzes.push({

				question: {
					id: this.questionId,
					text: this.questionForm.text,
					image: this.questionForm.image,
					quiz_id: this.quizId,
				},
				reponses: []
			});
			this.monQuiz.setItem('quiz', JSON.stringify(this.quizzes));
			this.monQuiz.setItem('id', JSON.stringify(this.quizForm.id));
			this.monQuiz.setItem('title', JSON.stringify(this.quizForm.title));
			this.monQuiz.setItem('description', JSON.stringify(this.quizForm.description));
			this.monQuiz.setItem('type', JSON.stringify(this.quizForm.type));
			this.monQuiz.setItem('visibility', JSON.stringify(this.quizForm.visibility));
			this.monQuiz.setItem('duration', JSON.stringify(this.quizForm.duration));
			this.questionForm.text = '';
			this.questionForm.image = 'sqfsdfqf';
			this.questionForm.type = '';
			// this.quiz = false;
			console.log(this.quizzes);
			this.g++
			this.monQuiz.setItem('g', JSON.stringify(this.g));
			this.questionId = uuid();
		},
		addAnsers() {
			this.answerId = uuid();
			this.quizzes[this.g - 1].reponses.push(
				{
					id: this.answerId,
					text: this.answersForm.text,
					etat: this.answersForm.etat,
					question_id: this.quizzes[this.g-1].question.id,
					quiz_id: this.quizId,
				}
				);
				this.monQuiz.setItem('quiz', JSON.stringify(this.quizzes));
				console.log(this.quizzes[this.g-1]);
				this.answersForm.text = "";
				this.i++;
				this.monQuiz.setItem('i', JSON.stringify(this.i));
		},
		delAnsers(ansI, questionI) {
			this.quizzes[questionI].reponses.splice(ansI, 1);
			this.i--;
		},
		truer(tab, u) {
			for (let i = 0; i < tab.reponses.length; i++) {
				if (i !== u) {
					tab.reponses[i].etat = false
				} else {
					tab.reponses[i].etat = true
				}
			}
		}
		// modifyAnsers(ansI, questionI) {
		// 	this.answersForm.text = 
		//  },

	},
	beforeMount(){
		if (this.monQuiz.getItem('quiz')) {
			this.quizzes = JSON.parse(this.monQuiz.getItem('quiz'));
			this.quizForm.id = JSON.parse(this.monQuiz.getItem('id'));
			this.quizForm.title = JSON.parse(this.monQuiz.getItem('title'));
			this.quizForm.type = JSON.parse(this.monQuiz.getItem('type'));
			this.quizForm.visibility = JSON.parse(this.monQuiz.getItem('visibility'));
			this.quizForm.duration = JSON.parse(this.monQuiz.getItem('duration'));
			this.quizForm.description = JSON.parse(this.monQuiz.getItem('description'));
			this.i = JSON.parse(this.monQuiz.getItem('i'));
			this.g = JSON.parse(this.monQuiz.getItem('g'));
			console.log(this.quizzes);
		}
	}
}

</script>
<template >

	<h1 class="font-semibold text-gray-900 leading-tight text-5xl flex justify-center animate-bounce h-6 ">
		Quizz
	</h1>
	 <div class="mr-28">
			<form @submit.prevent="addQuiz"
				class="grid justify-items-start mt-6">

				<input type="text" placeholder="Titre Quizz" class="rounded-lg w-96" v-model="quizForm.title">

				<input type="text" placeholder="Description Quizz" class="my-2 rounded-lg w-96" v-model="quizForm.description">

				<select id="quiz" name="quiz" class="rounded-lg w-96" v-model="quizForm.type">
					<option value="type1" selected>type de quiz</option>
					<option value="Général">Général</option>
					<option value="Collectif">Collectif</option>
					<option value="Psychotechnique">Psychotechnique</option>
					<option value="Individuel">Individuel</option>
				</select>

				<select id="quiz" name="quiz" class="my-2 rounded-lg w-96" v-model="quizForm.duration">
					<option value="type1" selected>Time Quizz</option>
					<option value="10">10 mins</option>
					<option value="20">20 mins</option>
					<option value="30">30 mins</option>
					<option value="40">40 mins</option>
					<option value="50">50 mins</option>
					<option value="60">60 mins</option>
				</select>

				<button type="submit"
					class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white text-center ml-28 Dl@  hover:italic"
					>Valider
				</button>

			</form>
		</div> 
	<div class=" flex justify-center mt-24">
		<div class="ml-28">
			<form @submit.prevent="addQuestion" class=" @wl grid justify-items-start mt-6">

				<select id="quiz" name="quiz" class="rounded-lg w-96" v-model="questionForm.type">
					<option value="type1" selected>Type de Question</option>
					<option value="type2">Quizz2</option>
					<option value="type3">Quizz3</option>
					<option value="type4">Quizz4</option>
					<option value="type4">Quizz5</option>
				</select>
				<!-- <input type="file" placeholder="images quiz" class="my-2 rounded-lg w-96"> -->

				<input type="text" placeholder="Textes" class="my-2 rounded-lg w-96" v-model="questionForm.text">
				<button type="submit"
					class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white my-2 ml-28  hover:italic">Valider
				</button>

			</form>
		</div>


	</div>
	<div class="flex justify-center  mt-24">
		<form @submit.prevent="addAnsers" class=" ">

			<div><input type="text" placeholder="Reponses" class="rounded-lg w-96" v-model="answersForm.text"></div>

			<button type="submit"
				class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white my-2 ml-28  hover:italic">Valider
			</button>
		</form>
	</div>
	<div id="div" v-for="(quiz, u) of quizzes" :key="u">
		<p>
			<span class="lepoint">.</span> {{  quiz.question.text }}
		</p>
		<ul>
			<li v-for="(anser, i) of quizzes[u].reponses" :key="i">
				<span>{{ i+ 1 }} - </span>
				<input type="radio" :name="u" @change="truer(quizzes[u], i)">
				<span> {{ anser.text}} </span>
				<button @click="delAnsers(i, u)">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
						viewBox="0 0 16 16">
						<path
							d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
						<path
							d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
					</svg>
				</button>
			</li>
		</ul>
	</div>
	<button @click="store">Soumettre</button>
</template>
<style>
	.lepoint{
		font-size: 5rem;
	}
</style>