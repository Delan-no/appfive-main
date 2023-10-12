<script setup>
import { useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';


let show = ref(false);
let hidden = ref(true);

let toggle = () => {
    show.value = !show.value;
    hidden.value = !hidden.value;
}
const props = defineProps(['quizz']);



const form = useForm({
    visibility: props.quizz.visibility,
})

// let active = ref(true);

function showVisibility(quizz) {

    router.patch(`/quizzes/${quizz.id}`, { visibility: true }, quizz.id);

}
function hideVisibility(quizz) {

    router.patch(`/quizzes/${quizz.id}`, { visibility: false }, quizz.id);

}
</script>

<template>
    <div
        class="hover:bg-gray-200 group rounded-3xl border-solid  bg-gray-100 border-amber-400 text-gray-800 text-xl font-medium pl-2 pr-3 py-2 shadow-sm">
        <div>
            <div class="flex justify-between sticky top-0">
                <div class="h-7 w-30  bg-yellow-300 flex items-center justify-center rounded-xl">
                    <div class="text-center pl-1.5 pr-1.5">{{ quizz.type }}</div>
                </div>
                <div>
                    <transition>
                        <button class="ml-3.5 relative" @click="toggle(); showVisibility(quizz)">
                            <span class="absolute opacity-0 transition duration-500 bottom-0 right-1"
                                :class="{ opacity: hidden === true }">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-toggle-off" viewBox="0 0 16 16">
                                    <path
                                        d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z" />
                                </svg>
                            </span>
                 
                            <span class="absolute opacity-0 transition duration-500 bottom-0 right-1"
                                :class="{ opacity: show === true }">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-toggle-on red-600" viewBox="0 0 16 16">
                                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                                </svg>
                            </span>
                        </button>
                    </transition>

                    <button class="ml-3.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#84cc16"
                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                    </button>
                    <button class="ml-3.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#dc2626" class="bi bi-trash3"
                            viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                    </button>
                </div>


            </div>

            <div class="description overflow-y-auto h-40">
                <h2 class="mt-6 ml-1 font-medium text-gray-00 font-semibold">{{ quizz.title }}</h2>
                <p class="mt-4 text-sm ml-1 leading-relaxed static">
                    {{ quizz.description }}
                </p>
            </div>
        </div>

    </div>
    <!-- <div v-if="quizz.visibility === 0">
        <div class="absolute right-3 bottom-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-square bg-red-500" viewBox="0 0 16 16">
                <path
                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            </svg>
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
    <div v-if="quizz.visibility === 1">
        <div class="absolute right-3 bottom-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-square bg-green-500" viewBox="0 0 16 16">
                <path
                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            </svg>
        </div> -->
    <!-- </div> -->
</template>


<style>
.opacity {
    opacity: 1 !important;
}

.description::-webkit-scrollbar {
    margin-left: 5px;
    width: 5px;
}

.description::-webkit-scrollbar-thumb {
    border-radius: 50px;
    height: 20px;
    background-color: rgba(0, 0, 0, 0.2);
}
</style>
