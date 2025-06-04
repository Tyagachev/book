<template>
    <div class="p-6">
        <div v-if="$page.props.flash && $page.props.flash.success" class="bg-green-100 text-green-700 p-4 mb-4">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="errors.name" class="bg-red-100 text-red-700 p-4 mb-4">
            {{ errors.name }}
        </div>

        <div>
            <label class="block mb-2 font-medium">Добавьте жанр</label>
            <input
                v-model="name"
                type="text"
                required
                class="w-80 mb-2 p-2 border rounded"
                :class="{ 'border-red-500': errors.name }"
            >
        </div>
        <div>
            <BlueButton @click.prevent="store">Добавить</BlueButton>
        </div>
        <div class="mt-2">
            <ul v-for="genre in genres" :key="genre.id">
                <li class="mt-1 w-80 p-3 bg-white border rounded">
                    <span class="font-medium">{{ genre.name }}</span>
                    <hr>
                    <ul v-for="subgenre in genre.subgenres" :key="genre.id">
                        <li>
                            <span class="px-1">{{ subgenre.name }}</span>
                        </li>
                    </ul>
                    <button class="text-red-600 hover:text-red-800" @click="destroy(genre)">Удалить</button>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import BlueButton from "@/UI/Buttons/BlueButton.vue";

export default {
    name: "GenreIndexComponent",
    components: {BlueButton},
    layout: AdminLayout,
    props: {
        genres: Array,
        errors: Object,
        success: Object
    },
    data() {
        return {
            name: null
        }
    },
    methods: {
        store() {
            this.$inertia.post(route('genre.store'), {
                name: this.name
            }, {
                preserveScroll: true,
                onSuccess: () => {
                    this.clearInput();
                },
            });
        },
        destroy(genre) {
            this.$inertia.delete(route('genre.destroy', genre.id), {
                preserveScroll: true,
                onSuccess: () => {
                    //
                }
            });
        },
        clearInput() {
            this.name = null;
        }
    }
}
</script>
