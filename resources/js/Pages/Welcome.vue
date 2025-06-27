<template>
    <div class="bg-black">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <header class="py-5">
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>
                    </nav>
                    <template v-else>
                        <nav class="-mx-3 flex flex-1 justify-end">
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </nav>
                    </template>
                </header>
            </div>
        </div>
    <div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <main class="mt-6">
                {{ main }}
            </main>

            <footer>
                {{ footer }}
            </footer>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
export default {
    name: "Welcome",
    components: {
        Link
    },
    props: {
        canRegister: {
            type: Boolean,
        },
        canLogin: {
            type: Boolean,
        },
    },
    data() {
        return {
            main: 'Main',
            footer: 'Footer'
        }
    },
    mounted() {
        console.log('dddd')
    }
}
</script>
