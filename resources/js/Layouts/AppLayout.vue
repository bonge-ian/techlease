<script setup>
import Navbar from "@/Components/Navbar.vue";
import { Modal } from "momentum-modal";
</script>

<template>
	<Navbar />

	<main>
		<slot />
	</main>

	<Modal />
</template>

<style scoped></style>
