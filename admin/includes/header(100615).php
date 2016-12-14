<?php ob_start();
session_start();?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Yukon Admin HTML v1.3 (dashboard)</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <!-- bootstrap framework -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <!-- icon sets -->
            <!-- elegant icons -->
                <link href="assets/icons/elegant/style.css" rel="stylesheet" media="screen">
            <!-- elusive icons -->
                <link href="assets/icons/elusive/css/elusive-webfont.css" rel="stylesheet" media="screen">
            <!-- flags -->
                <link rel="stylesheet" href="assets/icons/flags/flags.css">
            <!-- scrollbar -->
            <link rel="stylesheet" href="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <!-- google webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- main stylesheet -->
		<link href="assets/css/main.min.css" rel="stylesheet" media="screen" id="mainCss">
        <!-- moment.js (date library) -->
        <script src="assets/js/moment-with-langs.min.js"></script>
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- jQuery Cookie -->
        <script src="assets/js/jqueryCookie.min.js"></script>
        <!-- Bootstrap Framework -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- retina images -->
        <script src="assets/js/retina.min.js"></script>
        <!-- switchery -->
        <script src="assets/lib/switchery/dist/switchery.min.js"></script>
        <!-- typeahead -->
        <script src="assets/lib/typeahead/typeahead.bundle.min.js"></script>
        <!-- fastclick -->
        <script src="assets/js/fastclick.min.js"></script>
        <!-- match height -->
        <script src="assets/lib/jquery-match-height/jquery.matchHeight-min.js"></script>
        <!-- scrollbar -->
        <script src="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Yukon Admin functions -->
        <script src="assets/js/yukon_all.min.js"></script>
	    <!-- page specific plugins -->
        <!-- c3 charts -->
        <script src="assets/lib/d3/d3.min.js"></script>
        <script src="assets/lib/c3/c3.min.js"></script>
        <!-- vector maps -->
        <script src="assets/lib/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/lib/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <!-- countUp animation -->
        <script src="assets/js/countUp.min.js"></script>
        <!-- easePie chart -->
        <script src="assets/lib/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script>
            $(function() {
                // c3 charts
                yukon_charts.p_dashboard();
                // countMeUp
                yukon_count_up.init();
                // easy pie chart
                yukon_easyPie_chart.p_dashboard();
                // vector maps
                yukon_vector_maps.p_dashboard();
                // match height
                yukon_matchHeight.p_dashboard();
            })
        </script>
        
        
    </head>