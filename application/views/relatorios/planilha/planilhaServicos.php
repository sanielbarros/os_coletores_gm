<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Gerar relatório de comissão</title>
    </head>
    <body>
        <?php
        // Definimos o nome do arquivo que será exportado
        $arquivo = 'serviços.xls';

        // Criamos uma tabela HTML com o formato da planilha
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<td colspan="4" style="text-align:center"><b>Serviços</b></tr>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td><b>Nome</b></td>';
        $html .= '<td><b>Descrição</b></td>';
        $html .= '<td><b>Preço</b></td>';
        $html .= '<td><b>Comissão</b></td>';
        $html .= '</tr>';

        foreach ($servicos as $s) {

            $html .= '<tr>';
            $html .= '<td>' . $s->nome . '</td>';
            $html .= '<td>' . $s->descricao . '</td>';
            $html .= '<td style="text-align: center">' . $s->preco . '</td>';
            $html .= '<td style="text-align: center">' . $s->comissao . '</td>';
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