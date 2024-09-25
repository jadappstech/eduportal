<?php
    const DB_HOST="localhost";
    const DB_DATABASE ="school_portal";
    const DB_USERNAME ="root";
    const DB_PASSWORD ="Totalchild6471!";

      $sqlConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);// Check connection
    if ($sqlConnection->connect_error) {
        returnJson(STATUS_ERROR, SQL_CONNECTION_ERROR, INTERNAL_SERVER_ERROR);
        die();
    }
?>