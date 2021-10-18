<?php

class Database extends PDO
{
    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD)
    {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASSWORD);
    }

    // function select($selection, $table, $condition)
    // {
    //     if ($selection == "*") {

    //         if ($condition == "Null") {
    //             $query = "SELECT * FROM " . $table;
    //         } else {
    //             $query = "SELECT * FROM " . $table . " " . $condition;
    //         }
    //         $stmt = $this->prepare($query);
    //         $stmt->execute();
    //         $_SESSION['rowCount'] = $stmt->rowCount();
    //         $result = $stmt->fetchAll();
    //         return $result;
    //     } else if ($selection == 'count') {
    //         $query = "SELECT * FROM " . $table . " " . $condition;
    //         $stmt = $this->prepare($query);
    //         $stmt->execute();
    //         $count = $stmt->rowCount();
    //         return $count;
    //     } else {
    //         if (gettype($selection) == 'array') {
    //             $query = "SELECT";
    //             foreach ($selection as $element) {
    //                 if ($element == $selection[count($selection) - 1]) {
    //                     $query = $query . " " . $element;
    //                 } else {
    //                     $query = $query . " " . $element . ",";
    //                 }
    //             }
    //         } else if (gettype($selection) == 'string') {
    //             $query = "SELECT " . $selection;
    //         }
    //         $query .= " FROM " . $table . " " . $condition;
    //         $stmt = $this->prepare($query);
    //         $stmt->execute();
    //         $result = $stmt->fetchAll();
    //         return $result;
    //     }
    // }

    function selectTwo($selection, $table, $condition, $param = null, $paramValue = null)
    {
        if ($selection == "*") {

            if ($condition == "Null") {
                $query = "SELECT * FROM " . $table;
            } else {
                $query = "SELECT * FROM " . $table . " " . $condition;
            }
            $stmt = $this->prepare($query);

            if (gettype($param) == 'array') {
                $k = 0;
                foreach ($param as $bindVal) {
                    $stmt->bindParam($bindVal, $paramValue[$k]);
                    $k = $k + 1;
                }
            }

            if (gettype($param) == 'string') {
                $stmt->bindParam($param, $paramValue);
            }

            $stmt->execute();
            $_SESSION['rowCount'] = $stmt->rowCount();
            $result = $stmt->fetchAll();
            return $result;
        } else if ($selection == 'count') {
            $query = "SELECT * FROM " . $table . " " . $condition;
            $stmt = $this->prepare($query);
            if (gettype($param) == 'array') {
                $k = 0;
                foreach ($param as $bindVal) {
                    $stmt->bindParam($bindVal, $paramValue[$k]);
                    $k = $k + 1;
                }
            }
            if (gettype($param) == 'string') {
                $stmt->bindParam($param, $paramValue);
            }
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;
        } else {
            if (gettype($selection) == 'array') {
                $query = "SELECT";
                foreach ($selection as $element) {
                    if ($element == $selection[count($selection) - 1]) {
                        $query = $query . " " . $element;
                    } else {
                        $query = $query . " " . $element . ",";
                    }
                }
            } else if (gettype($selection) == 'string') {
                $query = "SELECT " . $selection;
            }
            $query .= " FROM " . $table . " " . $condition;
            $stmt = $this->prepare($query);
            if (gettype($param) == 'array') {
                $k = 0;
                foreach ($param as $bindVal) {
                    $stmt->bindParam($bindVal, $paramValue[$k]);
                    $k = $k + 1;
                }
            }
            if (gettype($param) == 'string') {
                $stmt->bindParam($param, $paramValue);
            }

            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }

    function insert($table, $columns, $values)
    {
        $query = "INSERT INTO " . $table . "(";

        if (gettype($columns) == 'string' && gettype($values) == 'string') {
            $query .= "$columns) VALUES ($values);";
        } else {
            foreach ($columns as $element) {
                if ($element == $columns[count($columns) - 1]) {
                    $query .= $element;
                } else {
                    $query .= $element . ",";
                }
            }
            $query .= ") VALUES(";
            foreach ($values as $element) {
                if ($element == $values[count($columns) - 1]) {
                    $query .= "\"" . "$element" . "\"";
                } else {
                    $query .= "\"" . "$element" . "\",";
                }
            }
            $query .= ");";
        }
        $stmt = $this->prepare($query);
        $result = $stmt->execute();

        if (!$result) {
            return $stmt->errorInfo();
        } else {
            return "Success";
        }
    }

    function update($table, $columns, $values, $condition)
    {
        $query = "UPDATE " . $table . " SET ";

        if (gettype($columns) == 'string' && gettype($values) == 'string') {
            $query .=  "$columns = '$values'";
        } else if (gettype($columns) == 'array' && gettype($values) == 'array') {
            for ($i = 0; $i < count($columns) - 1; $i++) {
                if ($i < count($columns) - 1) {
                    $query .= $columns[$i] . " " . $values[$i];
                } else {
                    $query .= $columns[$i] . " " . $values[$i] . ",";
                }
            }
        }


        $query .= " " . $condition;
        $stmt = $this->prepare($query);
        $result = $stmt->execute();

        if (!$result) {
            return $stmt->errorInfo();
        } else {
            return "Success";
        }
    }

    function delete($table, $condition)
    {
        $query = "DELETE FROM " . $table . " " . $condition;
        $stmt = $this->prepare($query);
        $result = $stmt->execute();

        if (!$result) {
            return $stmt->errorInfo();
        } else {
            return "Success";
        }
    }
}
