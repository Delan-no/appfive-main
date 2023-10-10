<!-- <script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
export default {
	props:{
		'quiz' : Object,
	},
	components: { AppLayout, PrimaryButton },
	data() {
		return {
			quizForm: this.$inertia.form({
				title: '',
				description: '',
				type: '',
				visibility: false,
			}),
			questionForm: this.$inertia.form({
				texte: '',
				image: 'sqfsdfqf',
				// type: '',
				quiz_id: this.quiz[0].id,
			}),
			answersForm: this.$inertia.form({
				text: '',
				etat: '',
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
		storeQuiz() {
			this.quizForm.post('/quizzes');
		},
		storeQuestion() {
			this.questionForm.post('/questions');
			this.questionForm.texte = '';
			this.questionForm.type = '';
		},
		//     storePossibleAns() {
		//         this.questionForm.post('/questions');
		//         this.questionForm.texte= '';
		//         this.questionForm.type= '';
		// },
		addAns() {
			// maMémoire.setItem('')
			// let w
		},
		destroy(chirp) {
			this.$inertia.delete(`/chirps/${chirp.id}`)
		},
		addQuiz() {
			this.i = 0;
			this.int = 0;
			this.quizzes.push({ question: this.questionForm.texte, reponses: [] });
			this.questionForm.texte = "";
			this.quiz = false;
			console.log(this.quizzes);
			this.g++
		},
		addAnsers() {
			this.quizzes[this.g - 1].reponses.push(this.answersForm.text);
			this.answersForm.text = "";
			this.i++;
			console.log(this.quizzes);
			// if (this.i === (this.int)) {
			// 	this.i = 0;
			// 	this.int = 0;
			// 	this.nbrAnsers = true;
			// 	this.quiz = true;
			// 	this.g++
			// };
		},
		delAnsers(ansI, questionI){
				this.quizzes[questionI].reponses.splice(ansI,1);
			this.i--;
		},
		// modifyAnsers(ansI, questionI){
		// 		this.answersForm.text = 
		// },

	},
}

</script>
<script setup>
const maMémoire = localStorage;

</script>
<template>
	<AppLayout>
		<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
			<form @submit.prevent="storeQuiz">
				<input type="text" placeholder="titre du quiz"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
					v-model="quizForm.title" :disabled="showQuestion">
				<input type="text" placeholder="description du quiz"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
					v-model="quizForm.description" :disabled="showQuestion">
				<select name="type_de_quiz" id="" v-model="quizForm.type" :disabled="showQuestion">
					<option value="A">test collectif</option>
					<option value="B">test psycho-technique</option>
					<option value="C">test individuelle</option>
					<option value="D">test de mémoire</option>
				</select>
				<PrimaryButton class="mt-4" @click="showQuestion = true" :disabled="!quizForm.title || !quizForm.description || !quizForm.type">ajouter quizzes</PrimaryButton>
			</form>

			<form @submit.prevent="storeQuestion" v-if="quizForm.title && quizForm.description && quizForm.type">
				<legend>Ajoutez une question</legend>
				<select name="type_de_la_question" id="" v-model="questionForm.type">
					<option value="A">texte seul</option>
					<option value="B">texte et image</option>
					<option value="C">un bout de code</option>
					<option value="D">image</option>
				</select>
				<input type="text" placeholder="texte question" v-if="questionForm.type && questionForm.type !== 'D'"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
					v-model="questionForm.texte">
				<input type="file" v-if="questionForm.type === 'B' || questionForm.type === 'D'"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
				<input type="text" v-model="questionForm.quiz_id">
				<PrimaryButton class="mt-4">connexion base</PrimaryButton>
			</form>
			<form @submit.prevent="addAnsers">
				<input type="text" placeholder="texte réponses"
					class="block w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
					v-model="answersForm.text">
				<PrimaryButton>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
						<path
							d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
					</svg>
					Ajouter une nouvelle reponse
				</PrimaryButton>

			</form>
			<div id="div" v-for="(quiz, u) of quizzes" :key="u">
				<p>
					{{ quizzes[u].question }}
				</p>
				<ul>
					<li v-for="(anser, i) of quizzes[u].reponses" :key="i">
						<span>{{ i+ 1 }} - </span>
						<input type="radio" :name="u">
						<span> {{ anser }} </span>
						<button @click="delAnsers(i,u)">
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
		</div>
	</AppLayout>
</template>
<style>
	button{
		/* border: 1px solid red; */
		margin-left: 1rem;
	}
	.bi-trash{
		color: red;
	}
</style> -->
<script setup>

import { useForm, Head } from '@inertiajs/vue3';



// defineProps(['quiz']);
const form = useForm({
    message: '',
});
</script>
 
<template >

            <h1 class="font-semibold text-gray-900 leading-tight text-5xl flex justify-center animate-bounce h-6 ">
                Quizz
            </h1>

        <div class=" flex justify-center mt-24">
            <div class="mr-28">
                <form @submit.prevent="form.post(route('quiz.store'), { onSuccess: () => form.reset() })"
                    class="grid justify-items-start mt-6">

                    <input type="text" placeholder="Titre Quizz" class="rounded-lg w-96">

                    <input type="text" placeholder="Description Quizz" class="my-2 rounded-lg w-96">

                    <select id="quiz" name="quiz" class="rounded-lg w-96">
                        <option value="type1" selected>type de quiz</option>
                        <option value="type2">Général</option>
                        <option value="type3">Collectif</option>
                        <option value="type4">Psychotechnique</option>
                        <option value="type4">Individuel</option>
                        <option value="type4">type7</option>
                        <option value="type4">type8</option>
                    </select>

                    <select id="quiz" name="quiz" class="my-2 rounded-lg w-96">
                        <option value="type1" selected>Time Quizz</option>
                        <option value="type2">10 mins</option>
                        <option value="type3">20 mins</option>
                        <option value="type4">30 mins</option>
                        <option value="type4">40 mins</option>
                        <option value="type4">50 mins</option>
                        <option value="type4">60 mins</option>
                    </select>

                    <button type="submit"
                        class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white text-center ml-28 Dl@  hover:italic" @click="toggle">Valider
                    </button>

                </form>
            </div>

            <div class="ml-28" >
                <form @submit.prevent="form.post(route('quiz.store'), { onSuccess: () => form.reset() })"
                    class=" @wl grid justify-items-start mt-6" >

                    <select id="quiz" name="quiz" class="rounded-lg w-96">
                        <option value="type1" selected>Type de Question</option>
                        <option value="type2">Quizz2</option>
                        <option value="type3">Quizz3</option>
                        <option value="type4">Quizz4</option>
                        <option value="type4">Quizz5</option>
                    </select>
                    <input placeholder="images quiz" class="my-2 rounded-lg w-96">

                    <input type="text" placeholder="Textes" class="my-2 rounded-lg w-96">
                    <button type="submit"
                        class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white my-2 ml-28  hover:italic">Valider
                    </button>

                </form>
            </div>


        </div>
        <div class="flex justify-center  mt-24">
            <form action="" class=" ">

                <div><input type="text" placeholder="Reponses" class="rounded-lg w-96"></div>

                <button type="submit"
                    class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white my-2 ml-28  hover:italic">Valider
                </button>
            </form>
        </div>

</template>