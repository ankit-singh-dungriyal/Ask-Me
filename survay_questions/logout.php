<?php

require'core.inc.php';
session_destroy();
header('Location:'.'showquizz.php?val=1');