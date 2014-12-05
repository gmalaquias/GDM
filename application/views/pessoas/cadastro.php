<?
use Libs\Form;
use Libs\Session;
?>

<script>
    function SetPF(valor){
        $("#TipoPessoaFisica").val(valor);
    }
</script>

<form method="post">
    <h3 class="page-header">Cadastro de Pessoa</h3>
    <div id="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="<? if(@$Model->TipoPessoaFisica == 1) echo "active"; ?>"><a href="#pf" id="pfLink"
                                                                                       onclick="SetPF(1)"
                                                                                       data-toggle="tab">Pessoa Física</a></li>
                <li class="<? if(@$Model->TipoPessoaFisica != true) echo "active"; ?>"><a href="#pj"
                                                                                          onclick="SetPF
                                                                                                  (0)"
                                                                                          data-toggle="tab">Pessoa Jurídica</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane <? if(@$Model->TipoPessoaFisica == 1) echo "active"; ?>"
                     id="pf">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>
                                CPF:
                            </label>
                            <?Form::Mask("99.999.999-99", "PessoaFisica_CPF", @$Model->PessoaFisica->CPF, Array("class" => "form-control"));?>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>
                                RG:
                            </label>
                            <?Form::Text("PessoaFisica_RG", @$Model->PessoaFisica->RG, Array("class" => "form-control"));?>
                        </div>

                        <div class="form-group col-lg-4">
                            <label>
                                Data de Nascimento:
                            </label>
                            <?Form::DatePicker("PessoaFisica_Nascimento", @$Model->PessoaFisica->Nascimento, Array("class" => "form-control"));?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>
                                Sexo:
                            </label>
                            <? Form::DropDown("PessoaFisica_Sexo", @$Model->PessoaFisica->Sexo, Array(
                                "Masculíno"=>"Masculíno",
                                "Feminíno"=> "Feminíno"
                            ), Array("class" => "form-control"))?>
                        </div>

                        <div class="form-group col-lg-4">
                            <label>
                                Estado Civíl:
                            </label>
                            <? Form::DropDown("PessoaFisica_EstadoCivil", @$Model->PessoaFisica->EstadoCivil, Array(
                                "Solteiro"=>"Solteiro",
                                "Casado"=> "Casado",
                                "Viúvo"=>"Viúvo",
                                "Divorciado"=>"Divorciado"
                            ), Array("class" => "form-control"))?>
                        </div>

                        <div class="form-group col-lg-4">
                            <label>
                                Nacionalidade:
                            </label>
                            <? Form::Select2("PessoaFisica_Nacionalidade", @$Model->PessoaFisica->Nacionalidade, "", Array("class" => "form-control", "DataUrl" => URL."handler/index/pais/Select2" ))?>
                        </div>

                    </div>

                </div><!-- /.tab-pane -->
                <div class="tab-pane <? if(@$Model->TipoPessoaFisica != true) echo "active"; ?>"
                     id="pj">

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>
                                CPF:
                            </label>
                            <?Form::Mask("99.999.999/9999-99", "PessoaJuridica_CNPJ", @$Model->PessoaJuridica->CNPJ, Array("class" => "form-control"));?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>
                                Nome Fantasia:
                            </label>
                            <?Form::Text("PessoaJuridica_NomeFantasia", @$Model->PessoaJuridica->NomeFantasia, Array("class" => "form-control"));?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>
                                IE:
                            </label>
                            <?Form::Text("PessoaJuridica_IE", @$Model->PessoaJuridica->IE, Array("class" => "form-control"));?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>
                                IM:
                            </label>
                            <?Form::Text("PessoaJuridica_IM", @$Model->PessoaJuridica->CNPJ,
                                Array("class" => "form-control"));?>
                        </div>
                    </div>

                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Dados Gerais
                </h3>

            </div>

            <div class="box-body">
                <?Form::Hidden("PessoaId", @$Model->PessoaId);?>
                <?Form::Hidden("TipoPessoaFisica", @$Model->TipoPessoaFisica);?>
                <div class="form-group">
                    <label>
                        Nome / Razão Social:
                    </label>
                    <?Form::Text("Nome", @$Model->Nome, Array("class" => "form-control"));?>
                </div>
                <div class="form-group">
                    <label>
                        Email:
                    </label>
                    <?Form::Text("Email", @$Model->Email, Array("class" => "form-control"));?>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>
                            Telefone:
                        </label>
                        <?Form::Mask("(99) 9999-9999", "Telefone", @$Model->Telefone, Array("class" => "form-control"));?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>
                            Celular:
                        </label>
                        <?Form::Mask("(99) 9999-9999?9", "Celular", @$Model->Celular, Array("class" => "form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        Observações:
                    </label>
                    <?Form::TextArea("Observacao", @$Model->Observacao, Array("class" => "form-control"));?>
                </div>


            </div>

            <div class="box-footer">
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-right: 15px;" >Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
