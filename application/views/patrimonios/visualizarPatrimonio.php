<?php $totalProdutos = 0; ?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Patrimônio <?php echo $result->patrimonio ?></h5>
                <div class="buttons">
                    <?php
                    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
                        echo '<a title="Editar Patrimônio" class="btn btn-mini btn-info" href="' . base_url() . 'index.php/patrimonios/editar/' . $result->idPatrimonios . '"><i class="fas fa-edit"></i> Editar</a>';
                    }
                    ?>
                    <a target="_blank" title="Imprimir" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/patrimonios/imprimir/<?php echo $result->idPatrimonios; ?>"><i class="fas fa-print"></i> Imprimir</a>
                </div>
            </div>
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">Dados do Patrimônio</a></li>
                    <li><a data-toggle="tab" href="#tab2">Histórico de Ordens de Serviço</a></li>
                    <li><a data-toggle="tab" href="#tab3">Histórico do Patrimônio</a></li>
                </ul>   
            </div>

            <!--Tab-->
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active" style="min-height: 300px">

                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-user"></i></span>
                                        <h5>Dados Cadastrais</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse in accordion-body" id="collapseGOne">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: right; width: 30%"><strong>Cliente</strong></td>
                                                <td>
                                                    <a href='<?php echo base_url() ?>index.php/clientes/visualizar/<?php echo $result->clientes_id ?>'> <?php echo $result->nomeCliente ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right"><strong>Usuário</strong></td>
                                                <td>
                                                    <?php echo $result->idUsuarios . ' - ' . $result->nome ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; width: 30%"><strong>Plaqueta do patrimônio</strong></td>
                                                <td>
                                                    <?php echo $result->patrimonio ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                                <td>
                                                    <?php echo date('d/m/Y', strtotime($result->dataCadastroPatrimonio)); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-tags"></i></span>
                                        <h5>Descrição</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGTwo">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: right; width: 30%"><strong>Descrição</strong></td>
                                                <td>
                                                    <?php echo $result->descricao ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right"><strong>Fabricante</strong></td>
                                                <td>
                                                    <?php echo $result->fabricante ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right"><strong>Tipo de referência</strong></td>
                                                <td>
                                                    <?php echo $result->tipoReferencia ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right"><strong>Referência</strong></td>
                                                <td>
                                                    <?php echo $result->referencia ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group widget-box">
                            <div class="accordion-heading">
                                <div class="widget-title">
                                    <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
                                        <span class="icon"><i class="fas fa-map-marked-alt"></i></span>
                                        <h5>Localização</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse accordion-body" id="collapseGThree">
                                <div class="widget-content">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: right; width: 30%"><strong>Bloco</strong></td>
                                                <td>
                                                    <?php echo $result->bloco ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right"><strong>Setor</strong></td>
                                                <td>
                                                    <?php echo $result->setor ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right"><strong>Localização detalhada</strong></td>
                                                <td>
                                                    <?php
                                                    echo ($result->localizacao != "" ? $result->localizacao : 'Não informado');
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Tab 2-->
                <div id="tab2" class="tab-pane" style="min-height: 300px">
                    <?php if (!$resultGetOs) { ?>

                        <table class="table table-bordered ">
                            <thead>
                                <tr style="backgroud-color: #2D335B">
                                    <th>N° OS</th>
                                    <th>Data Inicial</th>
                                    <th>Data Final</th>
                                    <th>Defeito</th>
                                    <th>Motivo</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="6">Nenhuma ordem de serviço foi encontrada para este patrimônio.</td>
                                </tr>
                            </tbody>
                        </table>

                    <?php } else {
                        ?>
                        <table class="table table-bordered ">
                            <thead>
                                <tr style="backgroud-color: #2D335B">
                                    <th>N° OS</th>
                                    <th>Data Inicial</th>
                                    <th>Data Final</th>
                                    <th>Defeito</th>
                                    <th>Motivo</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resultGetOs as $getOs) {
                                    $dataInicial = date(('d/m/Y'), strtotime($getOs->dataInicial));

                                    //Condicional top
                                    $dataFinal= ($getOs->dataFinal != NULL) ? date(('d/m/Y'), strtotime($getOs->dataFinal)) : "Pendente";

                                    echo '<tr>';
                                    echo '<td style="text-align:center">' . $getOs->idOs . '</td>';
                                    echo '<td style="text-align:center">' . $dataInicial . '</td>';
                                    echo '<td style="text-align:center">' . $dataFinal . '</td>';
                                    echo '<td>' . $getOs->defeito . '</td>';
                                    echo '<td>' . $getOs->motivo . '</td>';
                                    echo '<td style="text-align:center">' . $getOs->status . '</td>';
                                    echo '<td>';
                                    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                        echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                                    }
                                    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                                        echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                                    }

                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                                <tr>

                                </tr>
                            </tbody>
                        </table>

                    <?php }
                    ?>

                </div>

                <!--Tab 3-->
                <div id="tab3" class="tab-pane" style="min-height: 300px">
                    <?php if (!$historicoPatrimonio) { ?>

                        <table class="table table-bordered ">
                            <thead>
                                <tr style="backgroud-color: #2D335B">
                                    <th>N° da ocorrência</th>
                                    <th>Data</th>
                                    <th>Descrição da ocorrência</th>
                                    <th>Usuário</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="6">Nenhuma ocorrência encontrada para este patrimônio.</td>
                                </tr>
                            </tbody>
                        </table>

                    <?php } else {
                        ?>

                        <table class="table table-bordered ">
                            <thead>
                                <tr style="backgroud-color: #2D335B">
                                    <th>ID da ocorrência</th>
                                    <th>Data</th>
                                    <th>Descrição da ocorrência</th>
                                    <th>Usuário</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($historicoPatrimonio as $p) {
                                    $dataOcorrencia = date(('d/m/Y'), strtotime($p->dataOcorrencia));

                                    echo '<tr>';
                                    echo '<td style="text-align:center">' . $p->idHistoricoPatrimonios . '</td>';
                                    echo '<td style="text-align:center">' . $dataOcorrencia . '</td>';
                                    echo '<td>' . $p->ocorrencia . '</td>';
                                    echo '<td>' . $p->idUsuarios . ' - ' . $p->nome . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                                <tr>

                                </tr>
                            </tbody>
                        </table>


                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
