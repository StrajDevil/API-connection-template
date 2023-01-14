<template>
  <div class="text-h6">{{ label }}</div>
  <q-input
    v-model="value"
    type="number"
    label="Count"
    dense
  />
</template>

<script>
import { computed } from 'vue'

export default {
  name: 'JService',
  props: {
    label: {
      type: String,
      default: () => ''
    },
    modelValue: {
      type: Number,
      default: () => null
    }
  },
  emits: ['update:modelValue'],
  setup (props, { emit }) {
    const value = computed({
      get: () => props.modelValue,
      set: val => emit('update:modelValue', val)
    })

    return {
      value
    }
  }
}
</script>

<style scoped>

</style>
