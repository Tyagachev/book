<template>
    <div class="p-6 overflow-x-auto">
        <div v-if="$page.props.flash && $page.props.flash.success" class="bg-green-100 text-green-700 p-4 mb-4">
            {{ $page.props.flash.success }}
        </div>
        <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-md">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
            <tr>
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">ИМЯ</th>
                <th class="py-3 px-4 text-left">Email</th>
                <th class="py-3 px-4 text-left">РОЛЬ</th>
                <th class="py-3 px-4 text-left">СОЗДАН</th>
                <th class="py-3 px-4 text-left">ОБНОВЛЕН</th>
                <th class="py-3 px-4 text-left">Действие</th>
            </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
            <tr v-for="user in users" :key="user.id" class="hover:bg-gray-50 transition-colors">
                <td class="py-3 px-4">{{ user.id }}</td>
                <Link :href="route('user.show', user.id)">
                    <td class="py-3 px-4 font-medium">{{ user.name }}</td>
                </Link>
                <td class="py-3 px-4 text-blue-600 hover:underline">{{ user.email }}</td>
                <td class="py-3 px-4">
                    <div class="flex flex-wrap gap-1">
              <span
                  v-for="role in user.roles"
                  :key="role.id"
                  class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full"
              >
                {{ role.role }}
              </span>
                    </div>
                </td>
                <td class="py-3 px-4 text-sm">{{ formatDate(user.created_at) }}</td>
                <td class="py-3 px-4 text-sm">{{ formatDate(user.updated_at) }}</td>
                <td>
                    <button class="text-blue-600 hover:text-blue-800 px-2"><Link :href="route('user.edit', user.id)">Редактировать</Link></button>
                    <button class="text-red-600 hover:text-red-800" @click="destroy(user)">Удалить</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "UserIndexComponent",
    layout: AdminLayout,
    components: {
        Link
    },
    props: {
        users: Array
    },
    mounted() {
        this.formatDate()
    },
    methods: {
        formatDate(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' }
            return new Date(dateString).toLocaleDateString(undefined, options)
        },
        destroy(user) {
            this.$inertia.delete(route('user.destroy', user.id), {
                preserveScroll: true
            })
        }
    }
}
</script>

<style scoped>

</style>
