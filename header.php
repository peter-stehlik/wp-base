<!DOCTYPE html>
<html lang="sk">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<meta name="author" content="INOVATIVE">
	<meta name="robots" content="noodp">
	
	<title><?php if ( is_front_page() ) { _e('SEO popis činnosti firmy'); } else { the_title(); } ?> | Názov firmy</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
		
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,latin-ext' rel='stylesheet'>
	
	<link href="<?php echo get_template_directory_uri(); ?>/css/base.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>
<body>