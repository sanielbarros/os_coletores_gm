<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Gerar relatório de faturas</title>
    </head>
    <body>
        <?php
        // Definimos o nome do arquivo que será exportado
        $arquivo = 'lançamentos-de-OS.xls';

        // Criamos uma tabela HTML com o formato da planilha
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<td colspan="7" style="text-align:center"><b>Lançamentos de OS (faturas)</b></tr>';
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td><b>Cliente</b></td>';
        $html .= '<td><b>Tipo</b></td>';
        $html .= '<td><b>Vencimento</b></td>';
        $html .= '<td><b>Pagamento</b></td>';
        $html .= '<td><b>OS</b></td>';
        $html .= '<td><b>Valor</b></td>';
        $html .= '<td><b>Situação</b></td>';
        $html .= '</tr>';

        foreach ($lancamentos as $l) {

            if ($l->baixado == 1) {
                $situacao = "Pago";
            } else {
                $situacao = "Pendente";
            }

            $html .= '<tr>';
            $html .= '<td>' . $l->cliente_fornecedor . '</td>';
            $html .= '<td>' . $l->tipo . '</td>';
            $html .= '<td>' . $l->data_vencimento . '</td>';
            $html .= '<td>' . $l->data_pagamento . '</td>';
            $html .= '<td>' . $l->os_id . '</td>';
            $html .= '<td>' . $l->valor . '</td>';
            $html .= '<td>' . $situacao . '</td>';
            $html .= '</tr>';
        }


        // Configurações header para forçar o download
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header("Content-Description: PHP Generated Data");
        // Envia o conteúdo do arquivo
        echo $html;
        exit;
        ?>
    </body>
</html>