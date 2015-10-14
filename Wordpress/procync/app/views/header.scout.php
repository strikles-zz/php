<!DOCTYPE html>
<html class="no-js" {{ language_attributes() }}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <title>{{ isset($page_title) ? $page_title : wp_title('-', true, 'right').' '.bloginfo('name') }}</title> -->
    <title>Procync</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.7.1/loading-bar.min.css' type='text/css' media='all' />

    {{ wp_head() }}

    <base href="/reporting">

</head>

<body {{ body_class() }}>
