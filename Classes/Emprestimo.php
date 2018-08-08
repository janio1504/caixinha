<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Emprestimo
 *
 * @author janio
 */
class Emprestimo {

    public function inserirEmprestimo($dados) {

        try {
            $idPessoa = $dados['id_pessoa'];
            $emprestimoDao = new EmprestimoDao();
            $emprestimo = $this->carregarEmprestimo($idPessoa);
            if (isset($emprestimo['id_emprestimo'])) {
                $mostrarValor = Util::mostrarValor($emprestimo['valor']);
                $emprestimo['valor'] = $mostrarValor;
                $emprestimo['alert'] = 'Já existe emprestimo cadastrada para essa pessoa!';
                $emprestimo['action'] = 'visualizar';
                return $emprestimo;
            }
            $valor = Util::moeda($dados['valor']);
            $data = Util::dataBanco($dados['data_inicio']);
            $dados['data_inicio'] = $data;
            $dados['valor'] = $valor;
            $emprestimoDao->inserir($dados);
            $novoEmprestimo = $this->carregarEmprestimo($idPessoa);
            $mostrarValor = Util::mostrarValor($novoEmprestimo['valor']);
            $novoEmprestimo['valor'] = $mostrarValor;
            if (isset($novoEmprestimo['id_emprestimo'])) {
                $novoEmprestimo['sucesso'] = 'Emprestimo cadastrado com sucesso!';
            } else {
                throw new Exception("Erro ao inserir emprestimo!");
            }
            $novoEmprestimo['action'] = 'visualizar';
            return $novoEmprestimo;
        } catch (Exception $e) {
            $erro['errors'] = $e->getMessage();
        }
    }

    public function carregarEmprestimo($get) {
        $emprestimoDao = new EmprestimoDao();
        $dados = $emprestimoDao->emprestimoParticipante($get['id']);
        $dados['action'] = 'carregar';
        return $dados;
    }

    public function visualizarEmprestimo($dados) {

        $emprestimoDao = new EmprestimoDao();
        if (isset($dados['id_pessoa'])) {
            $emprestimo = $emprestimoDao->emprestimoParticipante($dados['id_pessoa']);
            return $emprestimo;
        }
        if (isset($dados['nome']) && !isset($dados['id'])) {
            $emprestimo = $emprestimoDao->buscarEmprestimo($dados['nome']);
            $emprestimo['action'] = 'visualizar';
            $emprestimo['pagamentos'] = $emprestimoDao->listarPagamentosEmprestimo($emprestimo['id_emprestimo']);
            return $emprestimo;
        }
    }

    public function editarEmprestimo($dados) {

        $id = $dados['id_pessoa'];
        $emprestimoDao = new EmprestimoDao();
        $emprestimoDao->editar($dados);
        $emprestimo = $emprestimoDao->emprestimoParticipante($id);

        $emprestimo['action'] = 'visualizar';
        return $emprestimo;
    }

    public function excluirEmprestimo($dados) {
        $id = $dados['id_emprestimo'];
        $emprestimoDao = new EmprestimoDao();
        $emprestimoDao->delete($id);
        $dados['sucesso'] = 'Emprestimo excluida com sucesso!';
        $dados['action'] = 'listar';
        return $dados;
    }

    public function pagamentoEmprestimo($dados) {
        $emprestimoDao = new EmprestimoDao();
        $emprestimoDao->pagamentoEmprestimo($dados);
    }

    public function listarEmprestimo() {
        
        try {
            $emprestimoDao = new EmprestimoDao();
            $emprestimos = $emprestimoDao->listar();
            if (!isset($emprestimos)) {
                throw new Exception("Não foi possivel listar os emprestimos! ");
            }
            return $emprestimos;
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }

    public function buscarEmprestimo($dados) {

        $emprestimoDao = new EmprestimoDao();
        $emprestimo = $emprestimoDao->buscarEmprestimo($dados);
        if (isset($emprestimo)) {
            $emprestimo = $emprestimoDao->listarEmpPorPessoa($emprestimo['id_pessoa']);

            return $emprestimo;
        }
    }

    public function pagarEmprestimo($dados) {

        $emprestimoDao = new EmprestimoDao();
        $valor = Util::moeda($dados['valor']);
        $juros = Util::moeda($dados['juros']);
        $dados['valor'] = $valor;
        $dados['juros'] = $juros;
        $data = Util::dataBanco($dados['data']);
        $dados['data'] = $data;

        $emprestimoDao->pagarEmprestimo($dados);
        $emprestimo = $this->visualizarEmprestimo($dados);
        //Erro::mostraErro($emprestimo);
        $vp = $emprestimo['valor'] - $valor;
        $pg['valor'] = $vp;
        $pg['juros'] = $juros;
        $pg['id_pessoa'] = $dados['id_pessoa'];
        $pg['id_emprestimo'] = $dados['id_emprestimo'];
        $pg['data_inicio'] = $emprestimo['data_inicio'];
        $this->atualizarEmprestimo($pg);
        $emprestimo['pagamentos'] = $emprestimoDao->listarPagamentosEmprestimo($emprestimo['id_emprestimo']);
        $emprestimo['sucesso'] = 'Pagamento realizado com sucesso!';
        $emprestimo['action'] = 'visualizar';
        return $emprestimo;
    }

    public function atualizarEmprestimo($dados) {
        $dados['status'] = null;
        $dados['data_fim'] = null;
        if ($dados['valor'] == 0) {
            $dados['data_fim'] = date("Y-m-d");
            $dados['status'] = 'Pago';
        }

        $this->editarEmprestimo($dados);
    }

}
