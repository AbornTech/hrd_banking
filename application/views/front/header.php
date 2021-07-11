<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= trim(@$pageData->page_meta_title) ?></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="identifier-url" content="<?= base_url(); ?>" />
    <meta name="description" content="<?= trim(@$pageData->page_meta_description); ?>" />
    <meta name="keywords" content="<?= trim(@$pageData->page_meta_keyword); ?>" />
    <meta name="theme-color" content="#317EFB" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon_io/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
    
    <link rel="canonical" href="<?= rtrim(base_url(), "/") ?><?= @$pageData->page_alias ? '/' . @$pageData->page_alias : strtolower(rtrim($_SERVER['REQUEST_URI'], "/")) ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>css/light.css" rel="stylesheet">
    
     
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
     