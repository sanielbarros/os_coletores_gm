<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/os/gerenciar">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) { ?>
            <div class="span3">
                <a href="<?php echo base_url(); ?>index.php/os/adicionar" class="btn btn-success span12"><i class="fas fa-plus"></i> Adicionar OS</a>
            </div>
        <?php }
        ?>

        <div class="span3">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Nome da filial a pesquisar" class="span12" value="">
            <input type="text" name="pesquisaPatrimonio" id="pesquisaPatrimonio" placeholder="Nº do patrimônio a pesquisar" class="span12" value="">
        </div>
        <div class="span2">
            <select name="status[]" id="status" class="span12" multiple>
                <option value="">Selecione status</option>
                <option value="Aberto">Aberto</option>
                <option value="Orçamento">Orçamento</option>
                <option value="Não aprovado">Não aprovado</option>
                <option value="Aguar-peças">Aguardando Peças</option>
                <option value="Manutenção">Manutenção</option>
                <option value="Faturamento">Faturamento</option>
                <option value="Trânsito">Trânsito</option>
            </select>

        </div>

        <div class="span3">
            <input type="text" name="data" id="data" placeholder="Data Inicial" class="span6 datepicker" value="">
            <input type="text" name="data2" id="data2" placeholder="Data Previsão" class="span6 datepicker" value="">
        </div>
        <div class="span1">
            <button class="span12 btn"> <i class="fas fa-search"></i> </button>
        </div>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-diagnoses"></i>
        </span>
        <h5>Ordens de Serviço</h5>
    </div>
    <div class="widget-content nopadding">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="backgroud-color: #2D335B">
                        <th>N° OS</th>
                        <th>Cliente</th>
                        <th>Modelo</th>
                        <th>Patrimônio</th>
                        <th>Data Inicial</th>
                        <th>Data Previsão</th>
                        <!--<th>Valor Total</th>-->
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$results) {
                        echo '<tr>
                                    <td colspan="6">Nenhuma OS Cadastrada</td>
                                  </tr>';
                    }

                    $contAberto = 0;
                    $contOrcamento = 0;
                    $contNaoAprovado = 0;
                    $contAguardPecas = 0;
                    $contManutencao = 0;
                    $contFaturamento = 0;
                    $contTransito = 0;

                    foreach ($results as $r) {
                        $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                        if ($r->dataPrevisao != null) {
                            $dataFinalPrevisao = date(('d/m/Y'), strtotime($r->dataPrevisao));
                        } else {
                            $dataFinalPrevisao = "";
                        }
                        switch ($r->status) {
                            case 'Aberto':
                                $cor = '#00cd00';
                                break;
                            case 'Orçamento':
                                $cor = '#CDB380';
                                break;
                            case 'Não aprovado':
                                $cor = '#CD0000';
                                break;
                            case 'Aguar-peças':
                                $cor = '#37772E';
                                break;
                            case 'Manutenção':
                                $cor = '#436eee';
                                break;
                            case 'Faturamento':
                                $cor = '#256';
                                break;
                            case 'Trânsito':
                                $cor = '#E96329';
                                break;
                            case 'Finalizado':
                                $cor = '#B266FF';
                                break;
                            case 'Cancelado':
                                $cor = '#CD0000';
                                break;
                            default:
                                $cor = '#E0E4CC';
                                break;
                        }

                        if (($r->status != 'Finalizado') && ($r->status != 'Cancelado')) {
                            echo '<tr>';
                            echo '<td>' . $r->idOs . '</td>';
                            echo '<td>' . $r->nomeCliente . '</td>';
                            echo '<td>' . $r->modelo . '</td>';
                            echo '<td>' . $r->patrimonio . '</td>';
                            echo '<td style="text-align:center">' . $dataInicial . '</td>';
                            echo '<td style="text-align:center">' . $dataFinalPrevisao . '</td>';
                            //echo '<td>R$ ' . number_format($r->valorTotal, 2, ',', '.') . '</td>';

                            echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';

                            echo '<td>';
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/imprimir/' . $r->idOs . '" target="_blank" class="btn btn-inverse tip-top" title="Imprimir"><i class="fas fa-print"></i></a>';

                                $zapnumber = preg_replace("/[^0-9]/", "", $r->celular_cliente);
                                echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $r->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $r->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($r->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $r->status . '*.%0d%0aFavor%20entrar%20em%20contato%20para%20saber%20mais%20detalhes.%0d%0a%0d%0aAtenciosamente,%20_' . ($emitente ? $emitente[0]->nome : '') . '%20' . ($emitente ? $emitente[0]->telefone : '') . '_"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/enviar_email/' . $r->idOs . '" class="btn btn-warning tip-top" title="Enviar por E-mail"><i class="fas fa-envelope"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOs')) {
                                echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idOs . '" class="btn btn-danger tip-top" title="Excluir OS"><i class="fas fa-trash-alt"></i></a>  ';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
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


<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/os/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir OS</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idOs" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir esta OS?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', 'a', function (event) {
            var os = $(this).attr('os');
            $('#idOs').val(os);
        });
        $(document).on('click', '#excluir-notificacao', function (event) {
            event.preventDefault();
            $.ajax({
                url: '<?php echo site_url() ?>/os/excluir_notificacao',
                type: 'GET',
                dataType: 'json',
            })
                    .done(function (data) {
                        if (data.result == true) {
                            Swal.fire({
                                type: "success",
                                title: "Sucesso",
                                text: "Notificação excluída com sucesso."
                            });
                            location.reload();
                        } else {
                            Swal.fire({
                                type: "success",
                                title: "Sucesso",
                                text: "Ocorreu um problema ao tentar excluir notificação."
                            });
                        }
                    });
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });

    $("#pesquisa").autocomplete({
        source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
        minLength: 1,
        select: function (event, ui) {
            $("#pesquisa").val(ui.item.id);
        }
    });
</script>
