<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title clickable to="/">
          API Integration
        </q-toolbar-title>

        <div>Quasar v{{ $q.version }}</div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
    >
      <q-list>
        <q-item-label
          header
        >
          Menu
        </q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <keep-alive>
        <router-view />
      </keep-alive>
    </q-page-container>
  </q-layout>
</template>

<script>
import { computed, defineComponent, ref } from 'vue'
import EssentialLink from 'components/EssentialLink.vue'
import axios from 'axios'
import { api } from 'boot/axios'
import { useMainStore } from 'stores/main'

const linksList = [
  {
    title: 'Main',
    icon: 'home',
    link: '/'
  },
  {
    title: 'API services',
    icon: 'private_connectivity',
    link: '/services'
  }
]

export default defineComponent({
  name: 'MainLayout',

  components: {
    EssentialLink
  },

  setup () {
    const store = useMainStore()
    const isLogin = computed(() => store.isLogin)
    const setFlagLogin = () => store.setFlagLogin()

    axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie')
      .then(() => {
        if (isLogin.value === false) {
          api.post('/login', {
            email: 'admin@admin.com',
            password: 'secret'
          }).then(() => {
            setFlagLogin()
          })
        }
      })
    const leftDrawerOpen = ref(false)

    return {
      essentialLinks: linksList,
      store,
      isLogin,
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
