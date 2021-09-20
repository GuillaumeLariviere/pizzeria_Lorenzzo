<?php session_start();

$url = $_SERVER["REQUEST_URI"];
// var_dump($url);
if(count($_POST) > 0){
    $_SESSION['post'] = $_POST;
    header("Location: $url");

}
// else{
//     $_SESSION['post'] = [];
// }

function autoload($className){
    if (strpos($className, "Controller")) {
        $fileName = lcfirst(str_replace("Controller", "", $className));
        require_once "controller/$fileName.controller.php";
    }
    else if (strpos($className, "Entity")) {
        $fileName = lcfirst(str_replace("Entity", "", $className));
        require_once "entity/$fileName.entity.php";
    }
    else if (strpos($className, "Repository")){
        $fileName = lcfirst(str_replace("Repository", "", $className));
        require_once "repository/$fileName.repository.php";
    } 
} //autoload des classes : plus besoin de require :-)
spl_autoload_register("autoload");

require_once 'controller/router.php';
$router = new Router($url);



?>


<?= 
    $router->render() 
?>

<!-- <form method="post">
    <input type="submit" value="coucou" name="toto"/>
</form> -->