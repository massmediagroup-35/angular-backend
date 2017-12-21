<?php
/**
 * Created by PhpStorm.
 * User: vasyl
 * Date: 21.12.17
 * Time: 16:05
 */

namespace AppBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get as Get;
use FOS\RestBundle\Controller\FOSRestController;

class UsersController extends FOSRestController
{

    /**
     * @Get("/users/current", name="api_")
     */
    public function currentAction()
    {
        $view = $this->view(['user' => $this->getUser()]);
        return $this->handleView($view);
    }
}