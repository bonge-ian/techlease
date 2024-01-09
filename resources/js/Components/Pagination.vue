<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
	data: Object,
	centered: {
		type: Boolean,
		default: true,
	},
});
</script>

<template>
	<div class="uk-margin">
		<ul :class="{ 'uk-flex-center': centered }" class="uk-pagination">
			<template v-for="link in data.links" :key="link.label">
				<li
					:class="{
						'uk-active':
							data.current_page === Number.parseInt(link.label),
						'uk-disabled': !link.url,
					}"
				>
					<template
						v-if="data.current_page === Number.parseInt(link.label)"
					>
						<span v-html="link.label"></span>
					</template>
					<template v-else>
						<template
							v-if="link.label.toLowerCase().includes('previous')"
						>
							<Link
								v-show="link.url"
								:href="link.url ?? ''"
								preserve-scroll
								preserve-state
							>
								<span
									v-if="
										link.label
											.toLowerCase()
											.includes('previous')
									"
									uk-pagination-previous
								></span>
							</Link>
						</template>
						<template
							v-else-if="
								link.label.toLowerCase().includes('next')
							"
						>
							<Link
								v-show="link.url"
								:href="link.url ?? ''"
								preserve-scroll
								preserve-state
							>
								<span
									v-if="
										link.label
											.toLowerCase()
											.includes('next')
									"
									uk-pagination-next
								></span>
							</Link>
						</template>
						<Link
							v-else
							:href="link.url ?? ''"
							preserve-scroll
							preserve-state
							v-html="link.label"
						>
						</Link>
					</template>
				</li>
			</template>
		</ul>
	</div>
</template>

<style scoped></style>
