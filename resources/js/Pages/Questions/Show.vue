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
			nbr: ref(0),
			state: ref({
				min: this.duration - 1,
				secondes: 59,
				cent: 99,
				intervalID: "",
			}),
			allAnswers : this.$inertia.form({
				answers : [],
			}),
			userAnswer : this.$inertia.form({
				'id' : uuid(),
				'possible_answer_id' : '',
				'question_id' :'' ,
				'quiz_id' :this.quiz.id , 
			}),
			

		}
	},
	methods: {
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
		next(tableau) {
			this.nbr = this.nbr + 1;
			if (this.nbr >= 1) {
				this.prevActif = false
			}
			if (this.nbr >= tableau - 1) {
				this.nextActif = true
				this.submitActif = false
			}
		},
		preview(tableau) {
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
		soumettre() {
			
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
					<p>{{ doubleNum(state.min) }} : {{ doubleNum(state.secondes) }} : {{ oubleNum(state.cent) }}</p>
				</div>

				<div class="container mx-auto max-w-3xl mt-6">
					<div class="border-solid border-2 rounded-lg bg-white">
						<div class="text-center text-slate-900 group-hover:text-white text-xl font-semibold border-b-2">
							Question {{ nbr + 1 }}
						</div>
						<form @submit.prevent="store()">
							{{ questions[nbr].text }}
							<div>
								<ol v-for="possible_answer, i in questions[nbr].possible_answers" :key="i">
									<input type="radio" name="prop_answ">
									<label id="reponse">{{ possible_answer.text }}</label>
									{{ console.log(possible_answer.id) }}
								</ol>
							</div>
							<button @click.prevent="preview(quiz.question.length)" :class="{ hidden: prevActif }">
								Précédent
							</button>
							<button @click.prevent="next(quiz.question.length)" :class="{ hidden: nextActif }">
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
