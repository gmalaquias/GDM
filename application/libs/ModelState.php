<?php
/**
 * User: gabriel.malaquias
 * Date: 10/12/2014
 * Time: 15:06
 */

namespace Libs;

use Libs\Annotation\Annotation;

class ModelState {

    public static $errors = array();


    public static function addError($erro){
        array_push(self::$errors, $erro);
    }

    public static function getErrors(){
        return self::$errors;
    }

    public static function isValid(){
        if(count(self::$errors) == 0)
            return true;

        return false;
    }

    public static function clear(){
        self::$errors = array();
    }

    public static function RemoveNotMapped($model){
        $annotation = new Annotation($model);
        $get = $annotation->getAnnotations();

        foreach ($get as $campo=>$data):
            if (array_key_exists("NotMapped", $data))
                unset($model->$campo);
        endforeach;
    }

    public static function MSInt($model){
        $annotation = new Annotation($model);
        $get = $annotation->getAnnotations();

        foreach ($get as $campo=>$data):
            if (array_key_exists("Int", $data)){
                $pattern = "/[^0-9]/mi";
                $model->$campo = preg_replace($pattern, '', $model->$campo);

            }
        endforeach;
    }

    public static function Required($model){
        $annotation = new Annotation($model);
        $get = $annotation->getAnnotations();

        foreach ($get as $campo=>$data):
            if (array_key_exists("Required", $data)){
                if(empty($model->$campo))
                    self::addError("O campo ".$campo." é obrigatório");

            }
        endforeach;
    }

    public static function ValidateModel($model){
        self::Required($model);
    }

    public static function TratamentoDB($model){
        self::MSInt($model);
        self::RemoveNotMapped($model);
    }

} 