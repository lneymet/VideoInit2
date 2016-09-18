<?php
/**
 * Created by PhpStorm.
 * User: Spiritus
 * Date: 16/09/04
 * Time: 23:17
 */

session_start();
session_destroy();
header("Location: index.php");