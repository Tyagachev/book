<template>
    <div class="p-6">
        <div v-if="$page.props.flash && $page.props.flash.success" class="bg-green-100 text-green-700 p-4 mb-4">
            {{ $page.props.flash.success }}
        </div>
        <div class="bg-white w-80 rounded-lg overflow-hidden shadow-md p-2">
            <label class="block mb-2 font-medium">Имя</label>
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.name }}
            </div>
            <input
                v-model="form.name"
                type="text"
                required
                class="mb-2 p-2 border rounded"
                placeholder="Имя пользователя"
            >
            <label class="block mb-2 font-medium">Email</label>
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.email }}
            </div>
            <input
                v-model="form.email"
                type="email"
                required
                class="mb-2 p-2 border rounded"
                placeholder="Введите email"
            >
            <label class="block mb-2 font-medium">Пароль</label>
            <div v-if="errors" class="text-red-500 text-sm mt-1">
                {{ errors.password }}
            </div>
            <input
                v-model="form.password"
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
                v-model="form.password_confirmation"
                type="password"
                required
                class="mb-2 p-2 border rounded"
                placeholder="Повторите пароль"
                :class="{ 'border-red-500': errors.password_confirmation }"
            >
        </div>
        <div class="mt-2">
            <select
                v-model="form.role"
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm"
                :class="{ 'border-red-500': errors.role }"
            >
                <option
                    v-for="role in roles"
                    :key="role.id"
                    :value="role.id"
                >
                    {{ role.role }}
                </option>
            </select>
        </div>
        <div class="mt-2">
            <BlueButton @click="update">Сохранить</BlueButton>
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import BlueButton from "@/UI/Buttons/BlueButton.vue";

export default {
    name: "UserEditComponent",
    components: {BlueButton},
    layout: AdminLayout,
    props: {
        roles: Array,
        userData: Object,
        errors: Object
    },
    data() {
        return {
            form: {
                name: this.userData.name,
                email: this.userData.email,
                password: '',
                password_confirmation: '',
                role: this.userData.role.length ? this.userData.role[0].id : null,
            }

        }
    },
    methods: {
        update() {
            this.$inertia.put(route('user.update', this.userData),
                this.form
            );
        }
    }
}
</script>

<style scoped>

</style>
