import { createSSRApp, h } from 'vue'
import { renderToString } from '@vue/server-renderer'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import createServer from '@inertiajs/server'
import Layout from '@/Layout/App.vue'

import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

createServer((page) => createInertiaApp({
  page,
  render: renderToString,
  resolve: (name) => {
    const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))
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
