<?php  
//ruta de la biblioteca xajax  
require_once("xajax/xajax_core/xajax.inc.php");  
$xajax = new xajax();  
  
$xajax->registerFunction("reloj");  
function reloj($elemento){  
  
    $html = "<div style='margin: auto; text-align: center;'><span style='Color: #060; '>".date("H:m s")."</span></div>";  
      
    $objResponse = new xajaxResponse();  
    $objResponse->assign($elemento,"innerHTML", $html);      
    return $objResponse;  
}  
  
$xajax->processRequest();  
$xajax->configure('javascript URI', 'xajax/');  
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
<head>      
    <meta name="author" content="Manfred Rodriguez" />      
    <title>Ejemplo Xajax</title>  
    <?php      
    $xajax->printJavascript();     
    ?>  
    <script charset="UTF-8" type="text/javascript">  
        function reloj(){  
            setInterval("xajax_reloj('mireloj')",1000);  
        }  
    </script>  
</head>  
  
<body onload='reloj()'>     
    <div id="mireloj"></div>  
</body>  
</html>
