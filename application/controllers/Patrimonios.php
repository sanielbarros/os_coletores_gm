<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Patrimonios extends CI_Controller {

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
        $this->load->model('patrimonios_model', '', true);
        $this->data['$menuPatrimonios'] = 'Patrimonios';
    }

    public function index() {
        $this->gerenciar();
    }

    public function gerenciar() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar vendas.');
            redirect(base_url());
        }

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/patrimonios/gerenciar/';
        $config['total_rows'] = $this->patrimonios_model->count('patrimonios');
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

        $this->data['results'] = $this->patrimonios_model->get('patrimonios', '*', '', $config['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'patrimonios/patrimonios';
        $this->load->view('tema/topo', $this->data);
    }

    public function historicoPatrimonio($ocorrencia, $usuario, $id) {

        $dataOcorrencia = explode('/', date('d/m/Y'));
        $dataOcorrencia = $dataOcorrencia[2] . '-' . $dataOcorrencia[1] . '-' . $dataOcorrencia[0];

        $data = array(
            'dataOcorrencia' => $dataOcorrencia,
            'ocorrencia' => $ocorrencia,
            'usuarios_id' => $usuario,
            'patrimonios_id' => $id,
        );

        $this->patrimonios_model->add('historico_patrimonios', $data, true);
    }

    public function adicionar() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aPatrimonio')) {

            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar patrimônios.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('patrimonios') == false) {

            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {

            $dataCadastro = $this->input->post('dataCadastro');

            $dataCadastro = explode('/', $dataCadastro);
            $dataCadastro = $dataCadastro[2] . '-' . $dataCadastro[1] . '-' . $dataCadastro[0];

            $data = array(
                'dataCadastro' => $dataCadastro,
                'clientes_id' => $this->input->post('clientes_id'),
                'usuarios_id' => $this->input->post('usuarios_id'),
                'patrimonio' => set_value('plaquetaPatrimonio'),
                'descricao' => set_value('descricao'),
                'fabricante' => set_value('fabricante'),
                'tipoReferencia' => set_value('tipoReferencia'),
                'referencia' => set_value('referencia'),
                'bloco' => set_value('bloco'),
                'setor' => set_value('setor'),
                'localizacao' => set_value('localizacao'),
            );

            if (is_numeric($id = $this->patrimonios_model->add('patrimonios', $data, true))) {
                $this->session->set_flashdata('success', 'Patrimônio criado com sucesso, você pode acompanhar o histórico por aqui.');
                $this->historicoPatrimonio('Cadastro do patrimônio.', $this->input->post('usuarios_id'), $id);
                log_info('Cadastrou um patrimônio. Número: '. $id);
                redirect('patrimonios/visualizar/?id=' . $id.'p=' . set_value('plaquetaPatrimonio'));
            } else {

                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'patrimonios/adicionarPatrimonio';
        $this->load->view('tema/topo', $this->data);
    }

    public function editar() {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'ePatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar patrimônios');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('patrimonios') == false) {

            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $dataCadastro = $this->input->post('dataCadastro');


            $dataCadastro = explode('/', $dataCadastro);
            $dataCadastro = $dataCadastro[2] . '-' . $dataCadastro[1] . '-' . $dataCadastro[0];


            $data = array(
                'dataCadastro' => $dataCadastro,
                'clientes_id' => $this->input->post('clientes_id'),
                'usuarios_id' => $this->input->post('usuarios_id'),
                'patrimonio' => set_value('patrimonio'),
                'descricao' => set_value('descricao'),
                'fabricante' => set_value('fabricante'),
                'tipoReferencia' => set_value('tipoReferencia'),
                'referencia' => set_value('referencia'),
                'bloco' => set_value('bloco'),
                'setor' => set_value('setor'),
                'localizacao' => set_value('localizacao'),
            );

            if ($this->patrimonios_model->edit('patrimonios', $data, 'idPatrimonios', $this->input->post('idPatrimonios')) == true) { //alterei para false
                $this->session->set_flashdata('success', 'Patrimônio editado com sucesso!');
                log_info('Alterou o patrimônio ' . $this->input->post('patrimonio') . '. ID: ' . $this->input->post('idPatrimonios'));
                redirect(base_url() . 'index.php/patrimonios/visualizar/' . $this->input->post('idPatrimonios'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->patrimonios_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->patrimonios_model->getProdutos($this->uri->segment(3));
        $this->data['view'] = 'patrimonios/editarPatrimonio';
        $this->load->view('tema/topo', $this->data);
    }

    public function visualizar() {
        /*
          if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
          $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
          redirect('mapos');
          } */

        $idPatrimonio = $_GET['id'];
        $patrimonio = $_GET['p'];

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar patrimônios.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->patrimonios_model->getById($idPatrimonio);
        $this->data['historicoPatrimonio'] = $this->patrimonios_model->getHistoricoPatrimonio($idPatrimonio);
        $this->data['resultGetOs'] = $this->patrimonios_model->getOsByPatrimonio($patrimonio);
        //$this->data['produtos'] = $this->patrimonios_model->getProdutos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->data['view'] = 'patrimonios/visualizarPatrimonio';
        $this->load->view('tema/topo', $this->data);
    }

    public function imprimir() {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vPatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar patrimônios.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->patrimonios_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->patrimonios_model->getProdutos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->load->view('patrimonios/imprimirPatrimonio', $this->data);
    }

    public function excluir() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dPatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir patrimônios');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null) {

            $this->session->set_flashdata('error', 'Erro ao tentar excluir patrimônio.');
            redirect(base_url() . 'index.php/patrimonios/gerenciar/');
        }

        //$this->db->where('vendas_id', $id);
        //$this->db->delete('itens_de_vendas');

        $this->db->where('idPatrimonios', $id);
        $this->db->delete('patrimonios');

        log_info('Removeu o patrimonio ' . $this->input->post('patrimonio') . '. ID: ' . $id);

        $this->session->set_flashdata('success', 'Patrimônio excluído com sucesso!');
        redirect(base_url() . 'index.php/patrimonios/gerenciar/');
    }

    public function autoCompleteProduto() {

        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->patrimonios_model->autoCompleteProduto($q);
        }
    }

    public function autoCompleteCliente() {

        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->patrimonios_model->autoCompleteCliente($q);
        }
    }

    public function autoCompleteUsuario() {

        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->patrimonios_model->autoCompleteUsuario($q);
        }
    }

    public function adicionarProduto() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'ePatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar venda.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'trim|required');
        $this->form_validation->set_rules('idProduto', 'Produto', 'trim|required');
        $this->form_validation->set_rules('idVendasProduto', 'Vendas', 'trim|required');

        if ($this->form_validation->run() == false) {
            echo json_encode(array('result' => false));
        } else {

            $preco = $this->input->post('preco');
            $quantidade = $this->input->post('quantidade');
            $subtotal = $preco * $quantidade;
            $produto = $this->input->post('idProduto');
            $data = array(
                'quantidade' => $quantidade,
                'subTotal' => $subtotal,
                'produtos_id' => $produto,
                'preco' => $preco,
                'vendas_id' => $this->input->post('idVendasProduto'),
            );

            if ($this->patrimonios_model->add('itens_de_vendas', $data) == true) {
                $sql = "UPDATE produtos set estoque = estoque - ? WHERE idProdutos = ?";
                $this->db->query($sql, array($quantidade, $produto));

                log_info('Adicionou produto a uma venda.');

                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        }
    }

    public function excluirProduto() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'ePatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar Vendas');
            redirect(base_url());
        }

        $ID = $this->input->post('idProduto');
        if ($this->vendas_model->delete('itens_de_vendas', 'idItens', $ID) == true) {

            $quantidade = $this->input->post('quantidade');
            $produto = $this->input->post('produto');

            $sql = "UPDATE produtos set estoque = estoque + ? WHERE idProdutos = ?";

            $this->db->query($sql, array($quantidade, $produto));

            log_info('Removeu produto de uma venda.');
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function faturar() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'ePatrimonio')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar Vendas');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('receita') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $venda_id = $this->input->post('vendas_id');
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
                'vendas_id' => $venda_id,
                'descricao' => set_value('descricao'),
                'valor' => $this->input->post('valor'),
                'clientes_id' => $this->input->post('clientes_id'),
                'data_vencimento' => $vencimento,
                'data_pagamento' => $recebimento,
                'baixado' => $this->input->post('recebido'),
                'cliente_fornecedor' => set_value('cliente'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => $this->input->post('tipo'),
            );

            if ($this->patrimonios_model->add('lancamentos', $data) == true) {

                $venda = $this->input->post('vendas_id');

                $this->db->set('faturado', 1);
                $this->db->set('valorTotal', $this->input->post('valor'));
                $this->db->where('idVendas', $venda);
                $this->db->update('vendas');

                log_info('Faturou uma venda.');

                $this->session->set_flashdata('success', 'Venda faturada com sucesso!');
                $json = array('result' => true);
                echo json_encode($json);
                die();
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar venda.');
                $json = array('result' => false);
                echo json_encode($json);
                die();
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar venda.');
        $json = array('result' => false);
        echo json_encode($json);
    }

}
