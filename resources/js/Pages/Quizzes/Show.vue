
<!-- <template>
  <AppLayout>
    
      <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        <p class="mt-4 text-lg text-gray-900">Type Quiz : {{ quiz.type }}</p>
        <p class="mt-4 text-lg text-gray-900">Title Quiz : {{ quiz.title }}</p>
        <p class="mt-4 text-lg text-gray-900">
          Description Quiz : {{ quiz.description }}
        </p>
      </div>
      <div class="mt-3 ml-3 ">
        <Link :href="route('quizzes.index')" :active="route().current('quizzes.index')"> Back </Link>
      </div>
  </AppLayout>
</template> -->
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Head } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
export default {
    props: {
        'quiz': Object,
    },
    components: { AppLayout, PrimaryButton },
    data() {
        return {
            quizForm: this.$inertia.form({
                title: this.quiz.title,
                description: this.quiz.description,
                type: this.quiz.type,
                duration: this.quiz.duration,
                visibility: this.quiz.visibility,
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
}
</script>

 
<template >

    <AppLayout title="Quizz">
        <template #header>
            <h1 class="font-semibold text-gray-900 leading-tight text-5xl flex justify-center animate-bounce h-6 ">
                Quizz
            </h1>
        </template>


        <div class=" flex justify-center mt-24">
            <div class="mr-28">
                <form @submit.prevent="form.post(route('quiz.store'), { onSuccess: () => form.reset() })"
                    class="grid justify-items-start mt-6">

                    <input type="text" placeholder="Titre Quizz" class="rounded-lg w-96" v-model="quizForm.title">

                    <input type="text" placeholder="Description Quizz" class="my-2 rounded-lg w-96" v-model="quizForm.description">

                    <select id="quiz" name="quiz" class="rounded-lg w-96" v-model="quizForm.type">
                        <option value="type1" selected>type de quiz</option>
                        <option value="type2">Général</option>
                        <option value="type3">Collectif</option>
                        <option value="type4">Psychotechnique</option>
                        <option value="type4">Individuel</option>
                        <option value="type4">type7</option>
                        <option value="type4">type8</option>
                    </select>

                    <select id="quiz" name="quiz" class="my-2 rounded-lg w-96" v-model="this.quiz.duration">
                        <option value="type1" selected>Time Quizz</option>
                        <option value="10">10 mins</option>
                        <option value="20">20 mins</option>
                        <option value="30">30 mins</option>
                        <option value="40">40 mins</option>
                        <option value="50">50 mins</option>
                        <option value="60">60 mins</option>
                    </select>

                    <button type="submit"
                        class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white text-center ml-28 Dl@  hover:italic"
                        @click="toggle">Valider
                    </button>


                    <InputError :message="form.errors.message" class="mt-2" />
                </form>
            </div>

            <div class="ml-28">
                <form @submit.prevent="form.post(route('quiz.store'), { onSuccess: () => form.reset() })"
                    class=" @wl grid justify-items-start mt-6">

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

                    <InputError :message="form.errors.message" class="mt-2" />
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

    </AppLayout>
</template>