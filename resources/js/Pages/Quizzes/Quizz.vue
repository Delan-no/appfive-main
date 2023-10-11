<script setup>
import { Link } from '@inertiajs/vue3';
import { useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';


const props = defineProps(['quizz']);

const form = useForm({
    visibility: props.quizz.visibility,
})

let active = ref(true);

function updateVisibility(quizz) {
    
    router.patch(`quizzes/${quizz.id}`, {visibility: active}, quizz.id);
    
}


</script>

<template>
    <div
        class="hover:bg-gray-400 group flex rounded-3xl border-solid relative bg-gray-100 border-amber-400 text-gray-800 text-xl font-medium pl-2 pr-3 py-2 shadow-sm  pb-9">
        <div>
            <div class="flex justify-between">
                <div class="h-20 w-20  bg-yellow-800 flex items-center justify-center rounded-full">
                    <div class="text-center">{{ quizz.type }}</div>
                </div>
                <div>
                    <form @submit.prevent>
                        <button @click="updateVisibility(quizz)"
                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-200 transition duration-150 ease-in-out">
                           Activer
                        </button>
                    </form>
                    <form>
                        <Link :href="route('quizzes.show', quizz)" method="get"
                            :active="route().current('quizzes.show')"
                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-200 transition duration-150 ease-in-out">
                        Modifier
                        </Link>
                    </form>
                    <form>
                        <Link :href="route('quizzes.destroy', quizz)" method="DELETE"
                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-200 transition duration-150 ease-in-out">
                        Supprimer
                        </Link>
                    </form>
                </div>
            </div>

            <h2 class="mt-6 ml-1 font-medium text-gray-00 font-semibold">{{ quizz.title }}</h2>

            <!-- <p class="mt-4 text-sm ml-1 leading-relaxed">
                {{ quizz.description }}
            </p>    -->
        </div>
        <p v-if="quizz.visibility === 0">
        <div class="absolute right-3 bottom-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-square bg-red-500" viewBox="0 0 16 16">
                <path
                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            </svg>
        </div>
        </p>
        <p v-if="quizz.visibility === 1">
        <div class="absolute right-3 bottom-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-square bg-green-500" viewBox="0 0 16 16">
                <path
                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            </svg>
        </div>
        </p>
    </div>
</template>

