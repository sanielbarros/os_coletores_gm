

<?php
// alterar para permissão de o cliente adicionar ou não a ordem de serviço
if (!$this->session->userdata('cadastra_os')) {
    ?>
    <div class="span12" style="margin-left: 0">
        <div class="span3">
            <a href="<?php echo base_url(); ?>index.php/mine/adicionarOs" class="btn btn-success span12"><i class="fas fa-plus"></i> Adicionar OS</a>
        </div>
        <div class="span7"></div>
        <div class="span2">

            <?php if ($_GET['os_finalizadas'] == 'ok') { ?>
                <label for="os_finalizadas" span1>Ver OS Finalizadas <input type="checkbox" name="os_finalizadas" id='os_finalizadas' checked=""/></label>
            <?php } else { ?>
                <label for="os_finalizadas" span1>Ver OS Finalizadas <input type="checkbox" name="os_finalizadas" id='os_finalizadas'/></label>
            <?php } ?>

            <script>
                $('#os_finalizadas').click(function () {
                    //$("#os_finalizadas").toggle(this.checked);

                    if ($("#os_finalizadas").is(':checked')) {
                        //alert('teste sim').hide; 
                        window.location.href = "<?php echo site_url() ?>/mine/os/?os_finalizadas=ok";
                    } else {
                        window.location.href = "<?php echo site_url() ?>/mine/os/";
                    }
                });
            </script>

        </div>
    </div>

    <?php
}
?>

<?php
if (!$results) {
    ?>
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordens de Serviço</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>Responsável</th>
                            <th>Modelo Coletor</th>
                            <th>Data Inicial</th>
                            <th>Data Previsão</th>
                            <th>Patrimônio</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="6">Nenhuma OS Cadastrada</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } else {
    ?>

    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordens de Serviço</h5>

            </div>

            <div class="widget-content nopadding">


                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>#</th>
                            <th>Responsável</th>
                            <th>Modelo Coletor</th>
                            <th>Data Inicial</th>
                            <th>Data Previsão</th>
                            <th>Patrimônio</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contAberto = 0;
                        $contOrcamento = 0;
                        $contNaoAprovado = 0;
                        $contAguardPecas = 0;
                        $contManutencao = 0;
                        $contFaturamento = 0;
                        $contTransito = 0;

                        foreach ($results as $r) {
                            if ($_GET['os_finalizadas'] == 'ok') {
                                $statusCondicao = $r->status == 'Finalizado';
                            } else {
                                $statusCondicao = $r->status != 'Finalizado';
                            }
                            if ($statusCondicao) {
                                $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                                if ($r->dataPrevisao == null) {
                                    $dataPrevisao = "Pendente";
                                } else {
                                    $dataPrevisao = date(('d/m/Y'), strtotime($r->dataPrevisao));
                                }
                                
                                if ($r->status == "Aberto") {
                                    $status = '<span class="label label-success">Aberto</span>';
                                } elseif ($r->status == "Orçamento") {
                                    $status = '<span class="label label-info">Orçamento</span>';
                                } elseif ($r->status == "Aguar-peças") {
                                    $status = '<span class="label label-warning">Aguar-peças</span>';
                                } elseif ($r->status == "Manutenção") {
                                    $status = '<span class="label label-warning">Manutenção</span>';
                                } elseif ($r->status == "Faturamento") {
                                    $status = '<span class="label label-important">Faturamento</span>';
                                } elseif ($r->status == "Trânsito") {
                                    $status = '<span class="label label-inverse">Trânsito</span>';
                                } elseif ($r->status == "Finalizado") {
                                    $status = '<span class="label">Finalizado</span>';
                                } else {
                                    $status = '<span class="label">Cancelado</span>';
                                }
                                echo '<tr>';
                                echo '<td style="text-align:center">' . $r->idOs . '</td>';
                                echo '<td>' . $r->nome . '</td>';
                                echo '<td style="text-align:center">' . $r->modelo . '</td>';
                                echo '<td style="text-align:center">' . $dataInicial . '</td>';
                                echo '<td style="text-align:center">' . $dataPrevisao . '</td>';
                                echo '<td style="text-align:center">' . $r->patrimonio . '</td>';
                                echo '<td style="text-align:center">' . $status . '</td>';

                                echo '<td style="text-align:center"><a href="' . base_url() . 'index.php/mine/visualizarOs/' . $r->idOs . '" class="btn tip-top" title="Visualizar, Imprimir, Finalizar e Cancelar"><i class="fas fa-eye"></i></a>
                                  <a href="' . base_url() . 'index.php/mine/imprimirOs/' . $r->idOs . '" target="_blank" class="btn btn-inverse tip-top" title="Imprimir"><i class="fas fa-print"></i></a>
                                  <a href="' . base_url() . 'index.php/mine/detalhesOs/' . $r->idOs . '" class="btn btn-info tip-top" title="Ver mais detalhes"><i class="fas fa-bars"></i></a>   
                              </td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                        <tr>

                        </tr>
                        <?php
                        //Contador das OS
                        foreach ($results2 as $r2) {
                            if ($r2->status == "Aberto") {
                                $contAberto ++;
                            }
                            if ($r2->status == "Orçamento") {
                                $contOrcamento ++;
                            }
                            if ($r2->status == "Não aprovado") {
                                $contNaoAprovado ++;
                            }
                            if ($r2->status == "Aguar-peças") {
                                $contAguardPecas ++;
                            }
                            if ($r2->status == "Manutenção") {
                                $contManutencao ++;
                            }
                            if ($r2->status == "Faturamento") {
                                $contFaturamento ++;
                            }
                            if ($r2->status == "Trânsito") {
                                $contTransito ++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h5 style="text-align: center">
            <span style="color: #00cd00">Aberto: <?php echo $contAberto ?> </span>
            <span style="color: #CDB380">| Orçamento: <?php echo $contOrcamento ?> </span>
            <span style="color: #CD0000">| Não aprovado: <?php echo $contNaoAprovado ?> </span>
            <span style="color: #37772E">| Aguardando Peças: <?php echo $contAguardPecas ?> </span>
            <span style="color: #436eee">| Manutenção: <?php echo $contManutencao ?> </span>
            <span style="color: #256">| Faturamento: <?php echo $contFaturamento ?> </span>
            <span style="color: #E96329">| Trânsito: <?php echo $contTransito ?> </span>
            <span style="color: black">| Todas: <?php echo $contAberto + $contOrcamento + $contNaoAprovado + $contAguardPecas + $contManutencao + $contFaturamento + $contTransito ?> </span>
        </h5>
    </div>
    <?php
    echo $this->pagination->create_links();
}
?>
