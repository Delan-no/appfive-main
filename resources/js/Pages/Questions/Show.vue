<script>
import { ref, reactive } from 'vue';
import { v4 as uuid } from "uuid";
export default {
	props: {
		quiz: Array,
		questions: Array,
	},
	data() {
		return {
			cacher: ref(true),
			duration: Number(this.quiz.duration),
			prevActif: ref(true),
			nextActif: ref(false),
			submitActif: ref(true),
			tab : [],
			selectedInput: ref('on'), // initialisation du variable à null
			reponse_soumis: [], // tableau prenant le choix de l'utilisateur
			answersStocker: localStorage,


			selectedChoices: [],
			nbr: ref(0),
			state: ref({
				min: this.duration - 1,
				secondes: 59,
				cent: 99,
				intervalID: "",
			}),
			allAnswers: this.$inertia.form({
				answers: [],
			}),
			userAnswer: this.$inertia.form({
				'id': uuid(),
				'possible_answer_id': '',
				'question_id': '',
				'quiz_id': this.quiz.id,
			}),
		}
	},
	methods: {
		/* Fonction du Timer */
		startQuizz() {
			this.state.intervalID = setInterval(() => {
				if (this.state.min > -1) {
					this.state.cent--;
					if (this.state.cent === 0) {
						this.state.cent = 99;
						this.state.secondes--;
					} else if (this.state.secondes === 0) {
						this.state.secondes = 60;
						this.state.min--;
					}
				} else if (this.state.min <= -1) {
					clearInterval(this.state.intervalID);
					this.state.min = 0;
					this.state.cent = 0;
					this.state.secondes = 0;
				}
			}, 10);
		},
		/* Fonction Question suivante */
		next(tableau) {
			this.answersStocker.setItem('userAns', JSON.stringify(this.selectedInput))
			// this.reponse_soumis.push(this.answersStocker);
			this.selectedInput = 'off'
			this.selectedInput = 'on'
			this.nbr = this.nbr + 1;
			if (this.nbr >= 1) {
				this.prevActif = false
			}
			if (this.nbr >= tableau - 1) {
				this.nextActif = true
				this.submitActif = false
			}
		},
		/* Fonction Question précédente */
		preview(tableau) {
			this.selectedInput = JSON.parse(this.answersStocker.getItem('userAns'))
			this.selectedInput = 'off'
			this.selectedInput = 'on'
			this.nbr = this.nbr - 1;
			if (this.nbr < 1) {
				this.prevActif = true
			}
			if (this.nbr <= tableau) {
				this.nextActif = false
				this.submitActif = true
			}
		},
		doubleNum(number) {
			if (number < 10) {
				return '0' + number;
			} else {
				return number;
			}
		},
		addAnswers(possible_answer, i, question, u) {
			this.tab[i] = { quest : question.text, index: u};
			this.selectedChoices[i] = {
				'id': this.userAnswer.id,
				'possible_answer': possible_answer.id,
				'question_id': question.id,
				'quiz_id': this.userAnswer.quiz_id,
			}
			this.userAnswer.id = uuid()
			this.answersStocker.setItem('userAns', JSON.stringify(this.selectedChoices[i].possible_answer))
		},
		deselectionnerAutresRadios(ind, question, i) {
			var radios = document.getElementsByName('prop_ans');
			// console.log(radios);	
			for (var i = 0; i < radios.length; i++) {
				console.log(this.tab[ind]);
				console.log('tab[ind].quest =>  ' + this.tab[ind].quest);
				console.log('question =>  ' + question);
				console.log('i =>  ' + i);
				console.log('this.tab[ind].index =>  ' + this.tab[ind].index)
				if (this.tab[ind] && this.tab[ind].quest === question  && i === this.tab[ind].index) {
					radios[i].checked = true;
					console.log(true);
				}else{
					radios[i].checked = false;
					console.log(false);
				}
			}
		},
		soumettre() {

		},
		beforeMount() {
			this.selectedInput = JSON.parse(this.answersStocker.s)
		}
	}
}
</script>
<template>
	<!-- <template #header> -->
	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		Questions
	</h2>
	<div v-if="cacher">
		<p>Description : {{ quiz.description }}</p>
		<p>
			<button @click="startQuizz(); cacher = false"
				class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Chrono</button>
		</p>
	</div>

	<div class="py-12" v-if="!cacher">
		<div class="max-w-5xl mx-auto sm:px-6 lg:px-8 text-gray-800">
			<div>
				<div class="flex justify-between font-bold text-2xl border-b-4 border-gray-800">
					<p class="">{{ quiz.title }}</p>
					<p>{{ doubleNum(state.min) }} : {{ doubleNum(state.secondes) }} : {{ doubleNum(state.cent) }}</p>
				</div>

				<div class="container mx-auto max-w-3xl mt-6">
					<div class="border-solid border-2 rounded-lg bg-white">
						<div class="text-center text-slate-900 group-hover:text-white text-xl font-semibold border-b-2">
							Question {{ nbr + 1 }}
						</div>
						<form @submit.prevent="store()">
							{{ questions[nbr].text }}
							<div>
								<ul v-for="(possible_answer, i) in questions[nbr].possible_answers" :key="i">
									<input type="radio" name="prop_ans" :id="possible_answer.id"
										@change="addAnswers(possible_answer, nbr, questions[nbr],i)">
									<label :for="possible_answer.id">{{ possible_answer.text }}</label>
								</ul>
							</div>
							<button @click.prevent="preview(quiz.question.length); deselectionnerAutresRadios(nbr, questions[nbr].text, i)" :class="{ hidden: prevActif }">
								Précédent
							</button>
							<button @click.prevent="next(quiz.question.length,props_ans); deselectionnerAutresRadios(nbr, questions[nbr].text, i)" :class="{ hidden: nextActif }">
								Suivant
							</button>
							<button @click.prevent="soumettre()" :class="{ hidden: submitActif }">
								Envoyer
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
