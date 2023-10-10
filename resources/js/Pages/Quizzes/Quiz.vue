
<script setup>

import { useForm, Head } from '@inertiajs/vue3';



// defineProps(['quiz']);
const form = useForm({
	message: '',
});
</script>
 
<template>


	<h1 class="font-semibold text-gray-900 leading-tight text-5xl flex justify-center animate-bounce h-6 ">
		Quizz
	</h1>

	<!-- Généralité quizz -->

	<div class=" flex justify-center mt-24">
		<div class="mr-28">
			<form @submit.prevent="form.post(route('quiz.store'), { onSuccess: () => form.reset() })"
				class="grid justify-items-start mt-6">

				<input type="text" placeholder="Titre Quizz"
					class="rounded-lg w-96  border-solid border-2  border-gray-400 text-gray-950 p-2">

				<input type="text" placeholder="Description Quizz"
					class="my-4 rounded-lg w-96 border-solid border-2 border-gray-400 text-gray-950 p-2">

				<select id="quizz" name="quizz" v-model="quizz" @change="toggle(0)"
					class="rounded-lg w-96 border-solid border-2 border-gray-400 text-gray-950 p-2">
					<option disabled value="">Type de Quizz</option>
					<option value="Général">Général</option>
					<option value="Collectif">Collectif</option>
					<option value="Psychotechnique">Psychotechnique</option>
					<option value="Individuel">Individuel</option>
					<option value="type7">type7</option>
					<option value="type8">type8</option>
				</select>

				<select id="quiz" name="quiz"
					class="my-4 rounded-lg w-96 border-solid border-2 border-gray-400 text-gray-950 p-2" >
					<option value="type1" selected>Time Quizz</option>
					<option value="type2" >10 mins</option>
					<option value="type3" >20 mins</option>
					<option value="type4" >30 mins</option>
					<option value="type4" >40 mins</option>
					<option value="type4" >50 mins</option>
					<option value="type4" >60 mins</option>
				</select>



			</form>
		</div>

		<!-- Détail quizz -->

		<div class="ml-28" v-if="show[0]">
			<form @submit.prevent="form.post(route('quiz.store'), { onSuccess: () => form.reset() })"
				class=" @wl grid justify-items-start mt-6" >

				<select id="detail_quizz" v-model="detail_quizz" @change="toggle(1)" name="quizz"
					class="rounded-lg w-96 border-solid border-2 border-gray-400 text-gray-950 p-2">
					<option disabled value="">Type de Question</option>
					<option value="Quizz2" >Quizz2</option>
					<option value="Quizz3" >Quizz3</option>
					<option value="Quizz4" >Quizz4</option>
					<option value="Quizz5" >Quizz5</option>
				</select>
				<input placeholder="images quiz"
					class="my-4 rounded-lg w-96 border-solid border-2 border-gray-400  p-2">

				<input type="text" placeholder="Textes"
					class="my-4 rounded-lg w-96 border-solid border-2 border-gray-400 text-gray-950 p-2">

			</form>
		</div>


		<!-- Détail quizz -->

	</div>
	<div class=""  v-if="show[1]">
		<form action="" class=" " >

				<div class="flex justify-center  mt-24">
					<input type="text" placeholder="Reponses"
						class="rounded-lg w-96 border-solid border-2 border-gray-400 text-gray-950 p-2 ">
				</div>
			

			<div class="flex justify-center mt-6">
				<button type="submit"
					class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white my-4 text-center  Dl@  hover:italic mr-6">Ajouter
				</button>
				<button type="submit"
					class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white my-4   hover:italic ml-6 ">Valider
				</button>
			</div>
		</form>
	</div>



</template>

<script>
export default {
	data() {
		return {
			show:[false, false],
			quizz:"",
			detail_quizz:""
		}
	},
	methods: {
		toggle(index){
			if(index === 0){
				this.show[0] = true
				this.show[1] = false
				this.detail_quizz = ""
			} else if(index === 1){
				this.show[1] = true
			}
		}
	}
}

</script>