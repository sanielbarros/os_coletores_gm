<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>


<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Editar Patrimônio</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do Patrimônio</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divEditarPatrimonio">
                                <form action="<?php echo current_url(); ?>" method="post" id="formEditarPatrimonio">
                                    <?php echo form_hidden('idPatrimonios', $result->idPatrimonios) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3 class="span6"># Patrimônio: <?php echo $result->patrimonio ?> </h3>
                                        <h5 class="span6" style="text-align:right">Cadastro: <?php echo $result->dataCadastroPatrimonio ?> </h5>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="cliente">Cliente<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>" />
                                        </div>
                                        <div class="span4">
                                            <label for="descricao">Descrição<span class="required">*</span></label>
                                            <input id="descricao" class="span12" type="text" name="descricao" value="<?php echo $result->descricao ?>" />
                                        </div>
                                        <div class="span4">
                                            <label for="usuario">Usuário cadastro</label>
                                            <input id="usuario" class="span12" type="text" name="usuario" disabled="disabled" value="<?php echo $result->nome ?>" />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>" />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="fabricante">Fabricante<span class="required">*</span></label>
                                            <input id="fabricante" class="span12" type="text" name="fabricante" value="<?php echo $result->fabricante ?>" />
                                        </div>
                                        <div class="span4">
                                            <label for="tipoReferencia">Tipo de referência<span class="required">*</span></label>
                                            <select class="span12" name="tipoReferencia" id="tipoReferencia" value="">
                                                <option <?php
                                                if ($result->tipoReferencia == '') {
                                                    echo 'selected';
                                                }
                                                ?> value="">Informe um tipo de referência</option>
                                                <option <?php
                                                if ($result->tipoReferencia == 'MAC') {
                                                    echo 'selected';
                                                }
                                                ?> value="MAC">MAC</option>
                                                <option <?php
                                                if ($result->tipoReferencia == 'Nº de série') {
                                                    echo 'selected';
                                                }
                                                ?> value="Nº de série">Nº de série</option>
                                            </select>
                                        </div>
                                        <div class="span4">
                                            <label for="referencia">Referência<span class="required">*</span></label>
                                            <input id="referencia" class="span12" type="text" name="referencia" value="<?php echo $result->referencia ?>" />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="bloco">Bloco<span class="required">*</span></label>
                                            <select class="span12" name="bloco" id="bloco" value="">
                                                <option <?php
                                                if ($result->bloco == '') {
                                                    echo 'selected';
                                                }
                                                ?> value="">Informe um bloco</option>
                                                <option <?php
                                                if ($result->bloco == 'Secos') {
                                                    echo 'selected';
                                                }
                                                ?> value="Secos">Secos</option>
                                                <option <?php
                                                if ($result->bloco == 'Frios') {
                                                    echo 'selected';
                                                }
                                                ?> value="Frios">Frios</option>
                                                <option <?php
                                                if ($result->bloco == 'Hortifruti') {
                                                    echo 'selected';
                                                }
                                                ?> value="Hortifruti">Hortifruti</option>
                                            </select>
                                        </div>
                                        <div class="span4">
                                            <label for="setor">Setor<span class="required">*</span></label>
                                            <select class="span12" name="setor" id="setor" value="">
                                                <option <?php
                                                if ($result->setor == '') {
                                                    echo 'selected';
                                                }
                                                ?> value="">Informe um setor</option>
                                                <option <?php
                                                if ($result->setor == 'Auditoria Loja') {
                                                    echo 'selected';
                                                }
                                                ?> value="Auditoria Loja">Auditoria Loja</option>
                                                <option <?php
                                                if ($result->setor == 'Auditoria Externa') {
                                                    echo 'selected';
                                                }
                                                ?> value="Auditoria Externa">Auditoria Externa</option>
                                                <option <?php
                                                if ($result->setor == 'Hortífruti') {
                                                    echo 'selected';
                                                }
                                                ?> value="Hortífruti">Hortífruti</option>
                                                <option <?php
                                                if ($result->setor == 'Tratamento de perdas') {
                                                    echo 'selected';
                                                }
                                                ?> value="Tratamento de perdas">Tratamento de perdas</option>
                                                <option <?php
                                                if ($result->setor == 'Material logístico') {
                                                    echo 'selected';
                                                }
                                                ?> value="Material logístico">Material logístico</option>
                                                <option <?php
                                                if ($result->setor == 'Prevenção de perdas') {
                                                    echo 'selected';
                                                }
                                                ?> value="Prevenção de perdas">Prevenção de perdas</option>
                                                <option <?php
                                                if ($result->setor == 'Transporte') {
                                                    echo 'selected';
                                                }
                                                ?> value="Transporte">Transporte</option>
                                                <option <?php
                                                if ($result->setor == 'Expedição Loja') {
                                                    echo 'selected';
                                                }
                                                ?> value="Expedição Loja">Expedição Loja</option>
                                                <option <?php
                                                if ($result->setor == 'Expedição Externa') {
                                                    echo 'selected';
                                                }
                                                ?> value="Expedição Externa">Expedição Externa</option>
                                                <option <?php
                                                if ($result->setor == 'Recebimento') {
                                                    echo 'selected';
                                                }
                                                ?> value="Recebimento">Recebimento</option>
                                                <option <?php
                                                if ($result->setor == 'Endereçamento') {
                                                    echo 'selected';
                                                }
                                                ?> value="Endereçamento">Endereçamento</option>
                                                <option <?php
                                                if ($result->setor == 'Devolução') {
                                                    echo 'selected';
                                                }
                                                ?> value="Devolução">Devolução</option>
                                                <option <?php
                                                if ($result->setor == 'Frios') {
                                                    echo 'selected';
                                                }
                                                ?> value="Frios">Frios</option>
                                                <option <?php
                                                if ($result->setor == 'Oficina') {
                                                    echo 'selected';
                                                }
                                                ?> value="Oficina">Oficina</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 1') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 1">Cidade 1</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 2') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 2">Cidade 2</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 3') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 3">Cidade 3</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 4') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 4">Cidade 4</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 5') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 5">Cidade 5</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 6') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 6">Cidade 6</option>
                                            </select>
                                        </div>
                                        <div class="span4">
                                            <label for="localizacao">Localização detalhada</label>
                                            <input id="localizacao" class="span12" type="text" name="localizacao" value="<?php echo $result->localizacao ?>" placeholder="Ex: doca, rua ..." />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span8 offset2" style="text-align: center">
                                            <button class="btn btn-primary" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                            <a href="<?php echo base_url() ?>index.php/patrimonios/visualizar/?id=<?php echo $result->idPatrimonios; ?>&p=<?php echo $result->patrimonio ?>" class="btn btn-inverse"><i class="fas fa-eye"></i> Visualizar patrimônio</a>
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
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function (event, ui) {
                $("#cliente").val(ui.item.id);
            }
        });
        $(".money").maskMoney();
        $('#recebido').click(function (event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });
        $(document).on('click', '#btn-faturar', function (event) {
            event.preventDefault();
            valor = $('#total-venda').val();
            valor = valor.replace(',', '');
            $('#valor').val(valor);
        });
        $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteProdutoSaida",
            minLength: 2,
            select: function (event, ui) {
                $("#idProduto").val(ui.item.id);
                $("#estoque").val(ui.item.estoque);
                $("#preco").val(ui.item.preco);
                $("#quantidade").focus();
            }
        });
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function (event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function (event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#formEditarPatrimonio").validate({
            rules: {
                cliente: {
                    required: true
                },
                descricao: {
                    required: true
                },
                fabricante: {
                    required: true
                },
                tipoReferencia: {
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
                }
            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                descricao: {
                    required: 'Campo Requerido.'
                },
                fabricante: {
                    required: 'Campo Requerido.'
                },
                tipoReferencia: {
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
        $("#formProdutos").validate({
            rules: {
                quantidade: {
                    required: true
                }
            },
            messages: {
                quantidade: {
                    required: 'Insira a quantidade'
                }
            },
            submitHandler: function (form) {
                var quantidade = parseInt($("#quantidade").val());
                var estoque = parseInt($("#estoque").val());
                if (estoque < quantidade) {
                    Swal.fire({
                        type: "warning",
                        title: "Atenção",
                        text: "Você não possui estoque suficiente."
                    });
                } else {
                    var dados = $(form).serialize();
                    $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/vendas/adicionarProduto",
                        data: dados,
                        dataType: 'json',
                        success: function (data) {
                            if (data.result == true) {
                                $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                                $("#quantidade").val('');
                                $("#preco").val('');
                                $("#produto").val('').focus();
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    text: "Ocorreu um erro ao tentar adicionar produto."
                                });
                            }
                        }
                    });
                    return false;
                }
            }
        });
        $(document).on('click', 'a', function (event) {
            var idProduto = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var produto = $(this).attr('prodAcao');
            if ((idProduto % 1) == 0) {
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/vendas/excluirProduto",
                    data: "idProduto=" + idProduto + "&quantidade=" + quantidade + "&produto=" + produto,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir produto."
                            });
                        }
                    }
                });
                return false;
            }
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
