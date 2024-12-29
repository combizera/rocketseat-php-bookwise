<?php

session_start();

require '../models/Book.php';
require '../models/User.php';
require '../models/Review.php';

require '../Flash.php';
require '../functions.php';

$config = require('../config.php');

require '../Database.php';
require '../routes.php';
