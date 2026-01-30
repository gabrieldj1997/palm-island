<script setup>
import { ref } from 'vue'
import DeckCard from '@/Components/Deck/Card.vue'

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
    <h1 class="text-2xl font-bold mb-6">
      📜 Deck do Jogo
    </h1>

    <div class="flex gap-4 flex-wrap justify-center w-full">
      <DeckCard v-for="card in cards" :key="card.id" :card="card" />
    </div>
  </div>
</template>
