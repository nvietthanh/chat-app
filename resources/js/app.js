import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from "ziggy-js/dist/vue";
import ElementPlus from 'element-plus'
import vi from "element-plus/es/locale/lang/vi";
import 'element-plus/dist/index.css'
import * as ElementPlusIconsVue from '@element-plus/icons-vue'
import "bootstrap-icons/font/bootstrap-icons.css";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(ElementPlus, {
                locale: vi,
            })
            .mixin({ methods: { appRoute: route } })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
