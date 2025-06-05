<template>
    <div class="p-6">
        <div class="bg-white w-80 rounded-lg overflow-hidden shadow-md p-2">
            {{ u.name }}
        </div>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "UserShowComponent",
    layout: AdminLayout,
    props: {
        u: Object
    },
}
</script>

<style scoped>

</style>
