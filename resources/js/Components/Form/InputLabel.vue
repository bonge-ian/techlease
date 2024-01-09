<script setup>
defineProps({
	value: String,
});
</script>

<template>
	<label class="uk-form-label">
		<span v-if="value">{{ value }}</span>
		<span v-else><slot /></span>
	</label>
</template>

<style scoped></style>
