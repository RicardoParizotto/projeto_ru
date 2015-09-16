<?php

include 'connect.php';

/**
 * Class Menu
 */
class Menu
{

    /**
     * @param int $limit
     * @return resource
     */
    public function fetchAllPositive($limit = 1000){

        $sql = "SELECT Nome, nota_p as nota FROM Cardapio LIMIT {$limit};";

        return mysql_query($sql);

    }

    /**
     * @param int $limit
     * @return resource
     */
    public function fetchAllNegative($limit = 1000){
        $sql = "SELECT Nome, nota_n as nota FROM Cardapio LIMIT {$limit};";

        return mysql_query($sql);
    }

    /**
     * @param $mysqlQuery
     * @return string
     */
    public function formatToJsonChart($mysqlQuery){
        $rows = [];

        while($row = mysql_fetch_array($mysqlQuery, MYSQL_ASSOC)){
            $rows[] = [
                'y' => (int) $row['nota'],
                'label' => $row['Nome']
            ];
        }

        return json_encode($rows);
    }


}