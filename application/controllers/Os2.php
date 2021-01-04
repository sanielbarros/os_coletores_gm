<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Os extends CI_Controller {

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */
    public function __construct() {
        parent::__construct();

        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('os_model', '', true);
        $this->data['menuOs'] = 'OS';
    }

    public function index() {
        $this->gerenciar();
    }

    public function gerenciar() {

        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = array();

        $pesquisa = $this->input->get('pesquisa');
        $pesquisaPatrimonio = $this->input->get('pesquisaPatrimonio');
        $status = $this->input->get('status');
        $de = $this->input->get('data');
        $ate = $this->input->get('data2');

        if ($pesquisa != null or $pesquisaPatrimonio or null or $status != null or $de != null or $ate != null) {
            if ($pesquisa) {
                $where_array['pesquisa'] = $pesquisa;
            }
            if ($pesquisaPatrimonio) {
                $where_array['pesquisaPatrimonio'] = $pesquisaPatrimonio;
            }
            if ($status) {
                $where_array['status'] = $status;
            }
            if ($de) {

                $de = explode('/', $de);
                $de = $de[2] . '-' . $de[1] . '-' . $de[0];

                $where_array['de'] = $de;
            }
            if ($ate) {
                $ate = explode('/', $ate);
                $ate = $ate[2] . '-' . $ate[1] . '-' . $ate[0];

                $where_array['ate'] = $ate;
            }
        } else {
            $where_array['pesquisaStatus'] = 1;
            $where_array['aberto'] = "Aberto";
            $where_array['orcamento'] = "Orçamento";
            $where_array['naoAprovado'] = "Não aprovado";
            $where_array['aguardandoPecas'] = "Aguar-peças";
            $where_array['manutencao'] = "Manutenção";
            $where_array['faturamento'] = "Faturamento";
            $where_array['transito'] = "Trânsito";
        }

        $config['base_url'] = base_url() . 'index.php/os/gerenciar/';
        $config['total_rows'] = $this->os_model->count('os2'); //os2 é uma view no DB que excluí tuplas com status finalizado e cancelado.
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $results = $this->os_model->getOs('os', 'idOs,dataInicial,dataPrevisao,dataFinal,garantia,refGarantia,descricaoProduto,defeito,status,observacoes,laudoTecnico,valorTotal,patrimonio,modelo,mac', $where_array, $config['per_page'], $this->uri->segment(3));

        //usado esclusivamente para o contador de OS
        $config2['per_page'] = 1000000;
        //$where_array2['contador'] = 1;
        $results2 = $this->os_model->getOs('os', 'status', $where_array, $config2['per_page'], $this->uri->segment(3));

        $this->data['results'] = $results;
        $this->data['results2'] = $results2;

        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['view'] = 'os/os';
        $this->load->view('tema/topo', $this->data);
    }

    public function gerenciar2() {
        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = array();

        $pesquisa = $this->input->get('pesquisa');
        $pesquisaPatrimonio = $this->input->get('pesquisaPatrimonio');
        $status = $this->input->get('status');
        $de = $this->input->get('data');
        $ate = $this->input->get('data2');

        if ($pesquisa) {
            $where_array['pesquisa'] = $pesquisa;
        }
        if ($pesquisaPatrimonio) {
            $where_array['pesquisaPatrimonio'] = $pesquisaPatrimonio;
        }
        if ($status) {
            $where_array['status'] = $status;
        }
        if ($de) {

            $de = explode('/', $de);
            $de = $de[2] . '-' . $de[1] . '-' . $de[0];

            $where_array['de'] = $de;
        }
        if ($ate) {
            $ate = explode('/', $ate);
            $ate = $ate[2] . '-' . $ate[1] . '-' . $ate[0];

            $where_array['ate'] = $ate;
        }

        $config['base_url'] = base_url() . 'index.php/os/gerenciar/';
        $config['total_rows'] = $this->os_model->count('os');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->data['results'] = $this->os_model->getOs('os', 'idOs,dataInicial,dataFinal,garantia,refGarantia,descricaoProduto,defeito,status,observacoes,laudoTecnico,valorTotal,patrimonio,modelo,mac', $where_array, $config['per_page'], $this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['view'] = 'os/os';
        $this->load->view('tema/topo', $this->data);
    }

    public function adicionar() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) {

            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar O.S.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('os') == false) {

            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {

            $dataInicial = $this->input->post('dataInicial');
            $dataFinalPrevisao = $this->input->post('dataFinalPrevisao');
            $termoGarantiaId = $this->input->post('termoGarantia');

            try {

                $dataInicial = explode('/', $dataInicial);
                $dataInicial = $dataInicial[2] . '-' . $dataInicial[1] . '-' . $dataInicial[0];

                if ($dataFinalPrevisao) {
                    $dataFinalPrevisao = explode('/', $dataFinalPrevisao);
                    $dataFinalPrevisao = $dataFinalPrevisao[2] . '-' . $dataFinalPrevisao[1] . '-' . $dataFinalPrevisao[0];
                } else {
                    $dataFinalPrevisao = date('Y/m/d');
                }

                $termoGarantiaId = (!$termoGarantiaId == null || !$termoGarantiaId == '') ? $this->input->post('garantias_id') : null;
            } catch (Exception $e) {
                $dataInicial = date('Y/m/d');
                $dataFinal = date('Y/m/d');
            }

            $data = array(
                'dataInicial' => $dataInicial,
                'clientes_id' => $this->input->post('clientes_id'), //set_value('idCliente'),
                'usuarios_id' => $this->input->post('usuarios_id'), //set_value('idUsuario'),
                'dataPrevisao' => $dataFinalPrevisao,
                'garantia' => set_value('garantia'),
                'garantias_id' => $termoGarantiaId,
                'descricaoProduto' => set_value('descricaoProduto'),
                'defeito' => set_value('defeito'),
                'status' => set_value('status'),
                'observacoes' => set_value('observacoes'),
                'laudoTecnico' => set_value('laudoTecnico'),
                'faturado' => 0,
                'patrimonio' => set_value('patrimonio'),
                'modelo' => set_value('modelo'),
                'mac' => set_value('mac'),
                'motivo' => set_value('motivo'),
                'bloco' => set_value('bloco'),
                'setor' => set_value('setor'),
                'tipo_os' => set_value('tipo_os'),
            );

            if (is_numeric($id = $this->os_model->add('os', $data, true))) {
                $this->load->model('mapos_model');
                $this->load->model('usuarios_model');

                $idOs = $id;
                $os = $this->os_model->getById($idOs);
                $emitente = $this->mapos_model->getEmitente()[0];
                $tecnico = $this->usuarios_model->getById($os->usuarios_id);

                $remetentes = [
                    $os->email,
                    $emitente->email,
                    $tecnico->email,
                ];
                $this->enviarOsPorEmail($idOs, $remetentes, 'Ordem de Serviço - Criada');

                $this->session->set_flashdata('success', 'OS adicionada com sucesso, você pode adicionar produtos ou serviços a essa OS nas abas de "Produtos" e "Serviços".');
                log_info('Adicionou uma OS');
                redirect('os/editar/' . $id);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
            }
        }

        $this->data['view'] = 'os/adicionarOs';
        $this->load->view('tema/topo', $this->data);
    }

    public function adicionarAjax() {
        $this->load->library('form_validation');

        if ($this->form_validation->run('os') == false) {
            $json = array("result" => false);
            echo json_encode($json);
        } else {
            $data = array(
                'dataInicial' => set_value('dataInicial'),
                'clientes_id' => $this->input->post('clientes_id'), //set_value('idCliente'),
                'usuarios_id' => $this->input->post('usuarios_id'), //set_value('idUsuario'),
                'dataPrevisao' => set_value('dataFinalPrevisao'),
                'garantia' => set_value('garantia'),
                'garantias_id' => $this->input->post('garantias_id'),
                'descricaoProduto' => set_value('descricaoProduto'),
                'defeito' => set_value('defeito'),
                'status' => set_value('status'),
                'observacoes' => set_value('observacoes'),
                'laudoTecnico' => set_value('laudoTecnico'),
                'patrimonio' => set_value('patrimonio'),
                'modelo' => set_value('modelo'),
                'mac' => set_value('mac'),
                'motivo' => set_value('motivo'),
                'bloco' => set_value('bloco'),
                'tipo_os' => set_value('tipo_os'),
            );

            if (is_numeric($id = $this->os_model->add('os', $data, true))) {
                $json = array("result" => true, "id" => $id);
                echo json_encode($json);
            } else {
                $json = array("result" => false);
                echo json_encode($json);
            }
        }
    }

    public function editar() {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar O.S.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('os') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $dataInicial = $this->input->post('dataInicial');
            $dataFinalPrevisao = $this->input->post('dataFinalPrevisao');
            $termoGarantiaId = $this->input->post('garantias_id') ?: null;

            try {

                $dataInicial = explode('/', $dataInicial);
                $dataInicial = $dataInicial[2] . '-' . $dataInicial[1] . '-' . $dataInicial[0];

                $dataFinalPrevisao = explode('/', $dataFinalPrevisao);
                $dataFinalPrevisao = $dataFinalPrevisao[2] . '-' . $dataFinalPrevisao[1] . '-' . $dataFinalPrevisao[0];
            } catch (Exception $e) {
                $dataInicial = date('Y/m/d');
            }

            $data = array(
                'dataInicial' => $dataInicial,
                'dataPrevisao' => $dataFinalPrevisao,
                'garantia' => $this->input->post('garantia'),
                'garantias_id' => $termoGarantiaId,
                'descricaoProduto' => $this->input->post('descricaoProduto'),
                'defeito' => $this->input->post('defeito'),
                'status' => $this->input->post('status'),
                'observacoes' => $this->input->post('observacoes'),
                'laudoTecnico' => $this->input->post('laudoTecnico'),
                'usuarios_id' => $this->input->post('usuarios_id'),
                'clientes_id' => $this->input->post('clientes_id'),
                'patrimonio' => $this->input->post('patrimonio'),
                'modelo' => $this->input->post('modelo'),
                'mac' => $this->input->post('mac'),
                'motivo' => $this->input->post('motivo'),
                'bloco' => set_value('bloco'),
                'tipo_os' => set_value('tipo_os'),
            );

            if ($this->os_model->edit('os', $data, 'idOs', $this->input->post('idOs')) == true) {
                $this->load->model('mapos_model');
                $this->load->model('usuarios_model');

                $idOs = $this->input->post('idOs');

                $os = $this->os_model->getById($idOs);
                $emitente = $this->mapos_model->getEmitente()[0];
                $tecnico = $this->usuarios_model->getById($os->usuarios_id);

                $remetentes = [
                    $os->email,
                    $emitente->email,
                    $tecnico->email,
                ];
                $this->enviarOsPorEmail($idOs, $remetentes, 'Ordem de Serviço - Editada');

                $this->session->set_flashdata('success', 'Os editada com sucesso!');
                log_info('Alterou uma OS. ID: ' . $this->input->post('idGarantias'));
                redirect(base_url() . 'index.php/os/editar/' . $this->input->post('idOs'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['anexos'] = $this->os_model->getAnexos($this->uri->segment(3));
        $this->data['anotacoes'] = $this->os_model->getAnotacoes($this->uri->segment(3));

        $this->load->model('mapos_model');
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->data['view'] = 'os/editarOs';
        $this->load->view('tema/topo', $this->data);
    }

    public function visualizar() {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar O.S.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['anexos'] = $this->os_model->getAnexos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->data['view'] = 'os/visualizarOs';
        $this->load->view('tema/topo', $this->data);
    }

    public function imprimir() {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar O.S.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->load->view('os/imprimirOs', $this->data);
    }

    public function enviar_email() {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para enviar O.S. por e-mail.');
            redirect(base_url());
        }

        $this->load->model('mapos_model');
        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        if (!isset($this->data['result']->email)) {
            $this->session->set_flashdata('error', 'O cliente não tem e-mail cadastrado.');
            redirect(site_url('os'));
        }

        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        if (!isset($this->data['emitente'][0]->email)) {
            $this->session->set_flashdata('error', 'Efetue o cadastro dos dados de emitente');
            redirect(site_url('os'));
        }

        $idOs = $this->uri->segment(3);
        $remetentes = [
            $this->data['result']->email,
        ];
        $enviouEmail = $this->enviarOsPorEmail($idOs, $remetentes, 'Ordem de Serviço');

        if ($enviouEmail) {
            $this->session->set_flashdata('success', 'O email está sendo processado e será enviado em breve para o cliente.');
            log_info('Enviou e-mail para o cliente: ' . $this->data['result']->nomeCliente . '. E-mail: ' . $this->data['result']->email);
            redirect(site_url('os'));
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao enviar e-mail para o cliente.');
            redirect(site_url('os'));
        }
    }

    public function excluir() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir O.S.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null) {

            $this->session->set_flashdata('error', 'Erro ao tentar excluir OS.');
            redirect(base_url() . 'index.php/os/gerenciar/');
        }

        $this->db->where('os_id', $id);
        $this->db->delete('servicos_os');

        $this->db->where('os_id', $id);
        $this->db->delete('produtos_os');

        $this->db->where('os_id', $id);
        $this->db->delete('anexos');

        $this->os_model->delete('os', 'idOs', $id);

        log_info('Removeu uma OS. ID: ' . $id);
        $this->session->set_flashdata('success', 'OS excluída com sucesso!');
        redirect(base_url() . 'index.php/os/gerenciar/');
    }

    public function autoCompleteProduto() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteProduto($q);
        }
    }

    public function autoCompleteProdutoSaida() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteProdutoSaida($q);
        }
    }

    public function autoCompleteCliente() {

        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteCliente($q);
        }
    }

    public function autoCompleteUsuario() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteUsuario($q);
        }
    }

    public function autoCompleteTermoGarantia() {

        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteTermoGarantia($q);
        }
    }

    public function autoCompleteServico() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteServico($q);
        }
    }

    public function adicionarProduto() {
        $preco = $this->input->post('preco');
        $quantidade = $this->input->post('quantidade');
        $subtotal = $preco * $quantidade;
        $produto = $this->input->post('idProduto');
        $data = array(
            'quantidade' => $quantidade,
            'subTotal' => $subtotal,
            'produtos_id' => $produto,
            'preco' => $preco,
            'os_id' => $this->input->post('idOsProduto'),
        );

        if ($this->os_model->add('produtos_os', $data) == true) {
            $sql = "UPDATE produtos set estoque = estoque - ? WHERE idProdutos = ?";
            $this->db->query($sql, array($quantidade, $produto));
            log_info('Adicionou produto a uma OS.');
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function excluirProduto() {
        $ID = $this->input->post('idProduto');
        if ($this->os_model->delete('produtos_os', 'idProdutos_os', $ID) == true) {

            $quantidade = $this->input->post('quantidade');
            $produto = $this->input->post('produto');

            $sql = "UPDATE produtos set estoque = estoque + ? WHERE idProdutos = ?";

            $this->db->query($sql, array($quantidade, $produto));

            log_info('Removeu produto de uma OS.');

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function adicionarServico() {

        $data = array(
            'servicos_id' => $this->input->post('idServico'),
            'quantidade' => $this->input->post('quantidade'),
            'preco' => $this->input->post('preco'),
            'os_id' => $this->input->post('idOsServico'),
            'subTotal' => $this->input->post('preco') * $this->input->post('quantidade'),
        );

        if ($this->os_model->add('servicos_os', $data) == true) {

            log_info('Adicionou serviço a uma OS.');
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function excluirServico() {
        $ID = $this->input->post('idServico');
        if ($this->os_model->delete('servicos_os', 'idServicos_os', $ID) == true) {

            log_info('Removeu serviço de uma OS.');
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function anexar() {
        $this->load->library('upload');
        $this->load->library('image_lib');

        $upload_conf = array(
            'upload_path' => realpath('./assets/anexos'),
            'allowed_types' => 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG|pdf|PDF|cdr|CDR|docx|DOCX|txt', // formatos permitidos para anexos de os
            'max_size' => 0,
        );

        $this->upload->initialize($upload_conf);

        foreach ($_FILES['userfile'] as $key => $val) {
            $i = 1;
            foreach ($val as $v) {
                $field_name = "file_" . $i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        unset($_FILES['userfile']);

        $error = array();
        $success = array();

        foreach ($_FILES as $field_name => $file) {
            if (!$this->upload->do_upload($field_name)) {
                $error['upload'][] = $this->upload->display_errors();
            } else {

                $upload_data = $this->upload->data();

                if ($upload_data['is_image'] == 1) {

                    // set the resize config
                    $resize_conf = array(
                        'source_image' => $upload_data['full_path'],
                        'new_image' => $upload_data['file_path'] . 'thumbs/thumb_' . $upload_data['file_name'],
                        'width' => 200,
                        'height' => 125,
                    );

                    $this->image_lib->initialize($resize_conf);

                    if ($this->image_lib->resize()) { //if (!$this->image_lib->resize()) {
                        $error['resize'][] = $this->image_lib->display_errors();
                    } else {
                        $success[] = $upload_data;
                        $this->load->model('Os_model');
                        $this->Os_model->anexar($this->input->post('idOsServico'), $upload_data['file_name'], base_url() . 'assets/anexos/', 'thumb_' . $upload_data['file_name'], realpath('./assets/anexos/'));
                    }
                } else {

                    $success[] = $upload_data;

                    $this->load->model('Os_model');

                    $this->Os_model->anexar($this->input->post('idOsServico'), $upload_data['file_name'], base_url() . 'assets/anexos/', '', realpath('./assets/anexos/'));
                }
            }
        }

        if (count($error) > 0) {
            echo json_encode(array('result' => false, 'mensagem' => 'Nenhum arquivo foi anexado.'));
        } else {

            log_info('Adicionou anexo(s) a uma OS.');
            echo json_encode(array('result' => true, 'mensagem' => 'Arquivo(s) anexado(s) com sucesso .'));
        }
    }

    public function excluirAnexo($id = null) {
        if ($id == null || !is_numeric($id)) {
            echo json_encode(array('result' => false, 'mensagem' => 'Erro ao tentar excluir anexo.'));
        } else {

            $this->db->where('idAnexos', $id);
            $file = $this->db->get('anexos', 1)->row();

            unlink($file->path . '/' . $file->anexo);

            if ($file->thumb != null) {
                unlink($file->path . '/thumbs/' . $file->thumb);
            }

            if ($this->os_model->delete('anexos', 'idAnexos', $id) == true) {

                log_info('Removeu anexo de uma OS.');
                echo json_encode(array('result' => true, 'mensagem' => 'Anexo excluído com sucesso.'));
            } else {
                echo json_encode(array('result' => false, 'mensagem' => 'Erro ao tentar excluir anexo.'));
            }
        }
    }

    public function downloadanexo($id = null) {
        if ($id != null && is_numeric($id)) {

            $this->db->where('idAnexos', $id);
            $file = $this->db->get('anexos', 1)->row();

            $this->load->library('zip');

            $path = $file->path;

            $this->zip->read_file($path . '/' . $file->anexo);

            $this->zip->download('file' . date('d-m-Y-H.i.s') . '.zip');
        }

        if ($id != null) {
            
        }
    }

    public function faturar() {

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('receita') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $vencimento = $this->input->post('vencimento');
            $recebimento = $this->input->post('recebimento');

            try {

                $vencimento = explode('/', $vencimento);
                $vencimento = $vencimento[2] . '-' . $vencimento[1] . '-' . $vencimento[0];

                if ($recebimento != null) {
                    $recebimento = explode('/', $recebimento);
                    $recebimento = $recebimento[2] . '-' . $recebimento[1] . '-' . $recebimento[0];
                }
            } catch (Exception $e) {
                $vencimento = date('Y/m/d');
            }

            $data = array(
                'descricao' => set_value('descricao'),
                'valor' => $this->input->post('valor'),
                'clientes_id' => $this->input->post('clientes_id'),
                'data_vencimento' => $vencimento,
                'data_pagamento' => $recebimento,
                'baixado' => $this->input->post('recebido') ?: 0,
                'cliente_fornecedor' => set_value('cliente'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => $this->input->post('tipo'),
            );

            if ($this->os_model->add('lancamentos', $data) == true) {

                $dataFinal = explode('/', date('d/m/Y'));
                $dataFinal = $dataFinal[2] . '-' . $dataFinal[1] . '-' . $dataFinal[0];

                $os = $this->input->post('os_id');

                $this->db->set('faturado', 1);
                $this->db->set('valorTotal', $this->input->post('valor'));
                $this->db->set('status', 'Trânsito');
                $this->db->set('dataFinal', $dataFinal);
                $this->db->where('idOs', $os);
                $this->db->update('os');

                log_info('Faturou uma OS. ID: ' . $os);
                $this->session->set_flashdata('success', 'OS faturada com sucesso! Status alterado para "Em trânsito"');
                $json = array('result' => true);
                echo json_encode($json);
                die();
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar OS.');
                $json = array('result' => false);
                echo json_encode($json);
                die();
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar OS.');
        $json = array('result' => false);
        echo json_encode($json);
    }

    private function enviarOsPorEmail($idOs, $remetentes, $assunto) {
        $dados = [];

        $this->load->model('mapos_model');
        $dados['result'] = $this->os_model->getById($idOs);
        if (!isset($dados['result']->email)) {
            return false;
        }

        $dados['produtos'] = $this->os_model->getProdutos($idOs);
        $dados['servicos'] = $this->os_model->getServicos($idOs);
        $dados['emitente'] = $this->mapos_model->getEmitente();

        $emitente = $dados['emitente'][0]->email;
        if (!isset($emitente)) {
            return false;
        }

        $html = $this->load->view('os/emails/os', $dados, true);

        $this->load->model('email_model');

        $remetentes = array_unique($remetentes);
        foreach ($remetentes as $remetente) {
            $headers = array('From' => $emitente, 'Subject' => $assunto, 'Return-Path' => '');
            $email = array(
                'to' => $remetente,
                'message' => $html,
                'status' => 'pending',
                'date' => date('Y-m-d H:i:s'),
                'headers' => serialize($headers),
            );
            $this->email_model->add('email_queue', $email);
        }

        return true;
    }

    public function adicionarAnotacao() {
        $this->load->library('form_validation');
        if ($this->form_validation->run('anotacoes_os') == false) {
            echo json_encode(validation_errors());
        } else {
            $data = array(
                'anotacao' => $this->input->post('anotacao'),
                'data_hora' => date('Y-m-d H:i:s'),
                'os_id' => $this->input->post('os_id'),
            );

            if ($this->os_model->add('anotacoes_os', $data) == true) {

                log_info('Adicionou anotação a uma OS.');
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        }
    }

    public function excluirAnotacao() {
        $id = $this->input->post('idAnotacao');
        if ($this->os_model->delete('anotacoes_os', 'idAnotacoes', $id) == true) {

            log_info('Removeu anotação de uma OS.');
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

}
