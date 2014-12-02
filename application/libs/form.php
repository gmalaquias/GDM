<?php
namespace Libs;
class Form
{
    public static function Input($Tipo, $Nome="", $Valor="", $htmlAttr = Array())
    {
        $html = "";
        if(strtolower($Tipo) == "textarea")
        {
            $html .= "<textarea ";
            if(!empty($Nome)) $html .= "name='$Nome' id='$Nome' ";

            if(is_array($htmlAttr) && count($htmlAttr) > 0)
            {
                foreach($htmlAttr as $k=>$attr)
                {
                    $html .= "$k='$attr' ";
                }
            }
            $html .= ">";
            if(!empty($Valor)) $html .= $Valor;
            $html .= "</textarea>";
        }
        else if(strtolower($Tipo) == "select" OR strtolower($Tipo) == "dropdown")
        {
            $html .= "<select ";
            if(!empty($Nome)) $html .= "name='$Nome' id='$Nome' ";
            if(is_array($htmlAttr) && count($htmlAttr) > 0)
            {
                foreach($htmlAttr as $k=>$attr)
                {
                    $html .= "$k='$attr' ";
                }
            }
            $html .= ">";

            if(!empty($Valor) && is_array($Valor) && count($Valor) > 0)
            {
                foreach($Valor as $v=>$txt)
                {
                    $html .= "<option value='$v'>$txt</option>";
                }
            }
            else if(!empty($Valor)) $html .= $Valor;

            $html .= "</select>";
        }
        else
        {
            $html .= "<input ";
            if(!empty($Nome)) $html .= "name='$Nome' id='$Nome' ";
            if(!empty($Tipo)) $html .= "type='$Tipo' ";

            if(is_array($htmlAttr) && count($htmlAttr) > 0)
            {
                foreach($htmlAttr as $k=>$attr)
                {
                    $html .= "$k='$attr' ";
                }
            }

            if(!empty($Valor)) $html .= "value='$Valor' ";;

            $html .= "/>";
        }
        return $html;
    }

    public static function Checkbox($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("checkbox", $Nome, $Valor, $htmlAttr);
    }

    public static function Text($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("text", $Nome, $Valor, $htmlAttr);
    }

    public static function TextArea($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("textarea", $Nome, $Valor, $htmlAttr);
    }

    public static function DropDown($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("select", $Nome, $Valor, $htmlAttr);
    }

    public static function Password($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("password", $Nome, $Valor, $htmlAttr);
    }

    public static function Email($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("email", $Nome, $Valor, $htmlAttr);
    }

    public static function Range($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("range", $Nome, $Valor, $htmlAttr);
    }

    public static function Number($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("number", $Nome, $Valor, $htmlAttr);
    }

    public static function Hidden($Nome, $Valor, $htmlAttr = Array())
    {
        echo Self::Input("hidden", $Nome, $Valor, $htmlAttr);
    }

    public static function Wysiwyg($Nome, $Valor, $htmlAttr = Array())
    {
        Self::Hidden($Nome, $Valor);
        echo "
                <script type='text/javascript'>
                    jQuery(function($){
                        //but we want to change a few buttons colors for the third style
                        $('#".$Nome."wysiwyg').ace_wysiwyg({
                            toolbar:
                                [
                                    {name:'font', className:'btn-default'},
                                    null,
                                    {name:'fontSize', className:'btn-default'},
                                    null,
                                    {name:'bold', className:'btn-default'},
                                    {name:'italic', className:'btn-default'},
                                    {name:'strikethrough', className:'btn-default'},
                                    {name:'underline', className:'btn-default'},
                                    null,
                                    {name:'insertunorderedlist', className:'btn-primary'},
                                    {name:'insertorderedlist', className:'btn-primary'},
                                    {name:'outdent', className:'btn-primary'},
                                    {name:'indent', className:'btn-primary'},
                                    null,
                                    {name:'justifyleft', className:'btn-primary'},
                                    {name:'justifycenter', className:'btn-primary'},
                                    {name:'justifyright', className:'btn-primary'},
                                    {name:'justifyfull', className:'btn-primary'},
                                    null,
                                    {name:'unlink', className:'btn-primary'},
                                    null,
                                    {name:'createLink', className:'btn-primary'},
                                    null,
                                    {name:'insertImage', className:'btn-success'},
                                    null,
                                    {name:'foreColor', className:'btn-default'},
                                    null,
                                    {name:'undo', className:'btn-grey'},
                                    {name:'redo', className:'btn-grey'}
                                ],
                            'wysiwyg': {
                        fileUploadError: showErrorAlert
                            }
                        });
                        $('#".$Nome."wysiwyg').on('keyup blur', function(){
                            $('#".$Nome."').val($(this).html());
                        });
                });
                </script>
                <div id='".$Nome."wysiwyg' class='wysiwyg-editor'></div>
                ";
    }
}