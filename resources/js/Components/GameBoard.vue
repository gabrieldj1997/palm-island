<script setup>
defineProps({
  deck: Object
})

const emit = defineEmits(['action'])

function discard() {
  emit('action', { type: 'discard_card' })
}
</script>

<template>
  <div>
    <h3>Deck</h3>

    <div style="display:flex">
      <div
        v-for="card in deck.cards"
        :key="card.card_id"
        style="border:1px solid #ccc; margin:5px; padding:10px"
      >
        {{ card.card.name }}
      </div>
    </div>

    <button @click="discard">Descartar carta</button>
  </div>
</template>
