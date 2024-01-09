<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		  content="Discover TechLease - Your One-Stop Online Rental Destination for State-of-the-art Technology Devices. TechLease offers a vast selection of premium technology devices available for flexible rental-periods, catering to individual and business needs alike. Browse our extensive inventory including laptops, smartphones, VR headsets, digital cameras, and more! Our easy-to-use website ensures a smooth experience when choosing and managing your tech rentals. Enjoy cost savings, reduced e-waste, and expert customer support every step of the way at TechLease – The Smarter Way To Access Innovative Technologies!">

	<title inertia>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link href="https://fonts.cdnfonts.com/css/instrument-sans" rel="stylesheet">
	<link href="https://fonts.cdnfonts.com/css/manjari-2" rel="stylesheet">
	<link href="https://fonts.cdnfonts.com/css/albert-sans" rel="stylesheet">

	<!-- Scripts -->
	@routes
	@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
	@inertiaHead
</head>
<body class="font-sans antialiased">
	@inertia
</body>
</html>
