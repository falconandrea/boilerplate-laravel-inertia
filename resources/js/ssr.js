import { createSSRApp, h } from 'vue'
import { renderToString } from '@vue/server-renderer'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import createServer from '@inertiajs/server'
import Layout from '@/Layout/App.vue'

createServer((page) => createInertiaApp({
  page,
  render: renderToString,
  resolve: name => {
    const page = require(`./Pages/${name}`).default
    if (page.layout === undefined) page.layout = Layout
    return page
  },
  setup ({ app, props, plugin }) {
    return createSSRApp({
      render: () => h(app, props)
    }).use(plugin)
      .component('Link', Link)
  }
}))
