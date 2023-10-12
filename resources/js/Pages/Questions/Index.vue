<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue';  


const quizzes = defineProps(['quizzes']);

const nbr = ref(0)


</script>

<template>
    <div v-for="quiz in quizzes.quizzes" :key="quiz.id">
        <p> Quiz : {{ quiz.id }} {{ quiz.type }} || {{ quiz.title }}
            <a :href="route('quizzes.show', quiz)">Composer</a>
        </p>
		{{ console.log(quiz) }}
    </div>
</template>