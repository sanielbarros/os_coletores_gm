<?php $totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Central de OS Grupo Mateus</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-media.css" />
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
    </head>


    <body>
        <div class="widget-content" id="printOs">
            <div class="invoice-content">

                <table class="table">
                    <tbody>
                        <?php if ($emitente == null) { ?>
                            <tr>
                                <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                </td> </tr> <?php } else {
                            ?> <tr>
                                <td style="width: 20%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                <td> <span style="font-size: 20px; ">
                                        <?php echo $result->nomeCliente ?></span> <br><span class="cpfcnpj" >
                                        <?php echo $result->documento ?> </span><br>
                                    <?php echo $result->rua . ', nº:' . $result->numero . ', ' . $result->bairro . ' - ' . $result->cidade . ' - ' . $result->estado; ?> </span> </br> <span> E-mail:
                                        <?php echo $result->email . ' - Fone: ' . $result->telefone; ?></span></td>
                                <td style="width: 18%; text-align: center"><h5>#Patrimônio: <span>
                                            <?php echo $result->patrimonio ?></span></h5> <br/> <br/> 
                                    <?php if ($result->faturado) : ?>
                                        <br>
                                        Vencimento:
                                        <?php echo date('d/m/Y', strtotime($result->dataCadastroPatrimonio)); ?>
                                    <?php endif; ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
                <table class="table">
                    <tbody>
                        <tr>    
                            <td style="width: 34%; padding-left: 0">
                                <ul>
                                    <li>
                                        <span>
                                            <h5><b>Informações de Cadastro</b></h5>
                                        </span>
                                        <span><strong>Usuário:</strong>
                                            <?php echo $result->idUsuarios . ' - ' . $result->nome ?></span> <br />
                                        <span><strong>Data:</strong>
                                            <?php echo date('d/m/Y', strtotime($result->dataCadastroPatrimonio)); ?></span><br />
                                    </li>
                                </ul>
                            </td>
                            <td style="width: 33%; padding-left: 0">
                                <ul>
                                    <li>
                                        <span>
                                            <h5><b>Dados do patrimônio</b></h5>
                                        </span>
                                        <span><strong>Descrição:</strong>
                                            <?php echo $result->descricao ?></span><br />
                                        <span><strong>Fabricante:</strong>
                                            <?php echo $result->fabricante ?></span><br />
                                        <span><strong>Referência:</strong>
                                            <?php echo $result->referencia ?></span><br />
                                    </li>
                                </ul>
                            </td>
                            <td style="width: 33%; padding-left: 0">
                                <ul>
                                    <li>
                                        <span>
                                            <h5><b>Localização</b></h5>
                                        </span>
                                        <span><strong>Bloco:</strong> 
                                            <?php echo $result->bloco ?></span> <br />
                                        <span><strong>Setor:</strong>
                                            <?php echo $result->setor ?></span><br />
                                        <span><strong>Localização detalhada:</strong> 
                                            <?php if ($result->localizacao != "") { ?>
                                                <?php echo $result->localizacao; ?></span> <br />
                                        <?php } else { ?>
                                            <?php echo 'Não informado';
                                        } ?>

                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <div class="row-fluid" style="margin-top:0">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="fas fa-diagnoses"></i>
                                </span>
                                <h5>Histórico do patrimônio</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                                    <ul class="nav nav-tabs">
                                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Ocorrências</a></li>
                                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Ordens de Serviços</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="span12" id="divCadastrarOs">
                                                <div class="widget-content nopadding">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered ">
                                                            <thead>
                                                                <tr style="backgroud-color: #2D335B">
                                                                    <th>Tipo de ocorrência</th>
                                                                    <th>Data da ocorrência</th>
                                                                    <th>Usuário</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!$historicoPatrimonio) {
                                                                    echo '<tr>
                                                                        <td colspan="6">Não foi possível encontrar histórico de ocorrências para este patrimônio.</td>
                                                                        </tr>';
                                                                }

                                                                foreach ($historicoPatrimonio as $p) {
                                                                    echo '<tr>';
                                                                    echo '<td>' . $p->ocorrencia . '</td>';
                                                                    echo '<td>' . $p->dataOcorrencia . '</td>';
                                                                    echo '<td>' . $p->idUsuarios . ' - ' . $p->nome . '</td>';
                                                                    echo '</tr>';
                                                                }
                                                                ?>
                                                            </tbody>    
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <div class="span12 well" style="padding: 1%; margin-left: 0">
                                                <span>Não foi possível encontrar histórico de OS para este patrimônio.</span>
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
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>
        <script>
            window.print();
        </script>
    </body>
























    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="invoice-content">
                        <div class="invoice-head">
                            <table class="table">
                                <tbody>
<?php if ($emitente == null) { ?>
                                        <tr>
                                            <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                                <<<</td> </tr> <?php } else {
    ?> <tr>
                                            <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                            <td> <span style="font-size: 20px; ">
                                                    <?php echo $emitente[0]->nome; ?></span> </br><span>
                                                    <?php echo $emitente[0]->cnpj; ?> </br>
                                                    <?php echo $emitente[0]->rua . ', nº:' . $emitente[0]->numero . ', ' . $emitente[0]->bairro . ' - ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?> </span> </br> <span> E-mail:
                                                    <?php echo $emitente[0]->email . ' - Fone: ' . $emitente[0]->telefone; ?></span></td>
                                            <td style="width: 18%; text-align: center">#Venda: <span>
                                                    <?php echo $result->idVendas ?></span></br> </br> <span>Emissão:
                                                <?php echo date('d/m/Y'); ?></span>
    <?php if ($result->faturado) : ?>
                                                    <br>
                                                    Vencimento:
                                                    <?php echo date('d/m/Y', strtotime($result->data_vencimento)); ?>
    <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 50%; padding-left: 0">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <h5>Cliente</h5>
                                                        <span>
                                                            <?php echo $result->nomeCliente ?></span><br />
                                                        <span>
                                                            <?php echo $result->rua ?>,
                                                            <?php echo $result->numero ?>,
                                                            <?php echo $result->bairro ?></span><br />
                                                        <span>
                                                            <?php echo $result->cidade ?> -
<?php echo $result->estado ?></span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td style="width: 50%; padding-left: 0">
                                            <ul>
                                                <li>
                                                    <span>
                                                        <h5>Vendedor</h5>
                                                    </span>
                                                    <span>
                                                        <?php echo $result->nome ?></span> <br />
                                                    <span>Telefone:
                                                        <?php echo $result->telefone ?></span><br />
                                                    <span>Email:
<?php echo $result->email ?></span>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 0; padding-top: 0">
<?php if ($produtos != null) { ?>
                                <table class="table table-bordered table-condensed" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 15px">Produto</th>
                                            <th style="font-size: 15px">Quantidade</th>
                                            <th style="font-size: 15px">Preço unit.</th>
                                            <th style="font-size: 15px">Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($produtos as $p) {
                                            $totalProdutos = $totalProdutos + $p->subTotal;
                                            echo '<tr>';
                                            echo '<td>' . $p->descricao . '</td>';
                                            echo '<td>' . $p->quantidade . '</td>';
                                            echo '<td>' . ($p->preco ?: $p->precoVenda) . '</td>';
                                            echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$
    <?php echo number_format($totalProdutos, 2, ',', '.'); ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
    <?php }
?>
                            <hr />
                            <h4 style="text-align: right">Valor Total: R$
<?php echo number_format($totalProdutos, 2, ',', '.'); ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>
        <script>
            window.print();
        </script>
    </body>

</html>
