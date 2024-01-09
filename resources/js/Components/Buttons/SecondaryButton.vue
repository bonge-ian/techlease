<script setup>
import BaseButton from "@/Components/Buttons/BaseButton.vue";

defineProps({
	type: {
		type: String,
		default: "submit",
	},
});
</script>

<template>
	<BaseButton :type="type" class="uk-button-secondary">
		<slot />
	</BaseButton>
</template>

<style scoped></style>
