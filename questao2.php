<?php
/* Questão 2
Dizemos que dois números são amigos se cada um deles é igual a soma dos divisores do outro.

Um exemplo de números amigos são 284 e 220, pois os divisores de 220 são 1, 2, 4, 5, 10, 11, 20, 
22, 44, 55 e 110. Efetuando a soma destes números obtemos o resultado 284.

                    1 + 2 + 4 + 5 + 10 + 11 + 20 + 22 + 44 + 55 + 110 = 284

E os divisores de 284 são 1, 2, 4, 71 e 142, efetuando a soma destes números obtemos 
o resultado 220.

                    1 + 2 + 4 + 71 + 142 = 220

Sabendo disso faça um algoritimo que traga os números amigos entre 1 a 100.000.

*/


// $listaAceita = [0 => '220', 1 => '284', 2 => '5', 3 => '270'];

$divisorInicial = 1;
$divisorFinal = 100;
$listaRestoDivisao;
$somaRestoDivisao = 0;
$listaDivisoresComSomaIgual;

for ($n = 1; $divisorInicial <= $divisorFinal; $n++) {
    //pesquisar um valor dentro de um array
    //$key = array_search($divisorInicial, $listaAceita);

    if ($n == $divisorInicial) {
        //se o $n for igual o valor inicial adiciona os divisores com resto 0 no array

        array_push($listaRestoDivisao, $divisorInicial);

        //cria um array de um array
        $listaRestoDivisao[$divisorInicial] = $somaRestoDivisao;
        //// echo "O numero {$divisorInicial} total = {$somaRestoDivisao} </br>";

        $somaRestoDivisao = 0;
        $divisorInicial += 1; //pula para o proximo divisor

        $n = 0; // reinicia o $n para 0

    } else {
        // fmod retorna o resto da divisao
        // divide o $divisorInicial pelo $n
        $resto = fmod($divisorInicial, $n);

        if ($resto == 0) {
            //se o resto for = 0 traga o valor que foi dividido e o resto dele
            //// echo "O resto da divisao {$divisorInicial} / {$n} = {$resto} </br>";
            //$somaRestoDivisao = $somaRestoDivisao + $n
            $somaRestoDivisao += $n;
        }
    }
}

//// echo '<pre>';
// print_r($listaRestoDivisao);
//// echo '</pre>';

$listaRestoDivisao = [
    '1' => "1",
    '6' => '6',
    '25' => '6',
    '28' => "28",
    '20' => "22",
    '60' => "108",
];

$listaNumeroSomados;

echo '<pre>';
print_r($listaDivisoresComSomaIgual);
echo '</pre>';
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
            crossorigin="anonymous">
    </head>

    <body>
<div class="container">



       
                <?php
// //verificar o valores amigos
foreach ($listaRestoDivisao as $key => $value1) {
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">VALORES DA CHAVE 1</h5>
        <?php
    
    $key1 = array_search($value1, $listaRestoDivisao);
   
    ?>
    
    <p>chave1 a ser pesquisado <?php echo "{$key1}"?><p>

   <br>Soma1 da Chave1 a ser pesquisado <?php echo "{$value1}"?><br>
      
   <div class="card" style="width: 18rem;">
   <div class="card-body">
   <h5 class="card-title">VALORES DA CHAVE 2</h5>
   <?php

    $listaNumeroSomados[$key1] = $value1;
    unset($listaRestoDivisao[$key1]);
    $key2 = array_search($value1, $listaRestoDivisao);
    $value2 = $listaRestoDivisao[$key2];

    $resultCompare = array_search($value2, $listaNumeroSomados);
    if($resultCompare){
        unset($listaNumeroSomados[$key1]);
        unset($listaRestoDivisao[$key2]);
    }else{
        echo 'Foi nullo';
        $key2 =array_search($value1, $listaNumeroSomados);
        $value2 = $listaNumeroSomados[$key2];
    }
    
   // echo "<br>chave2 a ser pesquisado {$key2}<br>";
    
    
    ?>
    <p>chave2 a ser pesquisado <?php echo "{$key2}"?><p>

    <br>Soma2 da Chave2 a ser pesquisado <?php echo "{$value2}"?><br>
    
    <div class="card" style="width: 18rem;">
   <div class="card-body">
   <h5 class="card-title">CONDICIONAL</h5>
    <?php

     echo $value1 == $key2 ?  '<div class="alert alert-success" role="alert">
    Soma da Chave1  com a  Chave2  são iguais? Sim
</div>' : '<div class="alert alert-danger" role="alert">
Soma da Chave1  com a  Chave2  são iguais? Não
</div>';

echo $value2 == $key1 ?  '<div class="alert alert-success" role="alert">
Soma da Chave2  com a  Chave1  são iguais? Sim
</div>' : '<div class="alert alert-danger" role="alert">
Soma da Chave2  com a  Chave1  são iguais? Não
</div>';
   // echo "Soma2 da Chave2 a ser pesquisado  {$value2}";
   // echo "</br>#######################################</br>";

   // echo "</br>#############CONDICIONAL#############</br>";

   // echo $value1 == $key2 ? "Soma da Chave1  com a  Chave2  são iguais? Sim" : "Soma da Chave1  com a  Chave2  são iguais? Não";

   // echo $value2 == $key1 ? "Soma da Chave2 com a Chave1 são iguais? Sim" : "Soma da Chave2 com a Chave1 são iguais? Não";

   // echo "</br>#######################################</br>";

    //// echo "</br>#######################################</br>";

    //in_array: Checa se um valor existe em um array
    if ($value == $key2 && $listaRestoDivisao[$key2] == $key1) {

        $listaDivisoresComSomaIgual[$key] = $value;
    }
    //// echo "A soma de {$key} => {$value['soma']} <br>";
}
?>
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
    </body>

    </html>