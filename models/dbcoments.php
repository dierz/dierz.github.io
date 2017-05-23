<?php
function coments_all($link){
    // Формируем запрос
    $query = "SELECT * FROM coments ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    // Извлекаем данные
    $n = mysqli_num_rows($result);
    $coments = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $coments[] = $row;
    }

    return $coments;
}