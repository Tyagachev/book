<template>
    <div class="p-6">
        <div v-if="$page.props.flash && $page.props.flash.success" class="bg-green-100 text-green-700 p-4 mb-4">
            {{ $page.props.flash.success }}
        </div>
        <div class="mb-6">
            <label class="block mb-2 font-medium">Добавьте поджанр</label>
            <input
                v-model="name"
                type="text"
                required
                class="w-80 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                :class="{ 'border-red-500': errors.name }"
            >
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.name }}
            </div>
            <label class="block mb-2 font-medium">Добавьте жанр</label>
            <select class="block w-80 px-3 py-2 pr-10 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none" v-model="genreId">
                <option class="text-gray-500 italic" disabled selected>Выберите жанр</option>
                <option class="py-2 text-gray-700 hover:bg-blue-50 group" v-for="g in genres" :key="g.id" :value="g.id">
                    <span class="group-hover:text-blue-600">{{ g.name }}</span>
                </option>
            </select>
            <div class="mt-2">
                <BlueButton @click.prevent="store">Добавить</BlueButton>
            </div>
            <div class="mt-2">
                <ul v-for="subgenre in subgenres" :key="subgenre.id">
                    <li class="mt-1 w-80 items-center p-3 bg-white border rounded">
                        {{ subgenre.name }}
                        <hr>
                        <br>
                        Жанр: {{ subgenre.genre.name }}
                        <br>
                        <button class="text-red-600 hover:text-red-800" @click="destroy(subgenre)">Удалить</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import BlueButton from "@/UI/Buttons/BlueButton.vue";

export default {
    name: "SubgenreController",
    components: {BlueButton},
    layout: AdminLayout,
    props: {
        subgenres: Array,
        genres: Array,
        errors: Object,
        success: Object
    },
    data() {
        return {
            name: null,
            genreId: null
        }
    },
    methods: {
        store() {
            this.$inertia.post(route('subgenre.store'),{
                name: this.name,
                genreId: this.genreId
            },{
                preserveScroll: true,
                onSuccess: () => {
                    this.clearInput();
                }
            })
        },
        destroy(subgenre) {
          this.$inertia.delete(route('subgenre.destroy', subgenre.id), {
              preserveScroll: true
          })
        },
        clearInput() {
            this.name = null;
            this.genreId = null;
        }
    }
}
</script>

<style scoped>

</style>
