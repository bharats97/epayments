<!DOCTYPE html>
<html>
<head>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="../../resources/js/switch_form_tab.js"></script>
	<link rel="stylesheet" type="text/css" href="../../resources/css/tab_style_form.css"> 
	<link rel="stylesheet" href="../resources/css/Header.css">
	<title>E-payments</title>
</head>
<body>
<nav class='header'>
	<a href="#" class='link'>
		<span class="brand-name">E-Pay</span>
	</a>
	<div class='space'></div>
	<a href="#" class='link'>
        <? if (isset($_SESSION['name'])): ?>
	  		 <span class='login'><? echo $_SESSION['name']; ?> </span>
		<? endif; ?>
    </a>
</nav>
