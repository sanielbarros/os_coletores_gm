<?php

class Os_model extends CI_Model {

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */
    public function __construct() {
        parent::__construct();
    }

    public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array') {

        $this->db->select($fields . ',clientes.nomeCliente, clientes.celular as celular_cliente');
        $this->db->from($table);
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->limit($perpage, $start);
        $this->db->order_by('idOs', 'desc');
        if ($where) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    public function getOs($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array') {

        $lista_clientes = array();
        if ($where) {

            if (array_key_exists('pesquisa', $where)) {
                $this->db->select('idClientes');
                $this->db->like('nomeCliente', $where['pesquisa']);
                $this->db->limit(1000000);
                $clientes = $this->db->get('clientes')->result();

                foreach ($clientes as $c) {
                    array_push($lista_clientes, $c->idClientes);
                }
            }
        }

        $lista_patrimonios = array();
        if ($where) {

            if (array_key_exists('pesquisaPatrimonio', $where)) {
                $this->db->select('idOs');
                $this->db->like('patrimonio', $where['pesquisaPatrimonio']);
                $this->db->limit(5);
                $patrimonios = $this->db->get('os')->result();

                foreach ($patrimonios as $p) {
                    array_push($lista_patrimonios, $p->idOs);
                }
            }
        }

        $lista_status_aberto = array();
        if ($where) {
            if (array_key_exists('aberto', $where)) {
                $this->db->select('idOs');
                $this->db->like('status', $where['aberto']);
                $this->db->limit(1000000);
                $statusAberto = $this->db->get('os')->result();

                foreach ($statusAberto as $sa) {
                    array_push($lista_status_aberto, $sa->idOs);
                }
            }
        }

        $lista_status_orcamento = array();
        if ($where) {
            if (array_key_exists('orcamento', $where)) {
                $this->db->select('idOs');
                $this->db->like('status', $where['orcamento']);
                $this->db->limit(1000000);
                $statusOrcamento = $this->db->get('os')->result();

                foreach ($statusOrcamento as $so) {
                    array_push($lista_status_orcamento, $so->idOs);
                }
            }
        }

        $lista_status_nao_aprovado = array();
        if ($where) {
            if (array_key_exists('naoAprovado', $where)) {
                $this->db->select('idOs');
                $this->db->like('status', $where['naoAprovado']);
                $this->db->limit(1000000);
                $statusNaoAprovado = $this->db->get('os')->result();

                foreach ($statusNaoAprovado as $sna) {
                    array_push($lista_status_nao_aprovado, $sna->idOs);
                }
            }
        }

        $lista_status_aguardando_pecas = array();
        if ($where) {
            if (array_key_exists('aguardandoPecas', $where)) {
                $this->db->select('idOs');
                $this->db->like('status', $where['aguardandoPecas']);
                $this->db->limit(1000000);
                $statusAguardandoPeças = $this->db->get('os')->result();

                foreach ($statusAguardandoPeças as $sap) {
                    array_push($lista_status_nao_aprovado, $sap->idOs);
                }
            }
        }

        $lista_status_manutencao = array();
        if ($where) {
            if (array_key_exists('manutencao', $where)) {
                $this->db->select('idOs');
                $this->db->like('status', $where['manutencao']);
                $this->db->limit(1000000);
                $statusManutencao = $this->db->get('os')->result();

                foreach ($statusManutencao as $sm) {
                    array_push($lista_status_manutencao, $sm->idOs);
                }
            }
        }

        $lista_status_faturamento = array();
        if ($where) {
            if (array_key_exists('faturamento', $where)) {
                $this->db->select('idOs');
                $this->db->like('status', $where['faturamento']);
                $this->db->limit(1000000);
                $statusFaturamento = $this->db->get('os')->result();

                foreach ($statusFaturamento as $sf) {
                    array_push($lista_status_faturamento, $sf->idOs);
                }
            }
        }

        $lista_status_transito = array();
        if ($where) {
            if (array_key_exists('transito', $where)) {
                $this->db->select('idOs');
                $this->db->like('status', $where['transito']);
                $this->db->limit(1000000);
                $statusTransito = $this->db->get('os')->result();

                foreach ($statusTransito as $st) {
                    array_push($lista_status_transito, $st->idOs);
                }
            }
        }

        $result_lista_status = array();
        $result_lista_status = array_merge($lista_status_aberto, $lista_status_orcamento, $lista_status_nao_aprovado, $lista_status_aguardando_pecas, $lista_status_manutencao, $lista_status_faturamento, $lista_status_transito);

        $this->db->select($fields . ',clientes.nomeCliente, clientes.celular as celular_cliente, usuarios.nome, garantias.*');
        $this->db->from($table);
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        //$this->db->join('patrimonios', 'os.patrimonio = os.patrimonio');
        $this->db->join('usuarios', 'usuarios.idUsuarios = os.usuarios_id');
        $this->db->join('garantias', 'garantias.idGarantias = os.garantias_id', 'left');

        // condicionais da pesquisa 
        // condicional de pesquisa padrão
        if (array_key_exists('pesquisaStatus', $where)) {

            if ($result_lista_status != null) {
                $this->db->where_in('os.idOs', $result_lista_status);
            }
        }

        // condicional de clientes
        if (array_key_exists('pesquisa', $where)) {
            if ($lista_clientes != null) {
                $this->db->where_in('os.clientes_id', $lista_clientes);
            }
        }

        // condicional de status
        if (array_key_exists('status', $where)) {
            $this->db->where_in('status', $where['status']);
        }

        // condicional de patrimônios
        if (array_key_exists('pesquisaPatrimonio', $where)) {
            if ($lista_patrimonios != null) {
                $this->db->where_in('os.patrimonio', $where['pesquisaPatrimonio']);
            }
        }

        // condicional data inicial
        if (array_key_exists('de', $where)) {
            $this->db->where('dataInicial >=', $where['de']);
        }
        // condicional data final
        if (array_key_exists('ate', $where)) {

            $this->db->where('dataFinal <=', $where['ate']);
        }

        $this->db->limit($perpage, $start);

        $this->db->order_by('os.idOs', 'desc');
        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    public function getById($id) {
        $this->db->select('os.*, clientes.*,clientes.celular as celular_cliente, garantias.refGarantia, usuarios.telefone as telefone_usuario, usuarios.email as email_responsavel,usuarios.nome');
        $this->db->from('os');
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->join('usuarios', 'usuarios.idUsuarios = os.usuarios_id');
        $this->db->join('garantias', 'garantias.idGarantias = os.garantias_id', 'left');
        $this->db->where('os.idOs', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function getProdutos($id = null) {

        $this->db->select('produtos_os.*, produtos.*');
        $this->db->from('produtos_os');
        $this->db->join('produtos', 'produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('os_id', $id);
        return $this->db->get()->result();
    }

    public function getServicos($id = null) {
        $this->db->select('servicos_os.*, servicos.nome, servicos.preco as precoVenda, servicos.comissao');
        $this->db->from('servicos_os');
        $this->db->join('servicos', 'servicos.idServicos = servicos_os.servicos_id');
        $this->db->where('os_id', $id);
        return $this->db->get()->result();
    }

    public function add($table, $data, $returnId = false) {

        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            if ($returnId == true) {
                return $this->db->insert_id($table);
            }
            return true;
        }

        return false;
    }

    public function edit($table, $data, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return true;
        }

        return false;
    }

    public function delete($table, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }

    public function count($table) {
        return $this->db->count_all($table);
    }

    public function autoCompleteProduto($q) {

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('descricao', $q);
        $query = $this->db->get('produtos');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = array('label' => $row['descricao'] . ' | Preço: R$ ' . $row['precoVenda'] . ' | Estoque: ' . $row['estoque'], 'estoque' => $row['estoque'], 'id' => $row['idProdutos'], 'preco' => $row['precoVenda']);
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteProdutoSaida($q) {

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('descricao', $q);
        $this->db->where('saida', 1);
        $query = $this->db->get('produtos');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = array('label' => $row['descricao'] . ' | Preço: R$ ' . $row['precoVenda'] . ' | Estoque: ' . $row['estoque'], 'estoque' => $row['estoque'], 'id' => $row['idProdutos'], 'preco' => $row['precoVenda']);
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteCliente($q) {

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nomeCliente', $q);
        $query = $this->db->get('clientes');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                //$row_set[] = array('label' => $row['nomeCliente'] . ' | Telefone: ' . $row['telefone'], 'id' => $row['idClientes']);
                $row_set[] = array('label' => $row['nomeCliente'], 'id' => $row['idClientes']);
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteUsuario($q) {

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nome', $q);
        $this->db->where('situacao', 1);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = array('label' => $row['nome'] . ' | Telefone: ' . $row['telefone'], 'id' => $row['idUsuarios']);
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteTermoGarantia($q) {

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('LOWER(refGarantia)', $q);
        $query = $this->db->get('garantias');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = array('label' => $row['refGarantia'], 'id' => $row['idGarantias']);
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteServico($q) {

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nome', $q);
        $query = $this->db->get('servicos');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = array('label' => $row['nome'] . ' | Preço: R$ ' . $row['preco'], 'id' => $row['idServicos'], 'preco' => $row['preco']);
            }
            echo json_encode($row_set);
        }
    }

    public function anexar($os, $anexo, $url, $thumb, $path) {

        $this->db->set('anexo', $anexo);
        $this->db->set('url', $url);
        $this->db->set('thumb', $thumb);
        $this->db->set('path', $path);
        $this->db->set('os_id', $os);

        return $this->db->insert('anexos');
    }

    public function getAnexos($os) {

        $this->db->where('os_id', $os);
        return $this->db->get('anexos')->result();
        //return $this->db->get('anexos')->row();
    }

    public function getAnotacoes($os) {
        $this->db->where('os_id', $os);
        $this->db->order_by('idAnotacoes', 'desc');
        return $this->db->get('anotacoes_os')->result();
    }

}
