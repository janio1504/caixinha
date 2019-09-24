<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BatidaDao
 *
 * @author janio
 */
class BatidaDao {

    public function listarBatidas($dados) {
        try {


            $query = "SELECT "
                    . " a.id_registro_pessoa, b.nm_pessoa, a.dt_registro, nr_matricula, c.nm_equipamento, c.nr_equipamento "
                    . " FROM public.com_registro_pessoa a"
                    . " inner join public.gen_pessoa b on a.id_pessoa = b.id_pessoa "
                    . " inner join public.com_equipamento c on CAST(a.nr_equipamento as int) = c.nr_equipamento ";
            $query .= " where  ";
            if ($dados['nitpis']) {
                $query .= " a.nr_pis_pessoa = :nitpis ";
                if (!$dados['id_equipamento'] || $dados['id_equipamento'] && ['data_inicio'] && $dados['data_fim']) {
                $query .= " and ";
            }
            }
            

            if ($dados['data_inicio'] && $dados['data_fim']) {
                $query .= " cast(a.dt_registro as date) between :data_inicio and :data_fim";
            }
            if ($dados['id_equipamento']) {
                $query .= " and CAST(a.nr_equipamento as int) = :id_equipamento";
            }
            $query .= " order by a.dt_registro desc";
            $conexao = Con::pegaConexao();
            $stmt = $conexao->prepare($query);
            if ($dados['nitpis']) {
                $stmt->bindValue(':nitpis', "0" . $dados['nitpis']);
            }
            if ($dados['data_inicio']) {
                $stmt->bindValue(':data_inicio', $dados['data_inicio']);
            }
            if ($dados['data_fim']) {
                $stmt->bindValue(':data_fim', $dados['data_fim']);
            }
            if ($dados['id_equipamento']) {
                $stmt->bindValue(':id_equipamento', $dados['id_equipamento']);
            }
            $stmt->execute();
            $lista = $stmt->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }


        return $lista;
    }

    public function atualizarBatida($dados) {

        $sql = "update public.com_registro_pessoa set dt_registro = :batida where id_registro_pessoa = :id_registro_pessoa";
        $conexao = Con::pegaConexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':batida', $dados['batida']);
        $stmt->bindValue(':id_registro_pessoa', $dados['id_registro_pessoa']);
        $stmt->execute();
    }

    public function listaBatidaSig($dados) {

        $sql = "select a.id_horario_ponto, b.siape, a.entrada_informada, a.saida_informada, c.nome, "
                . " d.observacoes, a.saida_almoco "
                . " from frequencia.horario_ponto a "
                . " inner join rh.servidor b on a.id_servidor = b.id_servidor "
                . " inner join comum.pessoa c on b.id_pessoa = c.id_pessoa "
                . " inner join frequencia.leitor_biometrico_ponto d on a.id_leitor_registro_entrada = d.id_leitor_biometrico_ponto "
                . " left join frequencia.leitor_biometrico_ponto e on a.id_leitor_registro_saida = e.id_leitor_biometrico_ponto "
                . " where b.siape = :siape and cast(a.entrada_informada as date) between :data_inicio and :data_fim";
        $conSig = ConSig::pegaConexaoSig();
        $st = $conSig->prepare($sql);
        $st->bindValue(':siape', $dados['siape']);
        $st->bindValue(':data_inicio', $dados['data_inicio']);
        $st->bindValue(':data_fim', $dados['data_fim']);
        $st->execute();
        $lista = $st->fetchAll();
        return $lista;
    }

    public function getServidor($dados) {
        $sql = "select a.siape, b.nome, b.nitpis, b.cpf_cnpj from rh.servidor a "
                . " inner join comum.pessoa b on a.id_pessoa = b.id_pessoa "
                . " where b.nome ilike :nome ";
        $conSig = ConSig::pegaConexaoSig();
        $st = $conSig->prepare($sql);
        $st->bindValue(':nome', $dados['nome'] . "%");
        $st->execute();
        $lista = $st->fetchAll();
        return $lista;
    }

    public function atualizarBatidaSig($dados) {

        $sql = "update public.com_registro_pessoa set dt_registro = :batida where id_registro_pessoa = :id_registro_pessoa";
        $conexao = Con::pegaConexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':batida', $dados['batida']);
        $stmt->bindValue(':id_registro_pessoa', $dados['id_registro_pessoa']);
        $stmt->execute();
    }

    public function listaEquipamentos() {
        $sql = "select id_equipamento, nr_equipamento, nm_equipamento, ds_equipamento, ds_ultima_coleta, dt_ultima_coleta_ok from com_equipamento where fl_ativo = 'S'"
                . " order by nm_equipamento";
        $conexao = Con::pegaConexao();
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

}
