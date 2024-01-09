<script setup>
defineProps({
	message: String,
});
</script>

<template>
	<div v-show="message">
		<p class="uk-text-danger uk-margin-remove uk-text-small">
			{{ message }}
		</p>
	</div>
</template>
