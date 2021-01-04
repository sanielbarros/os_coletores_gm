<!DOCTYPE html>
<html>

    <head>
        <title>CDD. MATEUS</title>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blue.css" class="skin-color" />
    </head>

    <body style="background-color: transparent">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <?= isset($topo) ? $topo : '' ?>
                        <div class="widget-title">
                            <h4 style="text-align: center">
                                <?= ucfirst($title) ?>
                            </h4>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="padding: 5px; text-align:center">DATA</th>
                                        <th style="padding: 5px; text-align:center">OS</th>
                                        <th style="padding: 5px; text-align:center">CLIENTE</th>
                                        <th style="padding: 5px; text-align:center">MODELO</th>
                                        <th style="padding: 5px; text-align:center">PATRIMÔNIO</th>
                                        <th style="padding: 5px; text-align:center">REFERÊNCIA</th>
                                        <th style="padding: 5px; text-align:center">STATUS</th>
                                        <th style="padding: 5px; text-align:center">TIPO</th>
                                        <th style="padding: 5px; text-align:center">MOTIVO</th>
                                        <th style="padding: 5px; text-align:center">VALOR</th>
                                        <!--
                                        <th style="padding: 5px;">TOTAL PRODUTOS</th>
                                        <th style="padding: 5px;">TOTAL SERVIÇOS</th>
                                        <th style="padding: 5px;">TOTAL SERVIÇOS</th>
                                        -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $valorTodasOS = 0;
                                    foreach ($os as $c) {
                                        echo '<tr>';
                                        echo '<td><small>' . date('d/m/Y', strtotime($c->dataInicial)) . '</small></td>';
                                        echo '<td><small>' . $c->idOs . '</small></td>';
                                        echo '<td><small>' . $c->nomeCliente . '</small></td>';
                                        echo '<td><small>' . $c->modelo . '</small></td>';
                                        echo '<td><small>' . $c->patrimonio . '</small></td>';
                                        echo '<td><small>' . $c->mac . '</small></td>';
                                        echo '<td><small>' . $c->status . '</small></td>';
                                        echo '<td><small>' . $c->tipo_os . '</small></td>';
                                        echo '<td><small>' . $c->motivo . '</small></td>';
                                        $totalOS = $c->total_produto + $c->total_servico;
                                        $valorTodasOS = $valorTodasOS + $totalOS;
                                        echo '<td><small>R$ ' . number_format($totalOS, 2, ',', '.') . '</small></td>';
                                        /*
                                          echo '<td><small>R$ ' . number_format($c->total_produto, 2, ',', '.') . '</small></td>';
                                          echo '<td><small>R$ ' . number_format($c->total_servico, 2, ',', '.') . '</small></td>';
                                          echo '<td><small>R$ ' . number_format($c->total_produto + $c->total_servico, 2, ',', '.') . '</small></td>';
                                         * 
                                         */
                                    }
                                    //echo '<td><small>' . $valorTodasOS . '</small></td>';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="widget-content nopadding " style="text-align: right">
                            <span>VALOR TOTAL: <?php echo 'R$ ' . $valorTodasOS; ?></span>
                        </div>
                    </div>
                    <br/>
                    <p style="text-align: right">Data do Relatório: <?php echo date('d/m/Y'); ?>
                    </p>
                </div>
            </div>
        </div>
    </body>

</html>
