<script setup>
const checked = defineModel("checked");
// const emit = defineEmits(["update:checked"]);
// const props = defineProps({
// 	// checked: {
// 	// 	type: [Array, Boolean],
// 	// 	default: false,
// 	// },
// 	value: {
// 		type: String,
// 		default: null,
// 	},
// });

// const proxyChecked = computed({
// 	get() {
// 		return props.checked;
// 	},
//
// 	set(val) {
// 		emit("update:checked", val);
// 	},
// });
</script>

<template>
	<input v-model="checked" class="uk-checkbox" type="checkbox" />
	<!--	<input-->
	<!--		v-model="proxyChecked"-->
	<!--		:value="value"-->
	<!--		class="uk-checkbox"-->
	<!--		type="checkbox"-->
	<!--	/>-->
</template>

<style scoped></style>
