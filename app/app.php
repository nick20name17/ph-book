<?php

require('config.php');
require('functions.php');

require('data/data.class.php');
require('data/mysqldataprovider.class.php');


Data::initialize(new MysqlDataProvider(CONFIG['db']));