<div class="row-fluid" style="margin-top: 0">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Relatórios Rápidos</h5>
            </div>
            <div class="widget-content">
                <ul class="site-stats">
                    <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/osRapid/?metodo=pdf"><i class="fas fa-diagnoses"></i> <small>Todas as OS (PDF)</small></a></li>

                </ul>
            </div>
            <div class="widget-content">
                <ul class="site-stats">
                    <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/osRapid/?metodo=excel"><i class="fas fa-diagnoses"></i> <small>Todas as OS (EXCEL)</small></a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="span8">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Relatórios Customizáveis</h5>
            </div>
            <div class="widget-content">
                <div class="span12 well">
                    <form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/osCustom" method="get">
                        <div class="span12 well">
                            <div class="span4">
                                <label for="dataInicial">Data de:</label>
                                <input type="date" name="dataInicial" id="dataInicial" class="span12" />
                            </div>
                            <div class="span4">
                                <label for="dataFinal">até:</label>
                                <input type="date" name="dataFinal" id="dataFinal" class="span12" />
                            </div>
                            <div class="span4">
                                <label for="tabelaSelect">Ordenação:</label>
                                <select name="tabelaSelect" id="status" class="span12">
                                    <option value="data-final">Fechamento das OS</option>
                                    <option value="data-inicial">Abertura das OS</option>
                                </select>
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span6">
                                <label for="cliente">Filial/CD:</label>
                                <input type="text" id="cliente" class="span12" />
                                <input type="hidden" name="cliente" id="clienteHide" />
                            </div>
                            <div class="span6">
                                <label for="tecnico">Responsável:</label>
                                <input type="text" id="tecnico" class="span12" />
                                <input type="hidden" name="responsavel" id="responsavelHide" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">

                            <div class="span6">
                                <label for="mac">MAC:</label>
                                <input type="text" name="mac" id="mac" class="span12" />
                            </div>
                            <div class="span6">
                                <label for="patrimonio">Patrimônio:</label>
                                <input type="text" name="patrimonio" id="patrimonio" class="span12" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span12">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="span12">
                                    <option value=""></option>
                                    <option value="Aberto">Aberto</option>
                                    <option value="Orçamento">Orçamento</option>
                                    <option value="Não aprovado">Não aprovado</option>
                                    <option value="Aguar-peças">Aguardando Peças</option>
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="Faturamento">Faturamento</option>
                                    <option value="Trânsito">Trânsito</option>
                                    <option value="Finalizado">Finalizado</option>
                                </select>
                            </div>
                        </div>
                        <div class="span12" style="margin-left: 0; text-align: center">
                            <input type="reset" class="btn" value="Limpar" />
                            <button class="btn btn-inverse" name="metodo" value="pdf"><i class="fas fa-print"></i> Imprimir PDF</button>
                            <button class="btn btn-inverse" name="metodo" value="excel"><i class="fas fa-file-excel"></i> Exportar para Excel</button>
                        </div>
                    </form>
                </div>
                .
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".money").maskMoney();
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function (event, ui) {
                $("#clienteHide").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function (event, ui) {
                $("#responsavelHide").val(ui.item.id);
            }
        });
    });
</script>
