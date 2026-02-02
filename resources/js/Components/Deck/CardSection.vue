<script setup>
import { inject } from 'vue'
import { getBackground, getIcon } from '@/utils'

const props = defineProps({
  section: {
    type: Object,
    required: true
  },
  cardName: {
    type: String,
    required: true
  }
})

const actionIcons = {
  1: 'purchase_action',
  2: 'rotate_action',
  3: 'flip_action'
}

const { toggleFlip, toggleRotate } = inject('cardActions')
</script>

<template>
  <div class="h-full flex flex-col text-xs overflow-hidden" :style="{
    backgroundImage: `linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%), url(${getBackground(props.cardName)})`,
    backgroundSize: '100% 100%',
    backgroundPosition: 'center',
    backgroundRepeat: 'no-repeat',
    color: 'white',
    textShadow: '1px 1px 2px rgba(0,0,0,0.8)'
  }">
    <div class="flex flex-row w-full justify-between">
      <div class="text-lg tracking-wider leading-tight font-agentOrange p-1">{{ section.card_id }}</div>
      <div class="text-lg tracking-wider leading-tight font-agentOrange p-1">{{ section.section_number }}</div>
    </div>
    <div class="h-1/4 flex justify-center items-center p-2">
      <div v-if="section.wood_resource > 0" class="flex">
        <img v-for="n in section.wood_resource" :key="'wood-' + n" :src="getIcon('wood')"
          class="w-10 h-10 object-contain" />
      </div>
      <div v-if="section.fish_resource > 0" class="flex">
        <img v-for="n in section.fish_resource" :key="'fish-' + n" :src="getIcon('fish')"
          class="w-10 h-10 object-contain" />
      </div>
      <div v-if="section.stone_resource > 0" class="flex">
        <img v-for="n in section.stone_resource" :key="'stone-' + n" :src="getIcon('stone')"
          class="w-10 h-10 object-contain" />
      </div>
    </div>

    <div class="h-2/4 flex flex-row items-center justify-between px-2 font-bold uppercase">
      <div class="flex items-center gap-1">
        <img :src="getIcon('star')" class="w-6 h-6 object-contain" />
        <span>{{ section.stars }}</span>
      </div>

      <div class="text-center">
        <div class="text-lg tracking-wider leading-tight font-agentOrange">{{ cardName }}</div>
      </div>

      <div class="flex items-center gap-1">
        <span>{{ section.improvements }}</span>
        <img :src="getIcon('improvements')" class="w-6 h-6 object-contain" />
      </div>
    </div>

    <div class="h-4/8 grid grid-rows-3 gap-1 p-2 items-center">
      <div v-for="(action) in section.actions" :key="action.id" class="flex items-center gap-3 p-2 bg-white/20 rounded-sm w-full h-full max-h-[40px] 
         cursor-pointer hover:bg-white/40 active:scale-95 transition-all"
        @click="action.type === 2 ? toggleRotate() : action.type === 3 ? toggleFlip() : null">
        {{ action.id }}
        <img :src="getIcon(actionIcons[action.type])" class="w-6 h-6 object-contain" />
        <div class="flex items-center gap-2">
          <div v-if="action.wood_cost" class="flex items-center gap-1">
            <img :src="getIcon('wood')" class="w-5 h-5 object-contain" />
            <span class="font-bold">{{ action.wood_cost }}</span>
            <div v-if="[64, 71, 72, 75, 77, 79].includes(action.id) && (action.fish_cost || action.stone_cost)">/</div>
          </div>
          <div v-if="action.fish_cost" class="flex items-center gap-1">
            <img :src="getIcon('fish')" class="w-5 h-5 object-contain" />
            <span class="font-bold">{{ action.fish_cost }}</span>
            <div v-if="[64, 71, 72, 75, 77, 79].includes(action.id) && action.stone_cost">/</div>
          </div>
          <div v-if="action.stone_cost" class="flex items-center gap-1">
            <img :src="getIcon('stone')" class="w-5 h-5 object-contain" />
            <span class="font-bold">{{ action.stone_cost }}</span>
          </div>
          <div v-if="!action.wood_cost && !action.fish_cost && !action.stone_cost">
            <span class="font-bold text-green-400">GRÁTIS</span>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>