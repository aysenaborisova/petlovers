<?php
require_once __DIR__ . '/bootstrap.php';

if (!isLoggedIn()) {
    redirect('login.php');
}