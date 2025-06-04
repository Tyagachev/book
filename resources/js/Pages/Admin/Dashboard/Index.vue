<template>
    <div>
        Dashbbbbb
    </div>
    <div>
        {{ getUser.id}}
        {{ getUser.name}}
        {{ getUser.role}}
    </div>
    <div>
        <BlueButton @click="create">
            Сохранить
        </BlueButton>
    </div>
    <div>
        <Ckeditor />
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Ckeditor from '@/Components/Editor.vue';
import BlueButton from "@/UI/Buttons/BlueButton.vue";

export default {
    name: "Index",
    layout: AdminLayout,
    components: {
        BlueButton,
        Ckeditor
    },
    props: {
        user: {
            type: Object
        }
    },
    mounted() {
        this.getAuthUser();
    },
    methods: {
        create() {
            this.$inertia.post('/admin/dashboard/create ', {d:123})
        },
        getAuthUser() {
            this.$store.dispatch('USER', this.user);
        }
    },
    computed: {
        getUser() {
            return this.$store.getters['GET_USER'];
        }
    }
}
</script>

<style scoped>

</style>
