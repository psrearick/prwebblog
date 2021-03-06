import { createApp, h } from "vue";
import { App, plugin } from "@inertiajs/inertia-vue3";
import TitleMixin from "./Shared/Mixins/TitleMixin";
import { InertiaProgress } from "@inertiajs/progress";
import mitt from "mitt";

require("./bootstrap");
InertiaProgress.init();

const emitter = mitt();

const el = document.getElementById("app");

const app = createApp({
    render: () =>
        h(App, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) =>
                import(`@/Pages/${name}`).then((module) => module.default),
        }),
});
app.use(plugin);
app.mixin(TitleMixin);
app.config.globalProperties.emitter = emitter;
app.mount(el);
