<?php

function createInsertQuery($table, $data)
{
    $columns = array_keys($data);
    $values = array_values($data);

    $columnNames = implode(', ', $columns);
    $valuePlaceholders = implode(', ', array_fill(0, count($columns), "'%s'"));

    $query = "INSERT INTO $table ($columnNames) VALUES ($valuePlaceholders)";

    // Apply values to the query
    $query = vsprintf($query, $values);

    return $query;
}

function createUpdateQuery($table, $data)
{
    $id = $data['id'];
    // Exclude 'id' from the columns
    unset($data['id']);

    $columns = array_keys($data);
    $values = array_values($data);

    $assignments = array_map(function ($column, $value) {
        return "$column = '$value'";
    }, $columns, $values);

    $setClause = implode(', ', $assignments);

    $query = "UPDATE $table SET $setClause WHERE id='$id'";

    return $query;
}


// Example usage with JSON data
$jsonData = '{"name": "Demo", "password": "demo", "type": "user"}';
$dataArray = json_decode($jsonData, true);

$tableName = 'test';
$insertQuery = createInsertQuery($tableName, $dataArray);

echo $insertQuery . "\n";

// Example usage with JSON data
$jsonData = '{"id": "1", "key1": "value1", "key2": "value2", "key3": "value3"}';
$dataArray = json_decode($jsonData, true);

$tableName = 'test';
$updateQuery = createUpdateQuery($tableName, $dataArray);

echo $updateQuery;

