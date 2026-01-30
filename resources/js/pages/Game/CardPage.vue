<script setup>
import DeckCard from '@/Components/Deck/Card.vue'

defineProps({
  cards: Array
})
</script>

<template>
  <div class="flex gap-4 flex-wrap justify-center w-full">
    <DeckCard v-for="card in cards" :key="card.id" :card="card" />
  </div>
</template>
