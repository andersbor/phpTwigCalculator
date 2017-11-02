<?php
if (isset($_REQUEST['a']) and isset($_REQUEST['b'])) {
    $a = $_REQUEST['a'];
    $b = $_REQUEST['b'];
    $operation = $_REQUEST['operation'];
    switch ($operation) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
        case '/':
            $result = $a / $b;
            break;
    }

} else {
    $a = "";
    $b = "";
    $result = "";
    $operation = "+";
}

require_once 'vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    //'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));

$template = $twig->loadTemplate('calculator.html.twig');

$parametersToTwig = array('a' => $a, 'b' => $b, 'operation' => $operation, 'result' => $result);
echo $template->render($parametersToTwig);

?>