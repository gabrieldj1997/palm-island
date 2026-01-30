<script setup>
import { computed, ref } from 'vue'
import CardFace from './CardFace.vue'
import { getIcon, getGifIcon } from '@/utils'

const props = defineProps({
  card: {
    type: Object,
    required: true,
  }
})

const isFlipped = ref(false)
const isRotated = ref(false)

const sections = computed(() => {
  const map = {}
  props.card.sections.forEach(section => {
    map[section.section_number] = section
  })
  return map
})

const currentUpper = computed(() => {
  if (!isFlipped.value) {
    return isRotated.value ? sections.value[2] : sections.value[1]
  }
  return isRotated.value ? sections.value[4] : sections.value[3]
})

const currentLower = computed(() => {
  if (!isFlipped.value) {
    return isRotated.value ? sections.value[1] : sections.value[2]
  }
  return isRotated.value ? sections.value[3] : sections.value[4]
})
</script>

<template>
  <div class="relative flex items-center gap-2">
    <div class="flex flex-col gap-4">
      <button class="group relative w-10 h-10 bg-gray-100 rounded-md overflow-hidden border-2 border-black rounded-lg border-solid gap-4"
        @click="isRotated = !isRotated">
        <img :src="getGifIcon('rotate')"
          class="absolute w-full h-full object-contain opacity-0 group-hover:opacity-100 transition-opacity duration-200 transform scale-125" />

        <img :src="getIcon('rotate')"
          class="relative z-10 w-full h-full object-contain group-hover:opacity-0 transition-opacity duration-200" />
      </button>

      <button class="group relative w-10 h-10 flex items-center justify-center bg-gray-100 rounded-md overflow-hidden border-2 border-black rounded-lg border-solid"
        @click="isFlipped = !isFlipped">
        <img :src="getGifIcon('flip')"
          class="absolute w-full h-full object-contain opacity-0 group-hover:opacity-100 transition-opacity duration-200 transform scale-125" />

        <img :src="getIcon('flip')"
          class="relative z-10 w-full h-full object-contain group-hover:opacity-0 transition-opacity duration-200" />
      </button>
    </div>
    <div
      class="w-64 h-96 border rounded-lg bg-white shadow-md overflow-hidden border-4 border-gray-300 rounded-lg border-solid">
      <CardFace :upper-section="currentUpper" :lower-section="currentLower" :card-name="card.name" />
    </div>


  </div>
</template>
