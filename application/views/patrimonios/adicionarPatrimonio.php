<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Cadastro de patrimônio</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do patrimônio</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <?php if ($custom_error == true) { ?>
                                    <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente e responsável.</div>
                                <?php } ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formPatrimonios">
                                    <div class="span12" style="padding: 1%; margin-left: 0" >
                                        <div class="span4">
                                            <label for="cliente">Cliente<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="" />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="" />
                                        </div>
                                        <div class="span4">
                                            <label for="dataCadastro">Data cadastro</label>
                                            <input class="span12 datepicker date" type="text" disabled="disabled" value="<?php echo date('d/m/Y'); ?>" />
                                            <input id="dataCadastro" name="dataCadastro" class="span12 datepicker date" type="hidden" value="<?php echo date('d/m/Y'); ?>" />
                                        </div>
                                        <div class="span4">
                                            <label for="tecnico">Usuário cadastro</label>
                                            <input class="span12" type="text" disabled="disabled" value="<?= $this->session->userdata('nome'); ?>" />
                                            <input id="tecnico" class="span12" type="hidden" name="tecnico" value="<?= $this->session->userdata('nome'); ?>" />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0" >
                                        <div class="span3">
                                            <label for="plaquetaPatrimonio">Plaqueta patrimônio<span class="required">*</span></label>
                                            <input id="plaquetaPatrimonio" class="span12" type="text" name="plaquetaPatrimonio" />
                                        </div>
                                        <div class="span3">
                                            <label for="descricao">Descrição<span class="required">*</span></label>
                                            <input id="descricao" class="span12" type="text" name="descricao"/>
                                        </div>
                                        <div class="span3">
                                            <label for="fabricante">Fabricante<span class="required">*</span></label>
                                            <input id="fabricante" class="span12" type="text" name="fabricante"/>
                                        </div>
                                        <div class="span3">
                                            <label for="tipoReferencia">Tipo de Referencia<span class="required">*</span></label>
                                            <select class="span12" name="tipoReferencia" id="tipoReferencia" value="">
                                                <option value="">Selecione um tipo de referência</option>
                                                <option value="MAC">MAC</option>
                                                <option value="Nº de série">Nº de série</option>
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0" >

                                        <div class="span3">
                                            <label for="referencia">Referência<span class="required">*</span></label>
                                            <input id="referencia" class="span12" type="text" name="referencia"/>
                                        </div>
                                        <div class="span3">
                                            <label for="bloco">Bloco<span class="required">*</span></label>
                                            <select class="span12" name="bloco" id="bloco" value="">
                                                <option value="">Selecione um bloco</option>
                                                <option value="Secos">Secos</option>
                                                <option value="Frios">Frios</option>
                                                <option value="Hortifruti">Hortifruti</option>
                                            </select>
                                        </div>
                                        <div class="span3">
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
                                                <option value="Cidade 1">Cidade 1</option>
                                                <option value="Cidade 2">Cidade 2</option>
                                                <option value="Cidade 3">Cidade 3</option>
                                                <option value="Cidade 4">Cidade 4</option>
                                                <option value="Cidade 5">Cidade 5</option>
                                                <option value="Cidade 6">Cidade 6</option>
                                                <option value="Cidade 7">Cidade 7</option>
                                            </select>                                   
                                        </div>
                                        <div class="span3">
                                            <label for="localizacao">Localização detalhada</label>
                                            <input id="localizacao" class="span12" type="text" name="localizacao" placeholder="Ex: doca, rua..."/>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="fas fa-share"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/patrimonios" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/patrimonios/autoCompleteCliente",
            minLength: 1,
            select: function (event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/patrimonios/autoCompleteUsuario",
            minLength: 1,
            select: function (event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#formPatrimonios").validate({
            rules: {
                cliente: {
                    required: true
                },
                plaquetaPatrimonio: {
                    required: true
                },
                descricao: {
                    required: true
                },
                fabricante: {
                    required: true
                },
                referencia: {
                    required: true
                },
                bloco: {
                    required: true
                },
                setor: {
                    required: true
                },
                tipoReferencia: {
                    required: true
                }
            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                plaquetaPatrimonio: {
                    required: 'Campo Requerido.'
                },
                descricao: {
                    required: 'Campo Requerido.'
                },
                fabricante: {
                    required: 'Campo Requerido.'
                },
                referencia: {
                    required: 'Campo Requerido.'
                },
                bloco: {
                    required: 'Campo Requerido.'
                },
                setor: {
                    required: 'Campo Requerido.'
                },
                tipoReferencia: {
                    required: 'Campo Requerido.'
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
    });
</script>
