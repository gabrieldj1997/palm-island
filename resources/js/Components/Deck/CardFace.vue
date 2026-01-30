<script setup>
import CardSection from './CardSection.vue'

defineProps({
  upperSection: {
    type: Object,
    required: true
  },
  lowerSection: {
    type: Object,
    required: true
  },
  cardName: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div class="h-full flex flex-col">
    <div class="flex-1 border-b">
      <CardSection
        :section="upperSection"
        :card-name="cardName"
      />
    </div>
  </div>
</template>
