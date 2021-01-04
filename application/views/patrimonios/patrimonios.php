<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aPatrimonio')) { ?>
    <a href="<?php echo base_url(); ?>index.php/patrimonios/adicionar" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Patrimônios</a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-cash-register"></i>
        </span>
        <h5>Patrimônios</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered ">
            <thead>
                <tr style="backgroud-color: #2D335B">
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Plaqueta</th>
                    <th>Descrição</th>
                    <th>Referencia</th>
                    <th>Bloco</th>
                    <th>Setor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$results) {
                    echo '<tr>
                                <td colspan="5">Nenhum Patrimônio Cadastrado</td>
                            </tr>';
                }
                foreach ($results as $r) {
                    $dataPatrimonio = date(('d/m/Y'), strtotime($r->dataVenda));
                    echo '<tr>';
                    echo '<td>' . $r->idPatrimonios . '</td>';
                    echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '">' . $r->nomeCliente . '</a></td>';
                    echo '<td>' . $r->patrimonio . '</td>';
                    echo '<td>' . $r->descricao . '</td>';
                    echo '<td>' . $r->referencia . '</td>';
                    echo '<td>' . $r->bloco . '</td>';
                    echo '<td>' . $r->setor . '</td>';
                    echo '<td>';
                    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vPatrimonio')) {
                        echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/patrimonios/visualizar/?id=' . $r->idPatrimonios .'&p='. $r->patrimonio . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                        echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/patrimonios/imprimir/' . $r->idPatrimonios . '" target="_blank" class="btn btn-inverse tip-top" title="Imprimir"><i class="fas fa-print"></i></a>';
                    }
                    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'ePatrimonio')) {
                        echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/patrimonios/editar/' . $r->idPatrimonios . '" class="btn btn-info tip-top" title="Editar patrimônio"><i class="fas fa-edit"></i></a>';
                    }
                    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dPatrimonio')) {
                        echo '<a href="#modal-excluir" role="button" data-toggle="modal" venda="' . $r->idPatrimonios . '" class="btn btn-danger tip-top" title="Excluir patrimônio"><i class="fas fa-trash-alt"></i></a>';
                    }
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/patrimonios/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Patrimônio</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idVenda" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este patrimônio?</h5>
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
            var venda = $(this).attr('venda');
            $('#idVenda').val(venda);
        });
    });
</script>
