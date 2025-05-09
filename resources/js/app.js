import './bootstrap';
import '../css/app.css';
import '../css/_variable.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from "ziggy-js/dist/vue";
import ElementPlus from 'element-plus'
import vi from "element-plus/es/locale/lang/vi";
import 'element-plus/dist/index.css'
import * as ElementPlusIconsVue from '@element-plus/icons-vue'
import "bootstrap-icons/font/bootstrap-icons.css";
import { createPinia } from 'pinia'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const pinia = createPinia()

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(pinia)
            .use(ElementPlus, {
                locale: vi,
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
