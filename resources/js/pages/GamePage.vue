<script setup>
import { ref } from 'vue'
import { startGame, sendAction } from '../services/gameApi'
import GameBoard from '../components/GameBoard.vue'
import GameStatus from '../components/GameStatus.vue'

const gameId = ref(null)
const state = ref(null)
const error = ref(null)

async function newGame() {
  try {
    const res = await startGame()
    gameId.value = res.game_id
    state.value = res.state
  } catch (e) {
    error.value = e.message
  }
}

async function action(payload) {
  try {
    const res = await sendAction(gameId.value, payload)
    state.value = res.state
  } catch (e) {
    error.value = e.message
  }
}
</script>

<template>
  <button @click="newGame">Novo Jogo</button>

  <p v-if="error" style="color:red">{{ error }}</p>

  <GameStatus v-if="state" :state="state" />

  <GameBoard
    v-if="state"
    :deck="state.deck"
    @action="action"
  />
</template>
