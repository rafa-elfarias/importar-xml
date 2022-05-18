<?php

    function message($type, $msg)
    {
        $_SESSION['toastr'] = array(
            'type'    => $type, // or 'success' or 'info' or 'warning'
            'message' => $msg
            //'title' => 'title here!'
        );
    }

    function idade($data)
    {
        //Data atual
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');

        //Data do aniversário
        // se não for formato do banco
        /*$nascimento = explode('/', $data);
        $dianasc = ($nascimento[0]);
        $mesnasc = ($nascimento[1]);
        $anonasc = ($nascimento[2]);*/

        // se for formato do banco, use esse código em vez do de cima!
        $nascimento = explode('-', $data);
        $dianasc = ($nascimento[2]);
        $mesnasc = ($nascimento[1]);
        $anonasc = ($nascimento[0]);

        //Calculando sua idade
        $idade = $ano - $anonasc; // simples, ano- nascimento!

        $data_inicial = '2019-' .$mesnasc. '-' .$dianasc;
        $data_final = date('2019-m-d');;

        // Calcula a diferença em segundos entre as datas
        $diferenca = strtotime($data_final) - strtotime($data_inicial);

        //Calcula a diferença em dias
        $dias = floor($diferenca / (60 * 60 * 24));

        if ($mes < $mesnasc) {
            // se o mes é menor, só subtrair da idade
            $idade--;
            echo $idade. " anos";
        } elseif ($mes == $mesnasc && $dianasc < $dia) {
            // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
            $idade--;
            echo $idade. " anos";
        } elseif ($mes == $mesnasc && $dia == $dianasc) {
            echo $idade. " anos";
        } else {
            // ja fez aniversario no ano, tudo certo!
            echo $idade. " anos";
        }

        if ($dias <= 30 ) {
            echo ". Faltam $dias dias para o aniversário dele(a)";
        } elseif($dias == 0) {
            $idade++;
            echo ". Hoje é o aniversário dele(a)!";
        }
    }

    function formatPrice(float $cache)
    {
        return number_format($cache, 2, ",", ".");
    }

    function dataFormatada($date) {
        return date_format(new DateTime($date), "d/m/Y");
    }

    function dataEvolucoes($data) {
        $data = date_format(new DateTime($data), "d/m/Y");
        $dataFormatada = explode('/', $data);
        $dia = ($dataFormatada[0]);
        $mes = ($dataFormatada[1]);
        $ano = ($dataFormatada[2]);


        switch ($mes) {
            case 01:
                $mes = "Janeiro";
                break;
            case 02:
                $mes = "Fevereiro";
                break;
            case 03:
                $mes = "Março";
                break;
            case 04:
                $mes = "Abril";
                break;
            case 05:
                $mes = "Maio";
                break;
            case 06:
                $mes = "Junho";
                break;
            case 07:
                $mes = "Julho";
                break;
            case '08':
                $mes = "Agosto";
                break;
            case '09':
                $mes = "Setembro";
                break;
            case '10':
                $mes = "Outubro";
                break;
            case 11:
                $mes = "Novembro";
                break;
            case 12:
                $mes = "Dezembro";
                break;
        }


        return $dia. '  ' .$mes. ' ' .$ano;
    }

    function horarioEvolucoes($data)
    {
        $horario = date_format(new DateTime($data), "H:i");

        return $horario;
    }

    function diaSemana(int $dia)
    {
        switch ($dia) {
            case 0:
                return "Domingo";
                break;
            case 1:
                return "Segunda-feira";
                break;
            case 2:
                return "Terça-feira";
                break;
            case 3:
                return "Quarta-feira";
                break;
            case 4:
                return "Quinta-feira";
                break;
            case 5:
                return "Sexta-feira";
                break;
            case 6:
                return "Sábado";
                break;
        }
    }

?>