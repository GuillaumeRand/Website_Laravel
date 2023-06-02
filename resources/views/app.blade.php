<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel with Inertia</title>
		@vite
        @routes

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    </head>
	<body class="antialiased font-sans bg-gray-200">
		@inertia
	</body>
</html>
