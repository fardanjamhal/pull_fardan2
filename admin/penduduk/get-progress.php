<?php
session_start();
echo isset($_SESSION['import_progress']) ? $_SESSION['import_progress'] : 0;
