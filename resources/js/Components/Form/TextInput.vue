<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({ required: true });
const input = ref(null);

onMounted(() => {
	if (input.value.hasAttribute("autofocus")) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
	<input ref="input" v-model="model" class="uk-input" />
</template>
