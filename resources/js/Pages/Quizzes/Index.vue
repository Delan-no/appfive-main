<script setup>
import Quizz from '../Quizzes/Quizz.vue';
import { ref, watch } from 'vue';

const props = defineProps(['quizzes']);
let quizzes = ref(props.quizzes);

// Champ de filtre pour la recherche
const searchValue = ref('');

// Fonction pour filtrer les quizzes
function filterQuizzes() {
	quizzes.value = props.quizzes.filter((quiz) =>
	quiz.title.toLowerCase().includes(searchValue.value.toLocaleLowerCase()));
}

watch(searchValue, () => {
	filterQuizzes();
});

</script>

<template>
		<!-- <template #header> -->
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Quizzes
			</h2>
		<!-- </template> -->

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
					<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
						<header class="bg-white space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
							<div class="flex items-center justify-between">
								<h2 class="font-semibold text-slate-900">Quizzes</h2>
								<a href="/new"
									class="hover:bg-yellow-600 group flex items-center rounded-md bg-yellow-800 text-slate-900 font-semibold text-sm font-medium pl-2 pr-3 py-2 shadow-sm">
									<svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
										<path
											d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
									</svg>
									New Quiz
								</a>
							</div>
							<form class="group relative">
								<svg width="20" height="20" fill="currentColor"
									class="absolute left-3 top-1/2 -mt-2.5 text-slate-400 pointer-events-none group-focus-within:text-blue-500"
									aria-hidden="true">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
								</svg>
								<input
									class="focus:ring-2 focus:ring-yellow-200 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm"
									type="text" aria-label="Filter projects" placeholder="Filter quizzes..." v-model="searchValue">
							</form>
						</header>
						<div class="mt-16 rounded-lg p-4 sm:px-8 sm:pt-6 sm:pb-8 lg:p-4 xl:px-8 xl:pt-6 xl:pb-8 text-sm leading-6">
							<div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8">
								<Quizz v-for="quiz in quizzes" :key="quiz.id" :quizz='quiz'
							 />
							</div>
							<div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8" v-if="quizzes.length === 0">
								No Quizzes found.
	
							</div>
						</div>
						<a :href="route('quizzes.create')"
							class="hover:border-yellow-800 hover:border-solid hover:bg-yellow-600 hover:text-blue-500 group w-full flex flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 text-sm leading-6 text-slate-900 font-medium py-3">
							<svg class="group-hover:text-blue-500 mb-1 text-slate-400" width="20" height="20" fill="currentColor"
								aria-hidden="true">
								<path
									d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
							</svg>
							New Quizz
						</a>
					</div>
				</div>
			</div>
		</div>
</template>