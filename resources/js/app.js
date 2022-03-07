import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from '@/Layout/App.vue'

createInertiaApp({
  resolve: name => {
    const page = require(`./Pages/${name}`).default
    if (page.layout === undefined) page.layout = Layout
    return page
  },
  setup ({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .mixin({ methods: { route: window.route } })
      .mount(el)
  }
})

InertiaProgress.init()
