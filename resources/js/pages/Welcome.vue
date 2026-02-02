<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome" />
    <div class="relative min-h-screen bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 overflow-hidden">

        <img id="background" class="absolute -left-20 top-0 max-w-[877px] opacity-50"
            src="https://laravel.com/assets/img/welcome/background.svg" />

        <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20] fill-current"
                            viewBox="0 0 512 512">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)">
                                <path
                                    d="M2463 4942 c-72 -26 -128 -67 -163 -120 -30 -45 -60 -128 -60 -164 0 -17 -13 -18 -197 -18 -207 0 -334 -14 -453 -48 -151 -44 -301 -123 -422 -220 l-58 -47 -387 -5 c-354 -5 -391 -7 -423 -24 -49 -26 -88 -64 -113 -111 l-22 -40 0 -1425 0 -1425 22 -40 c25 -47 64 -85 113 -111 33 -18 77 -19 868 -22 l832 -2 0 -159 0 -159 -192 -4 c-165 -3 -198 -6 -228 -22 -49 -26 -88 -64 -113 -111 -21 -37 -22 -54 -22 -252 0 -190 2 -214 18 -230 17 -17 75 -18 1080 -21 756 -2 1070 1 1089 9 44 18 50 49 46 260 -3 213 -10 241 -75 300 -63 59 -82 64 -290 67 l-193 4 0 159 0 159 833 2 c790 3 834 4 867 22 49 26 88 64 113 111 l22 40 0 1425 0 1425 -22 40 c-25 47 -64 85 -113 111 -32 17 -67 19 -421 22 l-385 3 -55 45 c-124 103 -303 194 -456 233 -126 32 -222 41 -428 41 l-193 0 -6 43 c-9 61 -48 138 -91 182 -82 81 -219 114 -322 77z m992 -495 c178 -48 325 -130 454 -252 207 -196 316 -438 328 -730 4 -98 1 -149 -11 -205 -71 -337 -418 -540 -729 -427 -119 44 -174 85 -290 219 -46 53 -73 75 -134 105 l-77 38 -436 0 -436 0 -77 -38 c-60 -30 -88 -52 -129 -100 -114 -134 -176 -180 -295 -224 -311 -113 -658 90 -729 427 -23 108 -14 302 20 435 28 108 83 231 143 323 50 75 162 193 243 254 122 93 315 173 476 197 32 5 401 8 819 7 l760 -2 100 -27z m-2523 -327 l-27 -39 -228 -1 -228 0 -24 -25 -25 -24 0 -1071 0 -1071 25 -24 24 -25 2111 0 2111 0 24 25 25 24 0 1071 0 1071 -25 24 -24 25 -228 0 -228 1 -27 39 -28 40 285 0 c301 0 324 -3 344 -47 8 -17 11 -356 11 -1188 l0 -1165 -2240 0 -2240 0 0 1165 c0 834 3 1171 11 1189 6 13 21 29 33 34 13 7 132 11 308 11 l288 1 -28 -40z m3868 -2655 c0 -131 -1 -137 -25 -160 l-24 -25 -2191 0 -2191 0 -24 25 c-24 23 -25 29 -25 160 l0 135 2240 0 2240 0 0 -135z m-1840 -505 l0 -160 -400 0 -400 0 0 160 0 160 400 0 400 0 0 -160z m535 -345 c24 -23 25 -29 25 -160 l0 -135 -960 0 -960 0 0 135 c0 131 1 137 25 160 l24 25 911 0 911 0 24 -25z" />
                                <path
                                    d="M2185 4135 c-16 -15 -25 -36 -25 -55 0 -19 9 -40 25 -55 23 -24 31 -25 135 -25 104 0 112 1 135 25 16 15 25 36 25 55 0 19 -9 40 -25 55 -23 24 -31 25 -135 25 -104 0 -112 -1 -135 -25z" />
                                <path
                                    d="M2665 4135 c-16 -15 -25 -36 -25 -55 0 -19 9 -40 25 -55 23 -24 31 -25 135 -25 104 0 112 1 135 25 16 15 25 36 25 55 0 19 -9 40 -25 55 -23 24 -31 25 -135 25 -104 0 -112 -1 -135 -25z" />
                                <path
                                    d="M1385 4055 c-24 -23 -25 -29 -25 -160 l0 -135 -135 0 c-131 0 -137 -1 -160 -25 -24 -23 -25 -28 -25 -175 0 -147 1 -152 25 -175 23 -24 29 -25 160 -25 l135 0 0 -135 c0 -131 1 -137 25 -160 23 -24 28 -25 175 -25 147 0 152 1 175 25 24 23 25 29 25 160 l0 135 135 0 c131 0 137 1 160 25 24 23 25 28 25 175 0 147 -1 152 -25 175 -23 24 -29 25 -160 25 l-135 0 0 135 c0 131 -1 137 -25 160 -23 24 -28 25 -175 25 -147 0 -152 -1 -175 -25z m215 -215 l0 -80 -40 0 -40 0 0 80 0 80 40 0 40 0 0 -80z m-240 -280 l0 -40 -80 0 -80 0 0 40 0 40 80 0 80 0 0 -40z m240 0 l0 -40 -40 0 -40 0 0 40 0 40 40 0 40 0 0 -40z m320 0 l0 -40 -80 0 -80 0 0 40 0 40 80 0 80 0 0 -40z m-320 -280 l0 -80 -40 0 -40 0 0 80 0 80 40 0 40 0 0 -80z" />
                                <path
                                    d="M3535 3986 c-101 -44 -125 -178 -46 -257 112 -113 296 -12 267 146 -18 94 -131 151 -221 111z" />
                                <path
                                    d="M3215 3666 c-101 -44 -125 -178 -46 -257 112 -113 296 -12 267 146 -18 94 -131 151 -221 111z" />
                                <path
                                    d="M3855 3666 c-101 -44 -125 -178 -46 -257 112 -113 296 -12 267 146 -18 94 -131 151 -221 111z" />
                                <path
                                    d="M3535 3346 c-101 -44 -125 -178 -46 -257 112 -113 296 -12 267 146 -18 94 -131 151 -221 111z" />
                                <path
                                    d="M4185 1495 c-16 -15 -25 -36 -25 -55 0 -19 9 -40 25 -55 23 -24 31 -25 135 -25 104 0 112 1 135 25 16 15 25 36 25 55 0 19 -9 40 -25 55 -23 24 -31 25 -135 25 -104 0 -112 -1 -135 -25z" />
                            </g>
                        </svg>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                            </Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>
            </div>
        </div>
    </div>
</template>
