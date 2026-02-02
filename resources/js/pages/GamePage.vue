<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
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
                    <PrimaryButton @click="$inertia.visit('/games/card')">
                        Cartas
                    </PrimaryButton>
                </div>
                <div class="flex justify-between">
                    <PrimaryButton @click="showCreateGameModal = true">
                        Criar novo jogo
                    </PrimaryButton>
                </div>
            </div>


            <Modal :show="showCreateGameModal" @close="closeCreateGameModal">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900 text-center">
                        Criar um novo jogo?
                    </h2>
                    <div class="flex flex-row justify-between">
                        <div class="mt-6 flex justify-end">
                            <PrimaryButton @click="createGame = true">
                                Criar novo jogo
                            </PrimaryButton>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <SecondaryButton @click="closeCreateGameModal">
                                Cancelar
                            </SecondaryButton>
                        </div>
                    </div>
                </div>
            </Modal>
        </template>
    </AuthenticatedLayout>
</template>
