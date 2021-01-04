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
                        <div class="widget-title">
                            <h4 style="text-align: center">Relatório Comissão Técnico</h4>
                        </div>
                        <div class="widget-content nopadding">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="font-size: 1.2em; padding: 5px;">Data</th>
                                        <!--<th style="font-size: 1.2em; padding: 5px;">Tipo</th>-->
                                        <th style="font-size: 1.2em; padding: 5px;">Técnico</th>
                                        <th style="font-size: 1.2em; padding: 5px;">Cliente</th>
                                        <th style="font-size: 1.2em; padding: 5px;">OS</th>
                                        <th style="font-size: 1.2em; padding: 5px;">Valor</th>
                                        <th style="font-size: 1.2em; padding: 5px;">Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalComissao = 0;
                                    foreach ($comissao as $c) {
                                        $dataGeracao = date('d/m/Y', strtotime($c->dataGeracao));
                                        $totalComissao = $totalComissao + $c->valorComissao;
                                        if ($c->pago == 1) {
                                            $situacao = 'Pago';
                                        } else {
                                            $situacao = 'Pendente';
                                        }

                                        echo '<tr>';
                                        echo '<td>' . $dataGeracao . '</td>';
                                        //echo '<td>' . $c->tipo . '</td>';
                                        echo '<td>' . $c->tecnico . '</td>';
                                        echo '<td>' . $c->clienteOs . '</td>';
                                        echo '<td>' . $c->os_id . '</td>';
                                        echo '<td>' . "R$ " . $c->valorComissao . '</td>';
                                        echo '<td>' . $situacao . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right; color: green">
                                            <strong>Total Comissão:</strong>
                                        </td>
                                        <td colspan="2" style="text-align: center; color: green">
                                            <strong>R$
                                                <?php echo number_format($totalComissao, 2, ',', '.') ?>
                                            </strong>
                                        </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <h5 style="text-align: right">Data do Relatório:
                        <?php echo date('d/m/Y'); ?>
                    </h5>

                </div>
            </div>
        </div>
    </body>

</html>
