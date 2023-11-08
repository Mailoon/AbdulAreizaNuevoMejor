<?php
session_start();
session_destroy();
header('Location: ../Views/main.php');