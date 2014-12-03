<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
namespace Controllers;
use Core\Controller;
class Apps extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $model = new \stdClass();
        $this->loadModel();
        $model->ListApps = $this->model->getApps();

        $this->ModelView($model);
    }

    public function cadastro($id = 0)
    {
        $Model = new \stdClass;
        $Model->AplicacaoId = $id;
        $this->loadModel();

        $Model = $this->model->GetToEdit($Model);

        $this->ModelView($Model);
    }
}
