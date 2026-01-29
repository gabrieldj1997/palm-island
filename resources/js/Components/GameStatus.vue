<script setup>
defineProps({ state: Object })
</script>

<template>
  <div>
    <p>Turno: {{ state.turn }}</p>
    <p>Estrelas: {{ state.total_stars }}</p>
  </div>
</template>
