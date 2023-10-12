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

                    <select id="quiz" name="quiz" class="rounded-lg w-96">
                        <option value="type1" selected disabled>type de quiz</option>
                        <option value="type2">Général</option>
                        <option value="type3">Collectif</option>
                        <option value="type4">Psychotechnique</option>
                        <option value="type4">Individuel</option>
                        <option value="type4">type7</option>
                        <option value="type4">type8</option>
                    </select>

                    <input type="text" placeholder="Titre Quizz" class="rounded-lg w-96">

                    <input type="text" placeholder="Description Quizz" class="my-2 rounded-lg w-96">


                    <select id="quiz" name="quiz" class="my-2 rounded-lg w-96">
                        <option value="type1" selected disabled>Time Quizz</option>
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
                        <option value="type1" selected disabled>Type de Question</option>
                        <option value="type2">Quizz2</option>
                        <option value="type3">Quizz3</option>
                        <option value="type4">Quizz4</option>
                        <option value="type4">Quizz5</option>
                    </select>
                    <input placeholder="images quiz" class="my-2 rounded-lg w-96">

                    <input type="text" placeholder="Textes" class="my-2 rounded-lg w-96">
                    <button disabled type="submit"
                        class="border-double border-4  text-2xl px-8 hover:bg-orange-500 bg-orange-400 rounded-full border-white-950 text-white my-2 ml-28">Valider
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