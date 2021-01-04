<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Gerar relatório de comissão</title>
    </head>
    <body>
        <?php
        // Definimos o nome do arquivo que será exportado
        $arquivo = 'comissoes-tecnicos.xls';

        // Criamos uma tabela HTML com o formato da planilha
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<td colspan="6" style="text-align:center"><b>Comissões dos técnicos</b></tr>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td><b>Data</b></td>';
        $html .= '<td><b>Técnico</b></td>';
        $html .= '<td><b>Cliente</b></td>';
        $html .= '<td><b>OS</b></td>';
        $html .= '<td><b>Valor</b></td>';
        $html .= '<td><b>Situação</b></td>';
        $html .= '</tr>';

        foreach ($comissao as $c) {

            if ($c->pago == 0) {
                $situacao = "Pendente";
            } else {
                $situacao = "Pago";
            }

            $html .= '<tr>';
            $html .= '<td>' . $c->dataGeracao . '</td>';
            $html .= '<td>' . $c->tecnico . '</td>';
            $html .= '<td>' . $c->clienteOs . '</td>';
            $html .= '<td>' . $c->os_id . '</td>';
            $html .= '<td>' . $c->valorComissao . '</td>';
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