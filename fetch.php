<?php
include 'connection.php';
session_start();
if (isset($_SESSION['username'])) {
    $db = $conn;
    $tableName = 'form';

    $columns = [
        'id',
        'Name',
        'Email',
        'Password',
        'Position',
        'House',
        'Street',
        'State',
        'Gender',
        'Image',
    ];

    function fetch_data($db, $tableName, $columns)
    {
        if (empty($db)) {
            $msg = 'Database connection error';
        } elseif (empty($columns) || !is_array($columns)) {
            $msg = 'Column names must be defined in an indexed array';
        } elseif (empty($tableName)) {
            $msg = 'Table Name is empty';
        } else {
            $columnName = implode(',', $columns);
            $query =
                'SELECT ' .
                $columnName .
                " FROM $tableName" .
                ' ORDER BY Name ASC';
            $result = $db->query($query);

            if ($result == true) {
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $msg = $row;
                } elseif ($result->num_rows = 0) {
                    $msg = 'No Data Found';
                }
            } else {
                $msg = mysqli_error($db);
            }
        }
        return $msg;
    }
    $fetchData = fetch_data($conn, $tableName, $columns);
} else {
    header('Location : login.php');
}

?>
