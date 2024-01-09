<script setup>
import Navbar from "@/Components/Navbar.vue";
import { Modal } from "momentum-modal";
import { Head } from "@inertiajs/vue3";
</script>

<template>
	<Head>
		<meta
			content="Discover TechLease - Your Premier Online Rental Destination for Technology Devices. TechLease is a leading online technology rental service offering flexibility, affordability, and accessibility to the latest gadgets. Our extensive inventory includes laptops, smartphones, VR headsets, digital cameras, and more! Ideal for both personal and business use, our eco-conscious solution allows customers to enjoy state-of-the-art technology without lengthy commitments or exorbitant prices. Simplify decision making with our intuitive website, dedicated customer assistance, and streamlined management tools for all your rental needs. Upgrade smarter today with TechLease – where innovation meets responsibility."
			head-key="description"
			name="description"
		/>
		<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	</Head>
	<Navbar />

	<main>
		<slot />
	</main>

	<Modal />
</template>

<style scoped></style>
