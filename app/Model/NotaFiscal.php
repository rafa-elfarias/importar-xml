<?php

namespace ImportarXML\Model;

use \ImportarXML\Sql;
use \ImportarXML\Model;

class NotaFiscal extends Model {

    public function get($nf_id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_nfs WHERE id = :nf_id", array(
            ":nf_id" => $nf_id
        ));

        if($results) {
            $this->setData($results[0]);
        }
    }

    public static function all()
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_nfs ORDER BY ide_n_nf ASC");
        return $results;
    }

    //Função para paginação, não aplicada na view ainda
    public static function getPageSearch($cliente_id, $search, $page = 1, $itemsPerPage = 10)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("
          SELECT SQL_CALC_FOUND_ROWS *
          FROM tb_paciente 
          WHERE cliente_id = :cliente_id
          AND nome LIKE CONCAT('%', :search, '%') 
          ORDER BY ativo DESC,
          nome ASC
          LIMIT $start, $itemsPerPage;
        ", array(
            ":cliente_id" => $cliente_id,
            ":search" => $search
        ));

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'  => $results,
            'total' => (int)$resultTotal[0]["nrtotal"],
            'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }

    //Função para paginação, não aplicada na view ainda
    public static function getPage($cliente_id, $page = 1, $itemsPerPage = 12)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
                                          FROM tb_paciente 
                                          WHERE cliente_id = :cliente_id
                                          ORDER BY ativo DESC,
                                          nome ASC
                                          LIMIT $start, $itemsPerPage;
                                        ", array(
            ":cliente_id" => $cliente_id
        ));

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'  => $results,
            'total' => (int)$resultTotal[0]["nrtotal"],
            'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }

    public function save()
    {
        $data = $this->getdt_nascimento();
        if($data) {
            $ano= substr($data, 6);
            $mes= substr($data, 3,-5);
            $dia= substr($data, 0,-8);
            $dt_nascimento = $ano."-".$mes."-".$dia;
        } else {
            $dt_nascimento = null;
        }

        $sql = new Sql();

        $sql->query("SET CHARACTER SET utf8");

        $resultado = $sql->query("INSERT INTO tb_nfs 
                              (ide_n_nf, 
                              ide_dh_emi, 
                              dest_cnpj, 
                              dest_cpf, 
                              dest_x_nome, 
                              dest_ender_dest_xlgr, 
                              dest_ender_dest_nro, 
                              dest_ender_dest_x_bairro, 
                              dest_ender_dest_c_mun, 
                              dest_ender_dest_x_mun, 
                              dest_ender_dest_uf, 
                              dest_ender_dest_cep,
                              dest_ender_dest_c_pais,
                              dest_ind_i_e_dest,
                              dest_email,
                              v_pag) 
                              VALUES 
                              (:ide_n_nf, 
                              :ide_dh_emi,
                              :dest_cnpj, 
                              :dest_cpf, 
                              :dest_x_nome, 
                              :dest_ender_dest_xlgr, 
                              :dest_ender_dest_nro, 
                              :dest_ender_dest_x_bairro, 
                              :dest_ender_dest_c_mun, 
                              :dest_ender_dest_x_mun, 
                              :dest_ender_dest_uf, 
                              :dest_ender_dest_cep,
                              :dest_ender_dest_c_pais,
                              :dest_ind_i_e_dest,
                              :dest_email,
                              :v_pag)", [
            ':ide_n_nf'                 => $this->ide_n_nf,
            ':ide_dh_emi'               => $this->ide_dh_emi,
            ':dest_cnpj'                => $this->dest_cnpj,
            ':dest_cpf'                 => $this->dest_cpf,
            ':dest_x_nome'              => $this->dest_x_nome,
            ':dest_ender_dest_xlgr'     => $this->dest_ender_dest_xlgr,
            ':dest_ender_dest_nro'      => $this->dest_ender_dest_nro,
            ':dest_ender_dest_x_bairro' => $this->dest_ender_dest_x_bairro,
            ':dest_ender_dest_c_mun'    => $this->dest_ender_dest_c_mun,
            ':dest_ender_dest_x_mun'    => $this->dest_ender_dest_x_mun,
            ':dest_ender_dest_uf'       => $this->dest_ender_dest_uf,
            ':dest_ender_dest_cep'      => $this->dest_ender_dest_cep,
            ':dest_ender_dest_c_pais'   => $this->dest_ender_dest_c_pais,
            ':dest_ender_dest_uf'       => $this->dest_ender_dest_uf,
            ':dest_ender_dest_cep'      => $this->dest_ender_dest_cep,
            ':dest_ender_dest_c_pais'   => $this->dest_ender_dest_c_pais,
            ':dest_ind_i_e_dest'        => $this->dest_ind_i_e_dest,
            ':dest_email'               => $this->dest_email,
            ':v_pag'                    => $this->v_pag,
        ]);

        return true;
    }
}