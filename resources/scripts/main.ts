import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { importPageComponent } from '@/scripts/vite/import-page-component'

createInertiaApp({
	resolve: (name) => importPageComponent(name, import.meta.glob('../views/pages/**/*.vue')),
	setup({ el, app, props, plugin }) {
		const vueApp = createApp({ render: () => h(app, props) });

    vueApp.config.globalProperties.$filters = {
      truncate(value : string, char : number = 20) {
        if (value.length > char)
          return value.substring(0, char) + "...";
        return value;
      }
    }

    vueApp.use(plugin).mount(el);
	},
})
