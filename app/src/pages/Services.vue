<template>
  <div class="q-pa-md">
    <q-form
      @submit="onSubmit"
      class="q-gutter-md"
      style="max-width: 350px"
    >
      <q-select
        clearable
        clear-icon="close"
        v-model="service"
        :options="['services']"
        @update:model-value="onReset"
        emit-value
        map-options
        label="Service"
      />
      <q-tab-panels v-if="service" v-model="service" animated>
        <q-tab-panel name="numbers">
          <Numbers v-model="model" label="Numbers" />
        </q-tab-panel>

        <q-tab-panel name="jservice">
          <JService v-model="model" label="JService"/>
        </q-tab-panel>
      </q-tab-panels>
      <div>
        <q-btn label="Submit" type="submit" color="primary"/>
      </div>
    </q-form>
    <div class="q-py-md" style="max-width: 500px">
      <q-input
        v-if="service === 'numbers' && result"
        v-model="result"
        filled
        readonly
        type="textarea"
      />
      <JsonViewer v-if="service === 'jservice' && result" :value="result" copyable boxed sort theme="light" />
    </div>
  </div>
</template>

<script>
import { useQuasar } from 'quasar'
import { computed, defineComponent, onMounted, ref, watch } from 'vue'
import { useMainStore } from 'stores/main'
import { api } from 'boot/axios'
import Numbers from 'components/Numbers.vue'
import JService from 'components/JService.vue'
import { JsonViewer } from 'vue3-json-viewer'

export default defineComponent({
  name: 'IndexPage',
  components: {
    Numbers,
    JService,
    JsonViewer
  },
  setup () {
    const $q = useQuasar()
    const service = ref(null)
    const model = ref(null)
    const services = ref(null)
    const result = ref(null)

    const store = useMainStore()
    const isLogin = computed(() => store.isLogin)

    function getServices () {
      api.get('/service')
        .then(response => {
          services.value = response.data
        })
    }

    watch(isLogin, () => {
      if (isLogin.value === true) {
        getServices()
      }
    })

    onMounted(() => {
      if (isLogin.value === true) {
        getServices()
      }
    })

    return {
      service,
      model,
      store,
      isLogin,
      services,
      result,

      onSubmit () {
        api.post('/send', { service: service.value, data: model.value })
          .then(response => {
            result.value = service.value === 'numbers' ? response.data.data : JSON.parse(response.data.data)
            $q.notify({
              color: 'green-4',
              textColor: 'white',
              icon: 'cloud_done',
              message: 'Submitted',
              position: 'top-right'
            })
          })
      },

      onReset () {
        model.value = null
        result.value = null
      }
    }
  }
})
</script>
