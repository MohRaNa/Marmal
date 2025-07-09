import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import PrimeVue from "primevue/config"
import Aura from "@primevue/themes/aura"
import { Ripple, ToastService } from 'primevue';
import { Tooltip } from 'primevue';
import { ConfirmationService } from 'primevue';
import 'primeicons/primeicons.css';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ConfirmationService)
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: {
                    preset: Aura
                },
                ripple: true
            })
            .use(ToastService)
            .directive('tooltip', Tooltip)
            .directive('ripple', Ripple)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

