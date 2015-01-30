<?php
/**
 * Controller
 *
 * Titulo: Musicas
 * Autor: renalcio.freitas
 * Data: 26/01/2015
 *
 */
namespace Controllers;
use Core\Controller;
use DAL\Musica;
use Libs\Helper;
use Libs\ModelState;

class musicaController extends Controller
{

    public function index()
    {
        $this->loadBLL();
        $Model = new \stdClass();
        $Model = $this->model->GetToIndex($Model);
        $this->ModelView($Model);
    }

    public function cadastro($id = 0)
    {
        // load views
        $this->loadBLL();
        $Model = new Musica();
        $Model->MusicaId = $id;
        $Model = $this->model->GetToEdit($Model);
        $this->ModelView($Model);

    }

    public function cadastro_post($model = null){

        if($model!=null) {
            $model = (object)$model;
            Helper::cast($model, "DAL\\Musica");
            $this->loadBLL();

            //Valida Model via ModelState
            ModelState::ValidateModel($model);

            if(ModelState::isValid()) {
                //Valida model via Model
                $this->model->Validar($model);

                if(ModelState::isValid()) {
                    $this->model->Save($model); // Salva
                    $this->Redirect("Index"); // Redireciona pra index do controller
                }
            }
        }else{
            $model = new Musica();
        }

        $this->ModelView($model);
    }

    public function deletar($id){
        if($id > 0){
            $this->loadBLL();
            $this->model->Deletar($id);
        }

        $this->Redirect("Index");
    }
}