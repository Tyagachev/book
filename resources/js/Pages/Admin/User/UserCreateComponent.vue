<template>
    <div class="p-6">
        <div class="bg-white w-80 rounded-lg overflow-hidden shadow-md p-2">
            <label class="block mb-2 font-medium">Имя</label>
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.name }}
            </div>
            <input
                v-model="name"
                type="text"
                required
                class="mb-2 p-2 border rounded"
                placeholder="Имя пользователя"
                :class="{ 'border-red-500': errors.name }"
            >
            <label class="block mb-2 font-medium">Email</label>
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.email }}
            </div>
            <input
                v-model="email"
                type="email"
                required
                class="mb-2 p-2 border rounded"
                placeholder="Введите email"
                :class="{ 'border-red-500': errors.email }"
            >
            <label class="block mb-2 font-medium">Пароль</label>
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.password }}
            </div>
            <input
                v-model="password"
                type="password"
                required
                class="mb-2 p-2 border rounded"
                placeholder="Введите пароль"
                :class="{ 'border-red-500': errors.password }"
            >
            <label class="block mb-2 font-medium">Подтверждение пароля</label>
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.password }}
            </div>
            <input
                v-model="password_confirmation"
                type="password"
                required
                class="mb-2 p-2 border rounded"
                placeholder="Повторите пароль"
                :class="{ 'border-red-500': errors.password_confirmation }"
            >
            <div class="mt-2">
                <div v-if="errors" class="text-red-500 text-sm mt-1">
                    {{ errors.role }}
                </div>
                <select class="block px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none" v-model="role">
                    <option class="text-gray-500 italic" disabled selected>Выберите роль</option>
                    <option class="py-2 text-gray-700 hover:bg-blue-50 group" v-for="role in roles" :key="role.id" :value="role.id">
                        <span class="group-hover:text-blue-600">{{ role.role }}</span>
                    </option>
                </select>
            </div>
            <div class="mt-2">
                <BlueButton @click="store">Сохранить</BlueButton>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import BlueButton from "@/UI/Buttons/BlueButton.vue";

export default {
    name: "UserCreateComponent",
    components: {BlueButton},
    layout: AdminLayout,
    props: {
        roles: Array,
        errors: Object,
    },
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            role: ''
        }
    },
    methods: {
        store() {
            this.$inertia.post(route('user.store'), {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
                role: this.role
            })
        }
    }
}
</script>

<style scoped>

</style>
