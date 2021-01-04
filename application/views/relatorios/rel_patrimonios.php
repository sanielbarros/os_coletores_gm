<div class="row-fluid" style="margin-top: 0">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Relatórios Rápidos</h5>
            </div>
            <div class="widget-content">
                <ul class="site-stats">
                    <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/patrimoniosRapid"><i class="fas fa-cash-register"></i> <small>Todos os Patrimônios</small></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="span8">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Relatórios Customizáveis</h5>
            </div>
            <div class="widget-content">
                <div class="span12 well">
                    <form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/patrimoniosCustom" method="get">
                        <div class="span12 well">
                            <div class="span6">
                                <label for="">Data do cadastro de:</label>
                                <input type="date" name="dataInicial" class="span12" />
                            </div>
                            <div class="span6">
                                <label for="">até:</label>
                                <input type="date" name="dataFinal" class="span12" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span6">
                                <label for="">Cliente:</label>
                                <input type="text" id="cliente" class="span12" />
                                <input type="hidden" name="cliente" id="clienteHide" />
                            </div>
                            <div class="span6">
                                <label for="">Vendedor:</label>
                                <input type="text" id="tecnico" class="span12" />
                                <input type="hidden" name="responsavel" id="responsavelHide" />
                            </div>
                        </div>
                        <div class="span12" style="margin-left: 0; text-align: center">
                            <input type="reset" class="btn" value="Limpar" />
                            <button class="btn btn-inverse"><i class="fas fa-print"></i> Imprimir</button>
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
    $(document).ready(function() {
        $(".money").maskMoney();
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function(event, ui) {
                $("#clienteHide").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function(event, ui) {
                $("#responsavelHide").val(ui.item.id);
            }
        });
    });
</script>
