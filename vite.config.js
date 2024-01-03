import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";

export default defineConfig({
	resolve: {
		alias: {
			"uikit-util": path.resolve(__dirname, "node_modules/uikit/src/js/util/"),
			"@": path.resolve(__dirname, "resources/js/"),
		},
	},
	plugins: [
		laravel({
			input: ["resources/js/app.js"],
			refresh: true,
		}),
		vue({
			template: {
				transformAssetUrls: {
					base: null,
					includeAbsolute: false,
				},
			},
		}),
	],
});
