<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 99999 !important;
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
                <h5>Editar OS</h5>
            </div>
            <div class="widget-content nopadding">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Produtos</a></li>
                        <li id="tabServicos"><a href="#tab3" data-toggle="tab">Serviços</a></li>
                        <li id="tabAnexos"><a href="#tab4" data-toggle="tab">Anexos</a></li>
                        <li id="tabAnotacoes"><a href="#tab5" data-toggle="tab">Anotações</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idOs', $result->idOs) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>N° OS:
                                            <?php echo $result->idOs ?>
                                        </h3>
                                        <div class="span6" style="margin-left: 0">
                                            <label for="cliente">Filial / CD<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>" />
                                            <input id="valorTotal" type="hidden" name="valorTotal" value="" />
                                        </div>
                                        <div class="span3">
                                            <label for="dataInicial">Data Inicial<span class="required">*</span></label>
                                            <input id="dataInicial" autocomplete="off" class="span12 datepicker" type="hidden" name="dataInicial" value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>"/>
                                            <input autocomplete="off" class="span12 datepicker" type="text" value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>" disabled />
                                        </div>
                                        <div class="span3">
                                            <label for="tecnico">Técnico / Responsável<span class="required">*</span></label>
                                            <?php if ($result->status == "Aberto") { ?>
                                                <input id="tecnico" class="span12" type="text" name="tecnico" placeholder="<?php echo $result->nome ?>"/>
                                                <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>" />
                                            <?php } else { ?>
                                                <input id="tecnico" class="span12" type="text" name="tecnico" value="<?php echo $result->nome ?>" readonly="readonly"/>
                                                <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span3">
                                            <label for="status">Status<span class="required">*</span></label>
                                            <select class="span12" name="status" id="status" value="">
                                                <?php
                                                if ($result->status == "Aberto") {
                                                    ?>
                                                    }
                                                    <option <?php
                                                    if ($result->status == 'Aberto') {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Aberto">Aberto</option>
                                                    <?php } ?>

                                                <option <?php
                                                if ($result->status == 'Orçamento') {
                                                    echo 'selected';
                                                }
                                                ?> value="Orçamento">Orçamento</option>
                                                <option <?php
                                                if ($result->status == 'Não aprovado') {
                                                    echo 'selected';
                                                }
                                                ?> value="Não aprovado">Não aprovado</option>
                                                <option <?php
                                                if ($result->status == 'Aguar-peças') {
                                                    echo 'selected';
                                                }
                                                ?> value="Aguar-peças">Aguardando Peças</option>
                                                <option <?php
                                                if ($result->status == 'Manutenção') {
                                                    echo 'selected';
                                                }
                                                ?> value="Manutenção">Manutenção</option>
                                                <option <?php
                                                if ($result->status == 'Faturamento') {
                                                    echo 'selected';
                                                }
                                                ?> value="Faturamento">Faturamento</option>

                                                <?php
                                                if ($result->status == "Trânsito") {
                                                    ?>
                                                    }
                                                    <option <?php
                                                    if ($result->status == 'Trânsito') {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Trânsito">Trânsito</option>
                                                    <?php } ?>

                                                <?php
                                                if ($result->status == "Cancelado") {
                                                    ?>
                                                    }
                                                    <option <?php
                                                    if ($result->status == 'Cancelado') {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Cancelado">Cancelado</option>
                                                    <?php } ?>

                                                <?php
                                                if ($result->status == "Finalizado") {
                                                    ?>
                                                    }
                                                    <option <?php
                                                    if ($result->status == 'Finalizado') {
                                                        echo 'selected';
                                                    }
                                                    ?> value="Finalizado">Finalizado</option>
                                                    <?php } ?>
                                            </select>
                                        </div>

                                        <div class="span3">
                                            <label for="dataFinalPrevisao">Data Final Previsão<span class="required">*</span></label>
                                            <?php
                                            if ($result->dataPrevisao == NULL) {
                                                ?>
                                            <input id="dataFinalPrevisao" autocomplete="off" class="span12 datepicker" type="text" name="dataFinalPrevisao" style="color: #ED3237;" value="<?php echo date('d/m/Y', strtotime('+7 days')); ?>" />
                                            <?php } else { ?>
                                                <input id="dataFinalPrevisao" autocomplete="off" class="span12 datepicker" type="text" name="dataFinalPrevisao" value="<?php echo date('d/m/Y', strtotime($result->dataPrevisao)); ?>" />
                                            <?php } ?>
                                        </div>
                                        <div class="span3">
                                            <label for="garantia">Garantia</label>
                                            <select class="span12" name="garantia" id="garantia" value="">
                                                <?php if ($result->garantia == '') { ?>
                                                    <option <?php
                                                    echo 'selected';
                                                    ?> value="">Informe garantia</option>
                                                    <?php } ?>

                                                <option <?php
                                                if ($result->garantia == 'Sim') {
                                                    echo 'selected';
                                                }
                                                ?> value="Sim">Sim</option>
                                                <option <?php
                                                if ($result->garantia == 'Não') {
                                                    echo 'selected';
                                                }
                                                ?> value="Não">Não</option>
                                            </select>
                                        </div>
                                        <div class="span3">
                                            <label for="tipo_os">Tipo de OS<span class="required">*</span></label>
                                            <select class="span12" name="tipo_os" id="tipo_os" value="">
                                                <option <?php
                                                if ($result->tipo_os == 'Preventiva') {
                                                    echo 'selected';
                                                }
                                                ?> value="Preventiva">Preventiva</option>
                                                <option <?php
                                                if ($result->tipo_os == 'Corretiva') {
                                                    echo 'selected';
                                                }
                                                ?> value="Corretiva">Corretiva</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span3">
                                            <label for="modelo">Modelo<span class="required">*</span></label>
                                            <select class="span12" name="modelo" id="modelo" value="">
                                                <option <?php
                                                if ($result->modelo == 'MC2180') {
                                                    echo 'selected';
                                                }
                                                ?> value="MC2180">MC2180</option>
                                                <option <?php
                                                if ($result->modelo == 'MC2180 ZEBRA') {
                                                    echo 'selected';
                                                }
                                                ?> value="MC2180 ZEBRA">MC2180 ZEBRA</option>


                                                <option <?php
                                                if ($result->modelo == 'MC3090') {
                                                    echo 'selected';
                                                }
                                                ?> value="MC3090">MC3090</option>
                                                <option <?php
                                                if ($result->modelo == 'MC3190') {
                                                    echo 'selected';
                                                }
                                                ?> value="MC3190">MC3190</option>
                                                <option <?php
                                                if ($result->modelo == 'MC3290') {
                                                    echo 'selected';
                                                }
                                                ?> value="MC3290">MC3290</option>
                                                <option <?php
                                                if ($result->modelo == 'MC9090') {
                                                    echo 'selected';
                                                }
                                                ?> value="MC9090">MC9090</option>
                                                <option <?php
                                                if ($result->modelo == 'MC9190') {
                                                    echo 'selected';
                                                }
                                                ?> value="MC9190">MC9190</option>
                                                <option <?php
                                                if ($result->modelo == 'HONEYWELL CK3X') {
                                                    echo 'selected';
                                                }
                                                ?> value="HONEYWELL CK3X">HONEYWELL CK3X</option>
                                                <option <?php
                                                if ($result->modelo == 'INTERMEC CK3X') {
                                                    echo 'selected';
                                                }
                                                ?> value="INTERMEC CK3X">INTERMEC CK3X</option>
                                                <option <?php
                                                if ($result->modelo == 'OUTROS') {
                                                    echo 'selected';
                                                }
                                                ?> value="OUTROS">OUTROS</option>
                                            </select> 
                                        </div>
                                        <div class="span3">
                                            <label for="bloco">Bloco<span class="required">*</span></label>
                                            <select class="span12" name="bloco" id="bloco" value="">
                                                <option <?php
                                                if ($result->bloco == 'Frios') {
                                                    echo 'selected';
                                                }
                                                ?> value="Frios">Frios</option>
                                                <option <?php
                                                if ($result->bloco == 'Secos') {
                                                    echo 'selected';
                                                }
                                                ?> value="Secos">Secos</option>
                                                <option <?php
                                                if ($result->bloco == 'Hortifruti') {
                                                    echo 'selected';
                                                }
                                                ?> value="Hortifruti">Hortifruti</option>
                                            </select>
                                        </div>
                                        <div class="span3">
                                            <label for="setor">Setor<span class="required">*</span></label>
                                            <select class="span12" name="setor" id="setor" value="">
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
                                                if ($result->setor == 'Oficina') {
                                                    echo 'selected';
                                                }
                                                ?> value="Oficina">Oficina</option>
                                                <option <?php
                                                if ($result->setor == 'Frios') {
                                                    echo 'selected';
                                                }
                                                ?> value="Frios">Frios</option>
                                                <option <?php
                                                if ($result->setor == 'Abastecimento') {
                                                    echo 'selected';
                                                }
                                                ?> value="Abastecimento">Abastecimento</option>
                                                <option <?php
                                                if ($result->setor == 'Depósito') {
                                                    echo 'selected';
                                                }
                                                ?> value="Depósito">Depósito</option>
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
                                                <option <?php
                                                if ($result->setor == 'Cidade 7') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 7">Cidade 7</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 8') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 8">Cidade 8</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 9') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 9">Cidade 9</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 10') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 10">Cidade 10</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 11') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 11">Cidade 11</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 12') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 12">Cidade 12</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 13') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 13">Cidade 13</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 14') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 14">Cidade 14</option>
                                                <option <?php
                                                if ($result->setor == 'Cidade 15') {
                                                    echo 'selected';
                                                }
                                                ?> value="Cidade 15">Cidade 15</option>
                                            </select>
                                        </div>
                                        <div class="span3">
                                            <label for="motivo">Motivo<span class="required">*</span></label>
                                            <select class="span12" name="motivo" id="motivo" value="">
                                                <option <?php
                                                if ($result->motivo == 'Mal uso') {
                                                    echo 'selected';
                                                }
                                                ?> value="Mal uso">Mal uso</option>
                                                <option <?php
                                                if ($result->motivo == 'Desgaste') {
                                                    echo 'selected';
                                                }
                                                ?> value="Desgaste">Desgaste</option>
                                                <option <?php
                                                if ($result->motivo == 'Acidente') {
                                                    echo 'selected';
                                                }
                                                ?> value="Acidente">Acidente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span3">
                                            <label for="patrimonio">Patrimônio <span class="required">*</span></label>
                                            <input id="patrimonio" type="text" class="span12" name="patrimonio" value="<?php echo $result->patrimonio ?>" />
                                        </div>
                                        <div class="span3">
                                            <label for="mac">Referência <span class="required">*</span></label>
                                            <input id="mac" type="text" class="span12" name="mac" value="<?php echo $result->mac ?>" />
                                        </div>
                                    </div>
                                    <!--
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                            <h4>Descrição Serviço</h4>
                                        </label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"><?php echo $result->descricaoProduto ?></textarea>
                                    </div>
                                    -->
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="defeito">
                                            <h4>Defeito</h4>
                                        </label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5"><?php echo $result->defeito ?></textarea>
                                    </div>
                                    <!--
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                            <h4>Observações</h4>
                                        </label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5"><?php echo $result->observacoes ?></textarea>
                                    </div>
                                    -->
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="laudoTecnico">
                                            <h4>Laudo Técnico</h4>
                                        </label>
                                        <textarea class="span12 editor" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"><?php echo $result->laudoTecnico ?></textarea>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <?php if ($result->faturado == 0) { ?>
                                                <a href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="btn btn-success"><i class="fas fa-cash-register"></i> Despachar OS</a> <!-- Faturar -->
                                            <?php }
                                            ?>
                                            <button class="btn btn-primary" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                            <a href="<?php echo base_url() ?>index.php/os/visualizar/<?php echo $result->idOs; ?>" class="btn btn-secondary"><i class="fas fa-eye"></i> Visualizar OS</a>
                                            <a target="_blank" title="Imprimir" class="btn btn-inverse" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>"><i class="fas fa-print"></i> Imprimir</a>
                                            <a title="Enviar por E-mail" class="btn btn-warning" href="<?php echo site_url() ?>/os/enviar_email/<?php echo $result->idOs; ?>"><i class="fas fa-envelope"></i> Enviar por E-mail</a>
                                            <?php
                                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $result->celular_cliente);
                                                echo '<a title="Enviar Por WhatsApp" class="bt'
                                                . 'n btn-success" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $result->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($result->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $result->status . '*.%0d%0aFavor%20entrar%20em%20contato%20para%20saber%20mais%20detalhes.%0d%0a%0d%0aAtenciosamente,%20_' . $emitente[0]->nome . '%20' . $emitente[0]->telefone . '_"><i class="fab fa-whatsapp"></i> WhatsApp</a>';
                                            }
                                            ?>
                                            <?php if ($result->garantias_id) { ?> <a target="_blank" title="Imprimir Termo de Garantia" class="btn btn-inverse" href="<?php echo site_url() ?>/garantias/imprimir/<?php echo $result->garantias_id; ?>"><i class="fas fa-text-width"></i> Imprimir Termo de Garantia</a> <?php } ?>
                                            <a href="<?php echo base_url() ?>index.php/os" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Produtos-->
                        <div class="tab-pane" id="tab2">
                            <div class="span12 well" style="padding: 1%; margin-left: 0">
                                <form id="formProdutos" action="<?php echo base_url() ?>index.php/os/adicionarProduto" method="post">
                                    <div class="span6">
                                        <input type="hidden" name="idProduto" id="idProduto" />
                                        <input type="hidden" name="idOsProduto" id="idOsProduto" value="<?php echo $result->idOs ?>" />
                                        <input type="hidden" name="estoque" id="estoque" value="" />
                                        <label for="">Produto</label>
                                        <input type="text" class="span12" name="produto" id="produto" placeholder="Digite o nome do produto" />
                                    </div>
                                    <div class="span2">
                                        <label for="">Preço</label>
                                        <input type="text" placeholder="Preço" id="preco" name="preco" class="span12 money" />
                                    </div>
                                    <div class="span2">
                                        <label for="">Quantidade</label>
                                        <input type="text" placeholder="Quantidade" id="quantidade" name="quantidade" class="span12" />
                                    </div>
                                    <div class="span2">
                                        <label for="">.</label>
                                        <button class="btn btn-success span12" id="btnAdicionarProduto"><i class="fas fa-plus"></i> Adicionar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="span12" id="divProdutos" style="margin-left: 0">
                                <table class="table table-bordered" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Preço unit.</th>
                                            <th>Ações</th>
                                            <th>Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($produtos as $p) {
                                            $total = $total + $p->subTotal;
                                            echo '<tr>';
                                            echo '<td>' . $p->descricao . '</td>';
                                            echo '<td>' . $p->quantidade . '</td>';
                                            echo '<td>' . ($p->preco ?: $p->precoVenda) . '</td>';
                                            echo '<td><a href="" idAcao="' . $p->idProdutos_os . '" prodAcao="' . $p->idProdutos . '" quantAcao="' . $p->quantidade . '" title="Excluir Produto" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>';
                                            echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$
                                                    <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--Serviços-->
                        <div class="tab-pane" id="tab3">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0">
                                    <form id="formServicos" action="<?php echo base_url() ?>index.php/os/adicionarServico" method="post">
                                        <div class="span6">
                                            <input type="hidden" name="idServico" id="idServico" />
                                            <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs ?>" />
                                            <label for="">Serviço</label>
                                            <input type="text" class="span12" name="servico" id="servico" placeholder="Digite o nome do serviço" />
                                        </div>
                                        <div class="span2">
                                            <label for="">Preço</label>
                                            <input type="text" placeholder="Preço" id="preco_servico" name="preco" class="span12 money" />
                                        </div>
                                        <div class="span2">
                                            <label for="">Quantidade</label>
                                            <input type="text" placeholder="Quantidade" id="quantidade_servico" name="quantidade" class="span12" />
                                        </div>
                                        <div class="span2">
                                            <label for="">.</label>
                                            <button class="btn btn-success span12"><i class="fas fa-plus"></i> Adicionar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="span12" id="divServicos" style="margin-left: 0">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th>Quantidade</th>
                                                <th>Preço</th>
                                                <th>Ações</th>
                                                <th>Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            $comissaoTecnico = 0;
                                            foreach ($servicos as $s) {
                                                $preco = $s->preco ?: $s->precoVenda;
                                                $subtotal = $preco * ($s->quantidade ?: 1);
                                                $total = $total + $subtotal;
                                                $comissaoTecnico = $comissaoTecnico + $s->comissao;
                                                echo '<tr>';
                                                echo '<td>' . $s->nome . '</td>';
                                                echo '<td>' . ($s->quantidade ?: 1) . '</td>';
                                                echo '<td>' . $preco . '</td>';
                                                echo '<td><span idAcao="' . $s->idServicos_os . '" title="Excluir Serviço" class="btn btn-danger servico"><i class="fas fa-trash-alt"></i></span></td>';
                                                echo '<td>R$ ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Total serviços:</strong></td>
                                                <td><strong>R$
                                                        <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-servico" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Comissão:</strong></td>
                                                <td><strong>R$
                                                        <?php echo number_format($comissaoTecnico, 2, ',', '.'); ?><input type="hidden" id="total-comissao" value="<?php echo number_format($comissaoTecnico, 2); ?>"></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Anexos-->
                        <div class="tab-pane" id="tab4">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                    <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8" s method="post">
                                        <div class="span10">
                                            <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs ?>" />
                                            <label for="">Anexo</label>
                                            <input type="file" class="span12" name="userfile[]" multiple="multiple" size="20" />
                                        </div>
                                        <div class="span2">
                                            <label for="">.</label>
                                            <button class="btn btn-success span12"><i class="fas fa-paperclip"></i> Anexar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="span12" id="divAnexos" style="margin-left: 0">
                                    <?php
                                    $cont = 1;
                                    $flag = 5;
                                    foreach ($anexos as $a) {
                                        if ($a->thumb == null) {
                                            $thumb = base_url() . 'assets/img/icon-file.png';
                                            $link = base_url() . 'assets/img/icon-file.png';
                                        } else {
                                            $thumb = base_url() . 'assets/anexos/thumbs/' . $a->thumb;
                                            $link = $a->url . $a->anexo;
                                        }
                                        if ($cont == $flag) {
                                            echo '<div style="margin-left: 0" class="span3"><a href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo" data-toggle="modal"><img src="' . $thumb . '" alt=""></a></div>';
                                            $flag += 4;
                                        } else {
                                            echo '<div class="span3"><a href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo" data-toggle="modal"><img src="' . $thumb . '" alt=""><p align="center">' . $a->anexo . '</p></a></div>';
                                        }
                                        $cont++;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!--Anotações-->
                        <div class="tab-pane" id="tab5">
                            <div class="span12" style="padding: 1%; margin-left: 0">

                                <div class="span12" id="divAnotacoes" style="margin-left: 0">

                                    <a href="#modal-anotacao" id="btn-anotacao" role="button" data-toggle="modal" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar anotação</a>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Anotação</th>
                                                <th>Data/Hora</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($anotacoes as $a) {
                                                echo '<tr>';
                                                echo '<td>' . $a->anotacao . '</td>';
                                                echo '<td>' . date('d/m/Y H:i:s', strtotime($a->data_hora)) . '</td>';
                                                echo '<td><span idAcao="' . $a->idAnotacoes . '" title="Excluir Anotação" class="btn btn-danger anotacao"><i class="fas fa-trash-alt"></i></span></td>';
                                                echo '</tr>';
                                            }
                                            if (!$anotacoes) {
                                                echo '<tr><td colspan="2">Nenhuma anotação cadastrada</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Fim tab anotações -->
                    </div>
                </div>
                &nbsp
            </div>
        </div>
    </div>
</div>

<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo">Excluir Anexo</a>
    </div>
</div>

<!-- Modal cadastro anotações -->
<div id="modal-anotacao" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="#" method="POST" id="formAnotacao">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Adicionar Anotação</h3>
        </div>
        <div class="modal-body">
            <div class="span12" id="divFormAnotacoes" style="margin-left: 0"></div>
            <div class="span12" style="margin-left: 0">
                <label for="anotacao">Anotação</label>
                <textarea class="span12" name="anotacao" id="anotacao" cols="30" rows="3"></textarea>
                <input type="hidden" name="os_id" value="<?php echo $result->idOs; ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-close-anotacao">Fechar</button>
            <button class="btn btn-primary">Adicionar</button>
        </div>
    </form>
</div>

<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formFaturar" action="<?php echo current_url() ?>" method="post">
        <input name="idOs" id="idOS" value="<?php echo $result->idOs ?>" type="hidden"/>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Faturar Ordem de Serviço</h3>
        </div>
        <div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Confira os dados da fatura.</div>
            <div class="span12" style="margin-left: 0">
                <label for="descricao">Descrição</label>
                <input class="span12" id="descricao" type="text" name="descricao" value="Fatura de OS - #<?php echo $result->idOs; ?> " readonly="readonly" />
            </div>
            <div class="span12" style="margin-left: 0">
                <label for="tecnicoFatura">Técnico</label>
                <input class="span12" id="tecnicoFatura" type="text" name="tecnicoFatura" readonly="readonly" value="<?php echo $result->nome; ?> " />
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente</label>
                    <input class="span12" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" readonly="readonly"/>
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                    <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="valor">Valor OS</label>
                    <input type="hidden" id="tipo" name="tipo" value="receita"/>
                    <input class="span12 money" id="valor" type="text" name="valor" value="<?php echo number_format($total, 2); ?> " readonly="readonly"/>
                </div>
                <div class="span4">
                    <label for="comissao">Comissão</label>
                    <input type="hidden" id="tipoComissao" name="tipoComissao" value="Fatura de OS"/>
                    <input class="span12 money" id="comissao" type="text" name="comissao" value="<?php echo number_format($comissaoTecnico, 2); ?> " readonly="readonly"/>
                </div>
                <div class="span4">
                    <label for="vencimento">Data faturamento</label>            
                    <input class="span12 datepicker" autocomplete="off" id="vencimento" type="hidden" name="vencimento" value="<?php echo date('d/m/Y'); ?>"/>
                    <input class="span12 datepicker" autocomplete="off" type="text" disabled="disabled" value="<?php echo date('d/m/Y'); ?>"/>
                </div>
            </div>

            <!--
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="recebido">Recebido?</label>
                    &nbsp &nbsp &nbsp &nbsp <input id="recebido" type="checkbox" name="recebido" value="1" />
                </div>
                <div id="divRecebimento" class="span8" style=" display: none">
                    <div class="span6">
                        <label for="recebimento">Data Recebimento</label>
                        <input class="span12 datepicker" autocomplete="off" id="recebimento" type="text" name="recebimento" />
                    </div>
                    <div class="span6">
                        <label for="formaPgto">Forma Pgto</label>
                        <select name="formaPgto" id="formaPgto" class="span12">
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Boleto">Boleto</option>
                            <option value="Depósito">Depósito</option>
                            <option value="Débito">Débito</option>
                        </select>
                    </div>
                </div>
            </div>
            -->
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar">Cancelar</button>
                <button class="btn btn-primary">Faturar</button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

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
            total_servico = $('#total-servico').val();
            total_comissao = $('#total-comissao').val();
            valor = valor.replace(',', '');
            total_servico = total_servico.replace(',', '');
            total_servico = parseFloat(total_servico);
            total_comissao = total_comissao.replace(',', '');
            total_comissao = parseFloat(total_comissao);
            valor = parseFloat(valor);
            $('#valor').val(valor + total_servico);
            $('#comissao').val(total_comissao);
        });
        $("#formFaturar").validate({
            rules: {
                descricao: {
                    required: true
                },
                cliente: {
                    required: true
                },
                valor: {
                    required: true
                },
                vencimento: {
                    required: true
                }

            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                cliente: {
                    required: 'Campo Requerido.'
                },
                valor: {
                    required: 'Campo Requerido.'
                },
                vencimento: {
                    required: 'Campo Requerido.'
                }
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $('#btn-cancelar-faturar').trigger('click');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/faturar",
                    data: dados,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {

                            window.location.reload(true);
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar faturar OS."
                            });
                            $('#progress-fatura').hide();
                        }
                    }
                });
                return false;
            }
        });
        $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteProduto",
            minLength: 2,
            select: function (event, ui) {
                $("#idProduto").val(ui.item.id);
                $("#estoque").val(ui.item.estoque);
                $("#preco").val(ui.item.preco);
                $("#quantidade").focus();
            }
        });
        $("#servico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function (event, ui) {
                $("#idServico").val(ui.item.id);
                $("#preco_servico").val(ui.item.preco);
                $("#quantidade_servico").focus();
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
        $("#termoGarantia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteTermoGarantia",
            minLength: 1,
            select: function (event, ui) {
                if (ui.item.id) {
                    $("#garantias_id").val(ui.item.id);
                }
            }
        });
        $('#termoGarantia').on('change', function () {
            if (!$(this).val() && $("#garantias_id").val()) {
                $("#garantias_id").val('');
                Swal.fire({
                    type: "success",
                    title: "Sucesso",
                    text: "Termo de garantia removido"
                });
            }
        });
        $("#formOs").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                status: {
                    required: true
                },
                dataInicial: {
                    required: true
                },
                dataFinalPrevisao: {
                    required: true
                },
                modelo: {
                    required: true
                },
                bloco: {
                    required: true
                },
                setor: {
                    required: true
                },
                motivo: {
                    required: true
                },
                tipo_os: {
                    required: true
                },
                patrimonio: {
                    required: true
                },
                mac: {
                    required: true
                }
            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                tecnico: {
                    required: 'Campo Requerido.'
                },
                status: {
                    required: 'Campo Requerido.'
                },
                dataInicial: {
                    required: 'Campo Requerido.'
                },
                dataFinalPrevisao: {
                    required: 'Campo Requerido.'
                },
                modelo: {
                    required: 'Campo Requerido.'
                },
                bloco: {
                    required: 'Campo Requerido.'
                },
                setor: {
                    required: 'Campo Requerido.'
                },
                motivo: {
                    required: 'Campo Requerido.'
                },
                tipo_os: {
                    required: 'Campo Requerido.'
                },
                patrimonio: {
                    required: 'Campo Requerido.'
                },
                mac: {
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
                        type: "error",
                        title: "Atenção",
                        text: "Você não possui estoque suficiente."
                    });
                } else {
                    var dados = $(form).serialize();
                    $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/os/adicionarProduto",
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
        $("#formServicos").validate({
            rules: {
                servico: {
                    required: true
                }
            },
            messages: {
                servico: {
                    required: 'Insira um serviço'
                }
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarServico",
                    data: dados,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#quantidade_servico").val('');
                            $("#preco_servico").val('');
                            $("#servico").val('').focus();
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar adicionar serviço."
                            });
                        }
                    }
                });
                return false;
            }
        });
        $("#formAnotacao").validate({
            rules: {
                anotacao: {
                    required: true
                }
            },
            messages: {
                anotacao: {
                    required: 'Insira a anotação'
                }
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divFormAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarAnotacao",
                    data: dados,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divAnotacoes").load("<?php echo current_url(); ?> #divAnotacoes");
                            $("#anotacao").val('');
                            $('#btn-close-anotacao').trigger('click');
                            $("#divFormAnotacoes").html('');
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar adicionar anotação."
                            });
                        }
                    }
                });
                return false;
            }
        });
        $("#formAnexos").validate({
            submitHandler: function (form) {
                //var dados = $( form ).serialize();
                var dados = new FormData(form);
                $("#form-anexos").hide('1000');
                $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/anexar",
                    data: dados,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                            $("#userfile").val('');
                        } else {
                            $("#divAnexos").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> ' + data.mensagem + '</div>');
                        }
                    },
                    error: function () {
                        $("#divAnexos").html('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> Ocorreu um erro. Verifique se você anexou o(s) arquivo(s).</div>');
                    }
                });
                $("#form-anexos").show('1000');
                return false;
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
                    url: "<?php echo base_url(); ?>index.php/os/excluirProduto",
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
        $(document).on('click', '.servico', function (event) {
            var idServico = $(this).attr('idAcao');
            if ((idServico % 1) == 0) {
                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirServico",
                    data: "idServico=" + idServico,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir serviço."
                            });
                        }
                    }
                });
                return false;
            }
        });
        $(document).on('click', '.anexo', function (event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#excluir-anexo").attr('link', url + id);
            $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexo/" + id);
        });
        $(document).on('click', '#excluir-anexo', function (event) {
            event.preventDefault();
            var link = $(this).attr('link');
            $('#modal-anexo').modal('hide');
            $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
            $.ajax({
                type: "POST",
                url: link,
                dataType: 'json',
                success: function (data) {
                    if (data.result == true) {
                        $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: data.mensagem
                        });
                    }
                }
            });
        });
        $(document).on('click', '.anotacao', function (event) {
            var idAnotacao = $(this).attr('idAcao');
            if ((idAnotacao % 1) == 0) {
                $("#divAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirAnotacao",
                    data: "idAnotacao=" + idAnotacao,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divAnotacoes").load("<?php echo current_url(); ?> #divAnotacoes");
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir serviço."
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
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>
