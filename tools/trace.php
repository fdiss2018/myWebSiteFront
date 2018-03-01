<?
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    /* fonctionnel */
input {
  display: none;
}
input ~ ul {
 display: none;
}
input:checked ~ ul {
 display: block;
}
input ~ .fa-angle-double-down {
  display: none;
}
input:checked ~ .fa-angle-double-right {
  display: none;
}
input:checked ~ .fa-angle-double-down {
  display: inline;
}

/* habillage */
li {
  display: block;
  font-family: 'Arial';
  font-size: 15px;
  padding: 0.2em;
  border: 1px solid transparent;
}
li:hover {
  border: 1px solid grey;
  border-radius: 3px;
  background-color: lightgrey;
}
  </style>

  <title></title>
<script type='text/javascript'>//<![CDATA[
window.onload=function(){

}//]]> 

</script>

  
</head>

<body>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    
<?
for ( $i=0; $i<count($_SESSION['trace']); $i++){
echo $_SESSION['trace'][$i]."\n";
}
?>  


</body>

</html>






