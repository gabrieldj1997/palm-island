<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import { createGameApi } from '@/services/gameApi'

const showCreateGameModal = ref(false);
const closeCreateGameModal = () => {
    showCreateGameModal.value = false;
};
const createGame = async () => {
    try {
        const resp = await createGameApi()
        console.log(resp)
    } catch (error) {
        alert(error)
    }

}
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-row justify-between">
                <div class="flex justify-between">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800">
                        Game
                    </h2>
                </div>
                <div class="flex justify-between">
                    <button @click="showCreateGameModal = true" class="bg-blue-500 text-white p-2 rounded">
                        Criar novo jogo
                    </button>
                </div>
            </div>


            <Modal :show="showCreateGameModal" @close="closeCreateGameModal">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900 text-center">
                        Criar um novo jogo?
                    </h2>
                    <div class="flex flex-row justify-between">
                        <div class="mt-6 flex justify-end">
                            <button @click="createGame" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Criar
                            </button>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button @click="closeCreateGameModal" class="bg-red-500 px-4 py-2 rounded">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </Modal>
        </template>
    </AuthenticatedLayout>
</template>
