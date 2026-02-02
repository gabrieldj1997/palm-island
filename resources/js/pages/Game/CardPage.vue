<script setup>
import Card from '@/Components/Deck/Card.vue'
import { getIcon, getGifIcon } from '@/utils'

defineProps({
  cards: Array
})
</script>

<template>
  <div class="p-8" :style="{
    backgroundColor: 'rgba(0,0,0,0.6)',
    backgroundAttachment: 'fixed',
    backgroundSize: 'cover',
    backgroundPosition: 'center',
    backgroundRepeat: 'no-repeat',
    minHeight: '100vh'
  }">
    <div class="flex gap-4 flex-wrap justify-center w-full">
      <h1 class="text-2xl font-bold mb-6 font-agentOrange">
        Cartas do jogo
      </h1>
    </div>

    <div class="flex gap-4 flex-wrap justify-center w-full">
      <Card v-for="card in cards" :key="card.id" :card="card">
        <template #controls="{ toggleFlip, toggleRotate }">
          <div class="flex flex-col gap-4">
            <button
              class="group relative w-10 h-10 bg-gray-100 rounded-md overflow-hidden border-2 border-black rounded-lg border-solid gap-4"
              @click="toggleRotate">
              <img :src="getGifIcon('rotate')"
                class="absolute w-full h-full object-contain opacity-0 group-hover:opacity-100 transition-opacity duration-200 transform scale-125" />

              <img :src="getIcon('rotate')"
                class="relative z-10 w-full h-full object-contain group-hover:opacity-0 transition-opacity duration-200" />
            </button>

            <button
              class="group relative w-10 h-10 flex items-center justify-center bg-gray-100 rounded-md overflow-hidden border-2 border-black rounded-lg border-solid"
              @click="toggleFlip">
              <img :src="getGifIcon('flip')"
                class="absolute w-full h-full object-contain opacity-0 group-hover:opacity-100 transition-opacity duration-200 transform scale-125" />

              <img :src="getIcon('flip')"
                class="relative z-10 w-full h-full object-contain group-hover:opacity-0 transition-opacity duration-200" />
            </button>
          </div>
        </template>
      </Card>
    </div>
  </div>
</template>
