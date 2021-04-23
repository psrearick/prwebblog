import { createApp, h } from 'vue';
import { App, plugin } from '@inertiajs/inertia-vue3';
import titleMixin from "./Shared/Mixins/titleMixin";
import mitt from 'mitt';


const emitter = mitt();

const el = document.getElementById('app');

const app = createApp({
    render: () =>
        h(App, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) =>
                import(`@/Pages/${name}`).then((module) => module.default),
        }),
});
app.use(plugin)
app.mixin(titleMixin);
app.config.globalProperties.emitter = emitter;
app.mount(el);
