<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue';  


defineProps(['quizzes']);

const nbr = ref(0)


</script>

<template>
    <div v-for="quiz in quizzes" :key="quiz.id">
        <p> Quiz : {{ quiz.id }} {{ quiz.type }} || {{ quiz.title }}
            <a :href="route('questions.show', quiz)">Composer</a>
            {{ console.log(quiz) }}
        </p>
    </div>
</template>