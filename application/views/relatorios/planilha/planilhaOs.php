<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Gerar relatório de ordens de serviços</title>
    </head>
    <body>
        <?php
        // Definimos o nome do arquivo que será exportado
        $arquivo = 'ordens-de-serviços.xls';

        // Criamos uma tabela HTML com o formato da planilha
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<td colspan="10" style="text-align:center"><b>Ordens de Serviços</b></tr>';
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td><b>Data</b></td>';
        $html .= '<td><b>OS</b></td>';
        $html .= '<td><b>Cliente</b></td>';
        $html .= '<td><b>Modelo</b></td>';
        $html .= '<td><b>Patrimônio</b></td>';
        $html .= '<td><b>Referência</b></td>';
        $html .= '<td><b>Status</b></td>';
        $html .= '<td><b>Tipo</b></td>';
        $html .= '<td><b>Motivo</b></td>';
        $html .= '<td><b>Valor</b></td>';
        $html .= '</tr>';

        foreach ($os as $o) {

            $html .= '<tr>';
            $html .= '<td>' . date('d/m/Y', strtotime($o->dataInicial)) . '</td>';
            $html .= '<td>' . $o->idOs . '</td>';
            $html .= '<td>' . $o->nomeCliente . '</td>';
            $html .= '<td>' . $o->modelo . '</td>';
            $html .= '<td>' . $o->patrimonio . '</td>';
            $html .= '<td>' . $o->mac . '</td>';
            $html .= '<td>' . $o->status . '</td>';
            $html .= '<td>' . $o->tipo_os . '</td>';
            $html .= '<td>' . $o->motivo . '</td>';
            $totalOS = $o->total_produto + $o->total_servico;
            $html .= '<td>' . number_format($totalOS, 2, ',', '.') . '</td>';
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