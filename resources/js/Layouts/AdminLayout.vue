<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav
                class="border-b border-gray-100 bg-white"
            >
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <Link :href="route('welcome')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                            >
                                <NavLink
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                >
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:ms-6 sm:flex sm:items-center">
                            <!-- Settings Dropdown -->
                            <div class="relative ms-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="-me-0.5 ms-2 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink
                                            :href="route('profile.edit')"
                                        >
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <div class="space-y-1 pb-3 pt-2">
                        <ResponsiveNavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div
                        class="border-t border-gray-200 pb-1 pt-4"
                    >
                        <div class="px-4">
                            <div
                                class="text-base font-medium text-gray-800"
                            >
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <section>
        <!--<header class="w-full p-4">
            Market Admin
        </header>-->
    </section>
    <section class="flex">
        <aside  class="w-1/6 bg-gray-900 min-h-screen">
                <div class="accordion">
                    <div v-for="(item, index) in items" :key="index"
                         class="accordion-item">
                        <div class="accordion-header" @click="toggleItem(index)">
                            <h5>{{ item.title }}</h5>
                            <span class="icon">{{ activeIndex === index ? '−' : '+' }}</span>
                        </div>
                        <transition name="slide">
                        <div v-show="activeIndex === index" class="accordion-content">
                            <div v-for="i in item.links">
                                <Link :href="i.route" class="hover:bg-gray-700 block px-2 pt-4 pb-4 text-gray-300 border-b border-gray-700"><p class="px-4 text-sm">{{ i.linkTitle }}</p></Link>
                            </div>
                        </div>
                        </transition>
                    </div>
                </div>
       </aside>
       <article class="w-[calc(100%+8rem)] bg-gray-50">
           <div class="p-2">
               <slot/>
           </div>
       </article>
   </section>
   <section>
       <footer>

       </footer>
   </section>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";

import {Link} from "@inertiajs/vue3";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import NavLink from "@/Components/NavLink.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
export default {
   name: "AdminLayout",
   components: {
       DropdownLink, NavLink, Dropdown, ApplicationLogo, ResponsiveNavLink,
       Link
   },
   data() {
       return {
           showingNavigationDropdown: ref(false),
           activeIndex: null,
           items: [
               {
                   title: 'Dashboard',
                   links:[
                       {
                           linkTitle:'Дашборд',
                           route: route('dashboard')
                       },
                   ],
               },
               {
                   title: 'Жанры',
                   links: [
                       {
                           linkTitle:'Cписок жанров',
                           route: route('genre.index')
                       },
                       {
                           linkTitle:'Cписок поджанров',
                           route: route('subgenre.index')
                       },
                   ]
               }
           ]
       }
   },
   methods: {
       toggleItem(index) {
           this.activeIndex = this.activeIndex === index ? null : index
       }
   }
}

</script>

<style>

.accordion {
   max-width: 600px;
   //margin: 20px auto;
   border-bottom: white;
}

.accordion-item {
   //border: 1px solid #ddd;
   //padding-bottom: 5px;
   //border-radius: 4px;
}

.accordion-header {
   display: flex;
   justify-content: space-between;
   align-items: center;
   padding: 15px;
   cursor: pointer;
   border-bottom: solid 1px gray;
   color: #cbd5e0;
   //background-color: #f5f5f5;
   transition: background-color 0.3s;
}

.accordion-header:hover {
   ///background-color: rgba(55, 65, 81, var(--tw-bg-opacity));
}

.accordion-header {
   margin: 0;
}

.icon {
   font-size: 1.2em;
}

.accordion-content {
    overflow: hidden;
    background: #607993;
}

.slide-enter-active,
.slide-leave-active {
   transition: max-height 0.3s ease;
   max-height: 200px;
}

.slide-enter,
.slide-leave-to {
   max-height: 0;
}
</style>
