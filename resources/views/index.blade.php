@if (app()->environment('testing'))
    <link rel="stylesheet" href="/assets/fake.css">
@else
    @vite(['resources/css/app.css'])
@endif

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield("title")</title>
</head>
<body>
	@include("components.header")
	@yield("main")
	@include("components.footer")
</body>
</html>