<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Financeiro</h5>
            </div>
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">Lançamentos de OS (faturas)</a></li>
                    <li><a data-toggle="tab" href="#tab2">Comissões dos técnicos</a></li>
                </ul>   
            </div>

            <!--Tab-->
            <div class="widget-content tab-content">

                <!--Tab 1-->
                <div id="tab1" class="tab-pane active" style="min-height: 300px">
                    <div class="row-fluid" style="margin-top: 0">
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </span>
                                    <h5>Relatórios Rápidos</h5>
                                </div>
                                <div class="widget-content">
                                    <ul class="site-stats">
                                        <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/financeiroRapid/?metodo=pdf"><i class="fas fa-hand-holding-usd"></i> <small>Relatório do mês (PDF)</small></a></li>
                                    </ul>
                                </div>
                                <div class="widget-content">
                                    <ul class="site-stats">
                                        <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/financeiroRapid/?metodo=excel"><i class="fas fa-hand-holding-usd"></i> <small>Relatório do mês (EXCEL)</small></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="span8">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </span>
                                    <h5>Relatórios Customizáveis</h5>
                                </div>
                                <div class="widget-content">
                                    <form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/financeiroCustom" method="get">
                                        <div class="span12 well">

                                            <div class="span6">
                                                <label for="">Vencimento de:</label>
                                                <input type="date" name="dataInicial" class="span12" />
                                            </div>
                                            <div class="span6">
                                                <label for="">até:</label>
                                                <input type="date" name="dataFinal" class="span12" />
                                            </div>

                                        </div>

                                        <div class="span12 well" style="margin-left: 0">
                                            <div class="span6">
                                                <label for="">Tipo:</label>
                                                <select name="tipo" class="span12">
                                                    <option value="todos">Todos</option>
                                                    <option value="receita">Receita</option>
                                                    <option value="despesa">Despesa</option>
                                                </select>
                                            </div>
                                            <div class="span6">
                                                <label for="">Situação:</label>
                                                <select name="situacao" class="span12">
                                                    <option value="todos">Todos</option>
                                                    <option value="pago">Pago</option>
                                                    <option value="pendente">Pendente</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="span12" style="margin-left: 0; text-align: center">
                                            <input type="reset" class="btn" value="Limpar" />
                                            <button class="btn btn-inverse" name="metodo" value="pdf"><i class="fas fa-print"></i> Imprimir PDF</button>
                                            <button class="btn btn-inverse" name="metodo" value="excel"><i class="fas fa-file-excel"></i> Exportar para Excel</button>
                                        </div>
                                    </form>
                                    &nbsp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tab 2-->
                <div id="tab2" class="tab-pane" style="min-height: 300px">
                    <div class="row-fluid" style="margin-top: 0">
                        <div class="span4">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </span>
                                    <h5>Relatórios Rápidos</h5>
                                </div>
                                <div class="widget-content">
                                    <ul class="site-stats">
                                        <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/comissaoRapid/?metodo=pdf"><i class="fas fa-hand-holding-usd"></i> <small>Relatório do mês (PDF)</small></a></li>
                                    </ul>
                                </div>
                                <div class="widget-content">
                                    <ul class="site-stats">
                                        <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/comissaoRapid/?metodo=excel"><i class="fas fa-hand-holding-usd"></i> <small>Relatório do mês (EXCEL)</small></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="span8">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </span>
                                    <h5>Relatórios Customizáveis</h5>
                                </div>
                                <div class="widget-content">
                                    <form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/comissaoCustom" method="get">
                                        <div class="span12 well">

                                            <div class="span6">
                                                <label for="">Intervalo de:</label>
                                                <input type="date" name="dataInicial" class="span12" />
                                            </div>
                                            <div class="span6">
                                                <label for="">até:</label>
                                                <input type="date" name="dataFinal" class="span12" />
                                            </div>

                                        </div>

                                        <div class="span12 well" style="margin-left: 0">
                                            <div class="span6">
                                                <label for="">Técnico:</label>
                                                <select name="tecnico" class="span12">
                                                    <option value="todos">Todos</option>
                                                    <?php if (count($comboboxTecnico)) { ?>
                                                        <script>alert("teste");</script> <?php
                                                        foreach ($comboboxTecnico as $ct) {
                                                            ?>
                                                            <option value="<?php echo $ct['nome'] ?>" > <?php echo $ct['nome'] ?></option>
                                                            <!--<option value="SANIEL BARROS ALVES">SANIEL BARROS ALVES</option>-->
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="span6">
                                                <label for="">Situação:</label>
                                                <select name="situacao" class="span12">
                                                    <option value="todos">Todos</option>
                                                    <option value="pago">Pago</option>
                                                    <option value="pendente">Pendente</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="span12" style="margin-left: 0; text-align: center">
                                            <input type="reset" class="btn" value="Limpar" />
                                            <button class="btn btn-inverse" name="metodo" value="pdf"><i class="fas fa-print"></i> Imprimir PDF</button>
                                            <button class="btn btn-inverse" name="metodo" value="excel"><i class="fas fa-file-excel"></i> Exportar para Excel</button>
                                        </div>
                                    </form>
                                    &nbsp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

