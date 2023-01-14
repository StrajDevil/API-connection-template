<template>
  <div class="text-h6">{{ label }}</div>
  <q-select
    v-model="type"
    :options="typeOptions"
    @update:model-value="this.update('type', $event)"
    @clear="this.clear"
    :rules="[val => !!val || 'Required']"
    clearable
    clear-icon="close"
    emit-value
    map-options
    label="Type"
  />
  <div v-if="type">
    <q-input
      v-model="firstNumber"
      @update:model-value="this.update('firstNumber', $event)"
      type="number"
      :label="getLabel()"
    />
    <q-input
      v-if="type === 'date'"
      v-model="secondNumber"
      @update:model-value="this.update('secondNumber', $event)"
      type="number"
      label="Month"
    />
  </div>
</template>

<script>

import { onMounted, ref } from 'vue'
import { api } from 'boot/axios'

export default {
  name: 'NumberService',
  props: {
    label: {
      type: String,
      default: () => ''
    },
    modelValue: {
      type: Object,
      default: () => null
    }
  },
  emits: ['update:modelValue'],
  methods: {
    getLabel () {
      switch (this.type) {
        case 'date':
          return 'Day'
        default:
          return 'Number'
      }
    }
  },
  setup (props, { emit }) {
    const type = ref(null)
    const typeOptions = ref(null)
    const firstNumber = ref(null)
    const secondNumber = ref(null)

    function update (key, value) {
      const numbers = Object.assign({}, props.modelValue, { [key]: value })
      emit('update:modelValue', numbers)
    }
    function clear () {
      this.firstNumber = ref()
      this.secondNumber = ref()
      const numbers = {}
      emit('update:modelValue', numbers)
    }
    function getTypeOptions () {
      api.get('/numbers-types')
        .then(response => {
          typeOptions.value = response.data
        })
    }

    onMounted(() => {
      getTypeOptions()
    })

    return {
      type,
      typeOptions,
      firstNumber,
      secondNumber,
      update,
      clear
    }
  }
}
</script>

<style scoped>

</style>
