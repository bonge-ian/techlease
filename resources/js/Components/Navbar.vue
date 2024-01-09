<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
	<header
		class="uk-sticky"
		uk-sticky="sel-target: .uk-navbar-container;cls-active: uk-navbar-sticky"
	>
		<div class="uk-navbar-container">
			<div class="uk-container uk-container-xlarge">
				<nav
					class="uk-navbar"
					uk-navbar="container: .uk-sticky;boundary: .uk-sticky .uk-navbar-container;dropbar-transparent-mode: remove;"
				>
					<div class="uk-navbar-left">
						<a :href="route('home')" class="uk-inline">
							<img
								:alt="
									$page.props.config['app.name'] ??
									'Tech Lease'
								"
								height="320"
								loading="eager"
								src="../../images/logos/tech-lease-320.webp"
								uk-cover=""
								width="320"
							/>
							<canvas height="60" width="60"></canvas>
						</a>
						<ul class="uk-navbar-nav uk-visible@m">
							<li>
								<a href="#">Categories</a>
							</li>
							<li><a href="#">Best Deals</a></li>
							<li><a href="#">How it works</a></li>
							<li><a href="#">Contact us</a></li>
						</ul>
					</div>

					<div class="uk-navbar-right">
						<ul class="uk-navbar-nav">
							<li>
								<a
									class="as-icon"
									href="#search-modal"
									uk-icon="icon: search"
									uk-toggle
									uk-tooltip="title: Search for product"
								></a>
							</li>
							<li
								v-if="!$page.props.auth.user"
								class="uk-visible@m"
							>
								<a
									class="as-icon"
									href="#"
									uk-icon="icon: sign-in"
									uk-tooltip="Sign In"
								></a>
							</li>
							<li
								v-if="!$page.props.auth.user"
								class="uk-visible@m"
							>
								<a
									class="as-icon"
									href="#"
									uk-icon="icon: sign-out"
									uk-tooltip="Sign Up"
								></a>
							</li>
							<li
								v-if="$page.props.auth.user"
								class="uk-visible@m"
							>
								<a
									class="as-icon"
									href="#"
									uk-icon="icon: user"
									uk-tooltip="Dashboard"
								></a>
							</li>
						</ul>
						<a
							aria-label="Open menu"
							class="uk-navbar-toggle uk-navbar-toggle-animate uk-icon uk-navbar-toggle-icon uk-hidden@m"
							href="#mobile-menu"
							role="button"
							uk-navbar-toggle-icon=""
							uk-toggle=""
						>
						</a>
					</div>
				</nav>
			</div>
		</div>
	</header>

	<!-- mobile menu -->
	<div
		id="mobile-menu"
		class="uk-dropbar uk-dropbar-top uk-drop"
		uk-drop="
			mode: click;
			flip:false;
			pos: bottom-left;
			target: .uk-sticky .uk-navbar-container;
			stretch: true;
			bg-scroll: false;
			toggle: false;
			animation: reveal-top;
			animate-out: true;
			duration: 300;
			container: .uk-sticky
		"
	>
		<div class="drop-bar-container uk-flex uk-flex-column">
			<div class="uk-margin-auto-bottom">
				<div
					class="uk-grid uk-child-width-1-1 uk-grid-stack"
					uk-grid=""
				>
					<div class="uk-first-column">
						<div class="uk-panel">
							<ul
								class="uk-nav uk-nav-default uk-nav-divider"
								uk-nav
							>
								<li
									v-for="item in [1, 2, 3, 4]"
									:key="JSON.stringify([1, 2, 3, 4])"
								>
									<Link href="#"> Link {{ item }}</Link>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-grid-margin">
				<div class="uk-grid uk-child-width-1-1">
					<div>
						<div class="uk-panel">
							<div
								class="uk-grid uk-child-width-1-1 uk-grid-margin"
								uk-grid
							>
								<div class="uk-width-1-1">
									<div class="uk-h5 uk-margin-small">
										Explore More
									</div>
									<div class="uk-margin-remove-top">
										<ul
											class="uk-margin-remove-bottom uk-nav uk-nav-default"
										>
											<li>
												<Link href="#">
													New Arrivals
												</Link>
											</li>
											<li>
												<Link href="#">
													Best Deals
												</Link>
											</li>
											<li>
												<Link href="#">
													How It Works
												</Link>
											</li>
											<li>
												<a href="#" uk-scroll="">
													FAQ
												</a>
											</li>
											<li>
												<a href="#" uk-scroll="">
													Contact
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div
								class="uk-grid uk-child-width-1-1 uk-margin"
								uk-grid
							>
								<div class="uk-width-1-1">
									<div
										class="uk-margin"
										uk-scrollspy="target: [uk-scrollspy-class];"
									>
										<div
											class="uk-child-width-auto uk-grid-medium uk-flex-inline uk-grid"
											uk-grid=""
										>
											<div class="uk-first-column">
												<a
													class="el-link uk-icon-link"
													href="https://www.facebook.com/yootheme"
													rel="noreferrer"
													target="_blank"
												>
													<span
														class="uk-icon"
														uk-icon="icon: facebook;"
													></span>
												</a>
											</div>
											<div>
												<a
													class="el-link uk-icon-link"
													href="https://twitter.com/yootheme?lang=en"
													rel="noreferrer"
													target="_blank"
												>
													<span
														class="uk-icon"
														uk-icon="icon: twitter;"
													></span>
												</a>
											</div>
											<div>
												<a
													class="el-link uk-icon-link"
													href="https://www.instagram.com/"
													rel="noreferrer"
													target="_blank"
												>
													<span
														class="uk-icon"
														uk-icon="icon: instagram;"
													></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>
.uk-sticky-fixed
	> .uk-navbar-container:not(.uk-navbar):not(.uk-navbar-transparent) {
	transition: 0.2s linear;
	transition-property: padding;
}

:not(.uk-sticky-below) > .uk-navbar-container:not(.uk-navbar) {
	padding-top: 1.25rem;
	padding-bottom: 1.25rem;
}

.drop-bar-container {
	min-height: 100%;
}
</style>
