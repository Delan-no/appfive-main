<script setup>

import { ref, onBeforeMount } from 'vue';

// defineProps(['quiz']);
const quiz = defineProps(['quiz']);

let nbr = ref(0);
const prevActif = ref(true);
const nextActif = ref(false);
const submitActif = ref(true);



let quizReal = [];

function chnger() {
	for (let i = 0; i < quiz.quiz.question.length; i++) {
		quizReal.push(quiz.quiz.question[i]);
		for (let u = 0; u < quiz.quiz.possible_answer.length; u++) {
			quizReal[i].possible_answers = quiz.quiz.possible_answer.filter(el => el.question_id == quizReal[i].id)
		}

	}
	return quizReal;
}

onBeforeMount(() => {
	chnger();
	console.log(quizReal);
})



const next = (tableau) => {
	nbr.value++;
	if (nbr.value >= 1) {
		prevActif.value = false
	}
	if (nbr.value >= 19) {
		nextActif.value = true
		submitActif.value = false
	}
}

const preview = (tableau) => {
	nbr.value--;
	if (nbr.value < 1) {
		prevActif.value = true
	}
	if (nbr.value <= 19) {
		nextActif.value = false
		submitActif.value = true
	}
	else if (nbr.value < tableau.length) {

	}
}

const submit = () => {

}

</script>
 
<template>
	
	<!-- <template #header> -->
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			Questions
		</h2>
	<!-- </template> -->

	<div class="py-12">
		<div class="max-w-5xl mx-auto sm:px-6 lg:px-8 text-gray-800">
			<div>
				<div class="flex justify-between font-bold text-2xl border-b-4 border-gray-800">
					<p class="">{{ quiz.title }}</p>
					<p class="">00:00</p>
				</div>

				<div class="container mx-auto max-w-3xl mt-6">
					<div class="border-solid border-2 rounded-lg bg-white">
						<div class="text-center text-slate-900 group-hover:text-white text-xl font-semibold border-b-2">
							Question
							{{ quizReal[nbr].id }}</div>
						{{ quizReal[nbr].texte }}
						<div v-if="quizReal[nbr].possible_answers">
							<ol v-for="possible_answer in quizReal[nbr].possible_answers">
								<input type="checkbox" name="" id="reponse" :value="possible_answer.id">
								<label id="reponse">{{ possible_answer.text }}</label>
							</ol>
						</div>
						<button @click.prevent="preview(questions)" :class="{ hidden: prevActif }">
							Précédent
						</button>
						<button @click.prevent="next(questions)" :class="{ hidden: nextActif }">
							Suivant
						</button>
						<button @click.prevent="submit" :class="{ hidden: submitActif }">
							Envoyer
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>