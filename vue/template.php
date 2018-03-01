<!DOCTYPE HTML>
<!--
ZeroFour by HTML5 UP
html5up.net | @n33co
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
<title><?=$dConfig['VuePrincipal']['title']. phpversion()?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./asset/css/bootstrap.cpl1.css">

</head>
<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
            <!-- Header -->
        <?php include $this->config['VuePrincipal']['urlZone1'];?>
        
        <!-- Main Wrapper -->
        <?php include $this->config['VuePrincipal']['urlZone2A'];?>
        <?php include $this->config['VuePrincipal']['urlZone2B'];?>
        
        <!-- Footer Wrapper -->
        <?php include $this->config['VuePrincipal']['urlZone3'];?>
    </div>
</body>
</html>
