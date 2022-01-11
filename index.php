<?php error_reporting(-1);
// В  массив  А(N)  вставить  максимальный  элемент  после  каждого  четного отрицательного элемента.  
$A = [-10, -9, 2 , -4, 6, 22, 4, -20 ];

echo("A(n):<br>");
print_r($A);
echo("<br>Result:<br>");
$a = make_this($A);
print_r($a);

function search_max_val($array){  // ищет максимальное значение 
    $maxval = $array[0];
    $maxpos = 0;
    for($i = 0; $i < count($array); $i++){
        if($array[$i] > $maxval){
            $maxval = $array[$i];
            $maxpos = $i;
        }
    }   
    return [$maxval, $maxpos];
}

function delete_elem($array, $index){ // удаляет элемент из массива 
    $res = [];
    $n = 0;
    for($i = 0; $i < count($array); $i++){
        if($i == $index){
            continue;
        }else{
            $res[$n] = $array[$i];
            $n++;
        }
    }
    return $res;
}

function add_elem($array, $index, $value){ //добавляет элементв массив в определенное место, сдвигая последующие
    $res = [];
    $n = 0;
    for($i = 0; $i < count($array); $i++){
        if($n == $index){
            $res[$n] = $value;
            $i--;
            $n++;
        }else{
            $res[$n] = $array[$i];
            $n++;
        }
    }
    return $res;
}

function make_this($array){    //выполняет задание 
    $maxvel = search_max_val($array);  // максимальное значение 0 - значение, 1 -позиция.
    $arr = delete_elem($array, $maxvel[1]);
    for($i = 0; $i < count($arr);$i++){
        if($arr[$i] < 0 ){
            if($arr[$i] % 2 == 0){
                $arr = add_elem($arr, $i+1, $maxvel[0]);
            }
        }
    }
    return $arr;
}