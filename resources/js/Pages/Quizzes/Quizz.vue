<script setup>
defineProps(['quizz']);
</script>

<template>
    <div
        class="hover:bg-gray-400 group flex rounded-3xl border-solid  bg-gray-100 border-amber-400 text-gray-800 text-xl font-medium pl-2 pr-3 py-2 shadow-sm">
        <div>
            <div class="flex justify-between">
                <div class="h-7 w-30  bg-yellow-300 flex items-center justify-center rounded-xl">
                    <div class="text-center pl-1.5 pr-1.5">{{ quizz.type }}</div>
                </div>
                <div>
                    <button class="ml-3.5">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-toggle-on red-600" viewBox="0 0 16 16">
                                <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
                            </svg>
                        </span>

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-toggle-off" viewBox="0 0 16 16">
                                <path
                                    d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z" />
                            </svg>
                        </span>
                        
                            <!-- <input type="radio" checked> -->
                            
                        
                    </button>
                    <button class="ml-3.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#84cc16"
                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                    </button>
                    <button class="ml-3.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#dc2626" class="bi bi-trash3"
                            viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                    </button>
                </div>


                <!-- <Dropdown>
                    <template #default>
                        <button>
                            <button class="text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                            <button
                                class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-200 transition duration-150 ease-in-out">
                                Activer
                            </button>
                            <Link :href="route('quizzes.show', quizz)" method="get" :active="route().current('quizzes.show')"
                                class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-200 transition duration-150 ease-in-out">
                            Modifier
                            </Link>
                            <Link :href="route('quizzes.destroy', quizz)" method="DELETE"
                                class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-200 transition duration-150 ease-in-out">
                            Supprimer
                            </Link>
                        </button>
                    </template>
                </Dropdown -->

                <!-- <Dropdown class="mt-1">
                    <template #default>
                        <div class="group flex items-center cursor-pointer select-none">
                            <div>
                                <span>fghfgh</span>
                            </div>
                            <Icon class="w-5 h-5 fill-gray-700 group-hover:fill-yellow-600 focus:fill-yellow-600"
                                name="cheveron-down" />
                        </div>
                    </template>
                    <template #dropdown>
                        <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                            <Link class="block px-6 py-2 w-full text-left hover:text-white hover:bg-yellow-500"
                                href="/logout" method="delete" as="button">Logout</Link>
                        </div>
                    </template>
                </Dropdown> -->

            </div>


            <h2 class="mt-6 ml-1 font-medium text-gray-00 font-semibold">{{ quizz.title }}</h2>

            <p class="mt-4 text-sm ml-1 leading-relaxed">
                {{ quizz.description }}
            </p>


        </div>

    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import Icon from '../../Shared/Icon.vue';
import Dropdown from '../../Shared/Dropdown.vue';


export default {
    components: {
        Dropdown,
        Link,
        Icon,
    },
    props: {
        auth: Object,
    }
}
</script>
