<script setup>
defineProps({
	type: {
		type: String,
		default: "submit",
	},
});
</script>

<template>
	<button :type="type" class="uk-button">
		<slot />
	</button>
</template>

<style scoped></style>
