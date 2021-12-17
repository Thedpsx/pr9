<?php
class Route{
   function loadPage($db, $controllerName, $actionName = 'index'){
       include_once 'app/Controllers/IndexController.php';
       include_once 'app/Controllers/UserController.php';
       include_once 'app/Controllers/RoleController.php';

       switch ($controllerName) {
           case 'users':
               $controller = new UsersController($db);
               break;
            case 'roles':
               $controller = new RolesController($db);
               break;   
           default:
               $controller = new IndexController($db);
       }
       // запускаємо необхідний метод
       $controller->$actionName();
   }
}
