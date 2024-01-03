import "./bootstrap";
import "./uikit";

import "../scss/app.scss";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { modal } from "momentum-modal";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
	title: (title) => `${title} - ${appName}`,
	resolve: (name) =>
		resolvePageComponent(
			`./Pages/${name}.vue`,
			import.meta.glob("./Pages/**/*.vue"),
		),
	setup({ el, App, props, plugin }) {
		return createApp({ render: () => h(App, props) })
			.use(plugin)
			.use(modal, {
				resolve: (name) =>
					resolvePageComponent(
						`./Modals/${name}.vue`,
						import.meta.glob("./Modals/**/*.vue"),
					),
			})
			.use(ZiggyVue, Ziggy)
			.mount(el);
	},
	progress: {
		color: "#ca56b6",
		showSpinner: true,
	},
});
