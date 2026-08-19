<?php

require_once("modelo/Fabricante.php");
require_once("modelo/Carro.php");


$volkswagen = new Fabricante();
$volkswagen->setNome("Volkswagen");
$volkswagen->setSigla("VW");

$chevrolet = new Fabricante();
$chevrolet->setNome("Chevrolet");
$chevrolet->setSigla("GM");

$fiat = new Fabricante();
$fiat->setNome("Fiat");
$fiat->setSigla("F");

$renault = new Fabricante();
$renault->setNome("Renault");
$renault->setSigla("RN");


$fabricantes = [];
$fabricantes[] = $volkswagen;
$fabricantes[] = $chevrolet;
$fabricantes[] = $fiat;
$fabricantes[] = $renault;
$carros = [];

do {

    echo "\n===== MENU ====\n";
    echo "1 - Cadastrar carro\n";
    echo "2 - Excluir carro\n";
    echo "3 - Listar carros\n";
    echo "0 - Sair\n";

    $opcao = readline("Escolha uma opção: ");

    switch ($opcao) {

        case "1":

            echo "\n==== CADASTRAR CARRO =====\n";

            $modelo = readline("Modelo: ");
            $ano = (int) readline("Ano de fabricação: ");

            echo "\nFabricantes disponíveis:\n";

            foreach ($fabricantes as $fabricante) {
                echo $fabricante->getSigla()
                    . " - "
                    . $fabricante->getNome()
                    . "\n";
            }

            $sigla = readline("Digite a sigla do fabricante: ");

            $encontrou = false;

            foreach ($fabricantes as $fabricante) {

                if ($fabricante->getSigla() == $sigla) {

                    $carro = new Carro();

                    $carro->setModelo($modelo);
                    $carro->setAnoFabricacao($ano);
                    $carro->setFabricante($fabricante);

                    $carros[] = $carro;

                    $encontrou = true;

                    break;
                }
            }

            if ($encontrou == false) {
                echo "\nFabricante inválido!\n";
            } else {
                echo "\nCarro cadastrado com sucesso!\n";
            }

            break;


        case "2":

            echo "\n===== EXCLUIR CARRO ======\n";

            if (count($carros) == 0) {

                echo "Não existem carros cadastrados.\n";

            } else {

                $indice = (int) readline(
                    "Digite o índice do carro que deseja excluir: "
                );

                if (isset($carros[$indice])) {

                    unset($carros[$indice]);

                    $carros = array_values($carros);

                    echo "Carro excluído com sucesso!\n";

                } else {

                    echo "Índice inválido!\n";
                }
            }

            break;


        case "3":

            echo "\n===== LISTA DE CARROS =====\n";

            if (count($carros) == 0) {

                echo "Nenhum carro cadastrado.\n";

            } else {

                foreach ($carros as $indice => $carro) {

                    echo "\nÍndice: " . $indice . "\n";
                    echo "Modelo: " . $carro->getModelo() . "\n";
                    echo "Ano de fabricação: "
                        . $carro->getAnoFabricacao()
                        . "\n";

                    echo "Fabricante: "
                        . $carro->getFabricante()->getNome()
                        . " ("
                        . $carro->getFabricante()->getSigla()
                        . ")\n";
                }
            }

            break;


        case "0":

            echo "\nPrograma encerrado.\n";

            break;


        default:

            echo "\nOpção inválida!\n";

            break;
    }

} while ($opcao != "0");
