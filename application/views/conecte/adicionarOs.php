<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Cadastro de OS</h5>
            </div>
            <div class="widget-content nopadding">


                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">

                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">

                                    <div class="span12" style="padding: 1%;">
                                        <div class="span12 alert alert-info">
                                            <h5 class="text-center">Preencha os campos abaixo detalhando o que você precisa. Campos com asterisco são obrigatórios.</h5>
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="bloco">Bloco<span class="required">*</span></label>
                                            <select class="span12" name="bloco" id="bloco" value="">
                                                <option value="">Selecione um bloco</option>
                                                <option value="Frios">Frios</option>
                                                <option value="Secos">Secos</option>
                                                <option value="Hortifruti">Hortifruti</option>
                                            </select>
                                        </div>
                                        <div class="span4">
                                            <label for="motivo">Motivo<span class="required">*</span></label>
                                            <select class="span12" name="motivo" id="motivo" value="">
                                                <option value="">Selecione um motivo</option>
                                                <option value="Mal uso">Mal uso</option>
                                                <option value="Desgaste">Desgaste</option>
                                                <option value="Acidente">Acidente</option>
                                            </select>
                                        </div>
                                        <div class="span4">
                                            <label for="tipo_os">Tipo de O.S<span class="required">*</span></label>
                                            <select class="span12" name="tipo_os" id="tipo_os" value="">
                                                <option value="">Selecione o tipo da O.S</option>
                                                <option value="Preventiva">Preventiva</option>
                                                <option value="Corretiva">Corretiva</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="modelo">Modelo<span class="required">*</span></label>
                                            <select class="span12" name="modelo" id="modelo" value="">
                                                <option value="">Selecione um modelo</option>
                                                <option value="MC2180">MC2180</option>
                                                <option value="MC2180 ZEBRA">MC2180 ZEBRA</option>
                                                <option value="MC3090">MC3090</option>
                                                <option value="MC3190">MC3190</option>
                                                <option value="MC3290">MC3290</option>
                                                <option value="MC9090">MC9090</option>
                                                <option value="MC9190">MC9190</option>       
                                                <option value="HONEYWELL CK3X">HONEYWELL CK3X</option>
                                                <option value="INTERMEC CK3X">INTERMEC CK3X</option>
                                                <option value="OUTROS">Outros</option>
                                            </select>
                                        </div>
                                        <div class="span4">
                                            <label for="patrimonio">Patrimônio <span class="required">*</span></label>
                                            <input id="patrimonio" class="span12" type="text" name="patrimonio" value="" />
                                        </div>
                                        <div class="span4">
                                            <label for="mac">MAC <span class="required">*</span></label>
                                            <input id="mac" class="span12 cpfcnpj" type="text" name="mac" value="" maxlength="18" size="18" OnKeyPress="formatar('00:00:00:00:00:00', this)"/>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="setor">Setor<span class="required">*</span></label>
                                            <select class="span12" name="setor" id="setor" value="">
                                                <option value="">Selecione um setor</option>
                                                <option value="Auditoria Loja">Auditoria Loja</option>
                                                <option value="Auditoria Externa">Auditoria Externa</option>
                                                <option value="Hortífruti">Hortífruti</option>
                                                <option value="Tratamento de perdas">Tratamento de perdas</option>
                                                <option value="Material logístico">Material logístico</option>
                                                <option value="Prevenção de perdas">Prevenção de perdas</option>
                                                <option value="Transporte">Transporte</option>
                                                <option value="Expedição Loja">Expedição Loja</option>
                                                <option value="Expedição Externa">Expedição Externa</option>
                                                <option value="Recebimento">Recebimento</option>
                                                <option value="Endereçamento">Endereçamento</option>
                                                <option value="Devolução">Devolução</option>
                                                <option value="Oficina">Oficina</option>
                                                <option value="Frios">Frios</option>
                                                <option value="Abastecimento">Abastecimento</option>
                                                <option value="Depósito">Depósito</option>
                                                <option value="Cidade 1">Cidade 1</option>
                                                <option value="Cidade 2">Cidade 2</option>
                                                <option value="Cidade 3">Cidade 3</option>
                                                <option value="Cidade 4">Cidade 4</option>
                                                <option value="Cidade 5">Cidade 5</option>
                                                <option value="Cidade 6">Cidade 6</option>
                                                <option value="Cidade 7">Cidade 7</option>
                                                <option value="Cidade 8">Cidade 8</option>
                                                <option value="Cidade 9">Cidade 9</option>
                                                <option value="Cidade 10">Cidade 10</option>
                                                <option value="Cidade 11">Cidade 11</option>
                                                <option value="Cidade 12">Cidade 12</option>
                                                <option value="Cidade 13">Cidade 13</option>
                                                <option value="Cidade 14">Cidade 14</option>
                                                <option value="Cidade 15">Cidade 15</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span12">
                                            <label for="descricaoProduto">Descrição Produto/Serviço*</label>
                                            <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span12">
                                            <label for="defeito">Defeito</label>
                                            <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5"></textarea>
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span12">
                                            <label for="observacoes">Observações</label>
                                            <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5"></textarea>
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="fas fa-plus"></i> Cadastrar</button>
                                            <a href="<?php echo base_url() ?>index.php/mine/os" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>


                .

            </div>

        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function () {


        $("#formOs").validate({
            rules: {
                descricaoProduto: {
                    required: true
                }
            },
            messages: {
                descricaoProduto: {
                    required: 'O campo descrição da OS é obrigatório.'
                }
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });

        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>
