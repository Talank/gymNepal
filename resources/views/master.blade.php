<!DOCTYPE html>
<html>
<head>
	<title>GymNepal</title>
	<link rel="shortcut icon" href="Images/bulls.png" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<meta name="_token" content="{{ csrf_token() }}"/>
</head>
<body id="body">
	@include ('components.header')
	@yield('content')
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/java4.js"></script>
	<script type="text/javascript" src="../js/form.js"></script>
</html>