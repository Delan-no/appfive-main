<script setup>
import { ref, onBeforeMount, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
// defineProps(['quiz']) // Les questions provenant du contrôleur
function submitAnswer() {
    // Envoyer les réponses au serveur
    // answersForm.post('/useranswer', {
    //     answers: selectedChoices,
    // })
}


// defineProps(['quiz']);
let quiz = defineProps(['quiz']);
let cacher = ref(true)

let duration = parseInt(quiz.quiz.duration);
let state = reactive({
    min: duration - 1,
    secondes: 59,
    cent: 99,
    intervalID: "",
});

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
// let answersForm = useForm({
    //     id: '',
    //     quiz_id: quiz.quiz.id,
    //     possible_answer_id: '',
    //     question_id: '',
    // });
    
    const nbr = ref(0);
    // function addUserAnswer(possible_answer, i, questions) {
        //     answersForm.id = userAnswerId;
        //     answersForm.possible_answer_id = possible_answer.id
        //     // answersForm.quiz_id = quiz.id
        //     selectedChoices[i] = {
            //         'id': answersForm.id,
            //         'quiz_id': answersForm.quiz_id,
            //         'possible_answer_id': answersForm.possible_answer_id,
            //         'question_id': questions.id,
            //     }
            //     userAnswerId = uuid();
            //     answersForm.question_id = questions.id
            //     console.log(selectedChoices);
            // }
            onBeforeMount(() => {
                chnger();
            })
            
            let userAnswerTable = useForm({
                answers: [],
            });
            
            /* Fonction qui lance le Timer */
            function startQuizz() {
                state.intervalID = setInterval(() => {
                    if (state.min > -1) {
                        state.cent--;
                        if (state.cent === 0) {
                            state.cent = 99;
                            state.secondes--;
                        } else if (state.secondes === 0) {
                            state.secondes = 60;
                            state.min--;
                        }
                    } else if (state.min <= -1) {
                        clearInterval(state.intervalID);
                        state.min = 0;
                        state.cent = 0;
                        state.secondes = 0;
                    }
                }, 10);
            }
            
            
            /* Fonction qui format le time 00:00 */
            function doubleNum(number) {
                if (number < 10) {
                    return '0' + number;
                } else {
                    return number;
                }
            }
            
            
            
            
            /* Fonction pour le Next */
            const next = (tableau) => {
                nbr.value = nbr.value + 1;
                if (nbr.value >= 1) {
                    prevActif.value = false
                }
                if (nbr.value >= tableau - 1) {
                    nextActif.value = true
                    submitActif.value = false
                }
            }
            
            /* Fonction pour le précédent */
            const preview = (tableau) => {
                nbr.value = nbr.value - 1;
                if (nbr.value < 1) {
                    prevActif.value = true
                }
                if (nbr.value <= tableau) {
                    nextActif.value = false
                    submitActif.value = true
                }
            }

// function store() {
//     selectedChoices.forEach((el) => { userAnswerTable.answers.push(el) });
//     userAnswerTable.post('/useranswer/store');
//     console.log(userAnswerTable);
// }


</script>
<script>
import { v4 as uuid } from 'uuid';
export default {
    props: {
        'quiz': Object,
    },
    data() {
        return {
            userAnswerId: uuid(),
            selectedChoices: [], // Stocke les ID des choix de réponse sélectionnés pour chaque question
            userAnswerTable: this.$inertia.form({
                answers: [],
            }),
            answersForm: this.$inertia.form({
                id: '',
                quiz_id: this.quiz.id,
                possible_answer_id: '',
                question_id: '',
            }),
        }
    },
    methods: {
        submitAnswer() {
            // Envoyer les réponses au serveur
            answersForm.post('/useranswer', {
                answers: this.selectedChoices,
            })
        },
        addUserAnswer(possible_answer, i, questions) {
            this.answersForm.id = this.userAnswerId;
            this.answersForm.possible_answer_id = possible_answer.id
            // this.answersForm.quiz_id = quiz.id
            this.selectedChoices[i] = {
                'id': this.answersForm.id,
                'quiz_id': this.answersForm.quiz_id,
                'possible_answer_id': this.answersForm.possible_answer_id,
                'question_id': questions.id,
            }
            this.userAnswerId = uuid();
            this.answersForm.question_id = questions.id
        },
        store() {
            this.selectedChoices.forEach((el) => { this.userAnswerTable.answers.push(el) });
            console.log(this.userAnswerTable);
            this.userAnswerTable.post('/useranswer/store');
        }
    }
}
</script>
<template>

    <!-- <template #header> -->
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Questions
    </h2>
    <!-- </template> -->
    <div v-if="cacher">
        <p>Description : {{ quiz.quiz.description }}</p>
        <p>
            <button @click="startQuizz(); cacher = false"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Chrono</button>
        </p>
    </div>

    <div class="py-12" v-if="!cacher">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 text-gray-800">
            <div>
                <div class="flex justify-between font-bold text-2xl border-b-4 border-gray-800">
                    <p class="">{{ quiz.quiz.title }}</p>
                    <p class="">{{ doubleNum(state.min) }} : {{ doubleNum(state.secondes) }} : {{
                        doubleNum(state.cent)
                    }}</p>
                </div>

                <div class="container mx-auto max-w-3xl mt-6">
                    <div class="border-solid border-2 rounded-lg bg-white">
                        <div class="text-center text-slate-900 group-hover:text-white text-xl font-semibold border-b-2">
                            Question {{ nbr + 1 }}
                        </div>
                        {{ quizReal[nbr].text }}
                        <form @submit.prevent="store()">
                            <div v-if="quizReal[nbr].possible_answers">
                                <ol v-for="possible_answer in quizReal[nbr].possible_answers">
                                    <input type="radio" :name="quizReal[nbr].id"
                                        @change="addUserAnswer(possible_answer, nbr, quizReal[nbr])">
                                    <label id="reponse">{{ possible_answer.text }}</label>
                                </ol>
                            </div>
                            <button @click.prevent="preview(quiz.quiz.question.length)" :class="{ hidden: prevActif }">
                                Précédent
                            </button>
                            <button @click.prevent="next(quiz.quiz.question.length)" :class="{ hidden: nextActif }">
                                Suivant
                            </button>
                            <button :class="{ hidden: submitActif }">
                                Envoyer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>