<?php
namespace Controllers\Handler;
use Core\Controller;
use Classe\Database;
use Libs\Helper;

class UsuarioHandler extends Controller
{
    function MudaStatus($id,$status)
    {
        header('Content-Type: application/json; Charset=UTF-8');
        if($id > 0 && !empty($status)) {
            $pdo = new Database();

            if($status == "true")
                $status = 1;
            else
                $status = 0;

            echo $pdo->update("Usuario", Array("Ativo" => $status), "UsuarioId = ".$id);
        }
    }


}
?>