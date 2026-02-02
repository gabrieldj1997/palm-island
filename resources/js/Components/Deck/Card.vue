<script setup>
import { ref, computed, provide } from 'vue'
import CardFace from './CardFace.vue'

const props = defineProps({ card: { type: Object, required: true } })

const isFlipped = ref(false)
const isRotated = ref(false)
const flipping = ref(false)
const rotating = ref(false)

const sections = computed(() => {
  const map = {}
  props.card.sections.forEach(s => map[s.section_number] = s)
  return map
})

const currentUpper = computed(() => {
  if (!isFlipped.value) {
    return isRotated.value ? sections.value[2] : sections.value[1]
  }
  return isRotated.value ? sections.value[4] : sections.value[3]
})

const triggerAction = (type) => {
  if (flipping.value || rotating.value) return

  if (type === 'flip') flipping.value = true
  if (type === 'rotate') rotating.value = true

  setTimeout(() => {
    if (type === 'flip') isFlipped.value = !isFlipped.value
    if (type === 'rotate') isRotated.value = !isRotated.value
  }, 600)

  setTimeout(() => {
    flipping.value = false
    rotating.value = false
  }, 600)
}

provide('cardActions', {
  toggleFlip: () => triggerAction('flip'),
  toggleRotate: () => triggerAction('rotate')
})
</script>

<template>
  <div class="relative flex items-center gap-4 perspective">
    <slot name="controls" :toggle-flip="() => triggerAction('flip')" :toggle-rotate="() => triggerAction('rotate')"></slot>

    <div class="w-64 h-96 card-inner relative border-4 border-gray-300 rounded-lg overflow-hidden bg-white shadow-md"
      :class="{
        'is-flipping': flipping,
        'is-rotating': rotating
      }">
      <CardFace :upper-section="currentUpper" :card-name="card.name" />
    </div>
  </div>
</template>