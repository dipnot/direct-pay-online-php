<?php
use Dipnot\DirectPayOnline\Config;

require_once("./../vendor/autoload.php");

// Config
$config = new Config();
$config->setCompanyToken("9F416C11-127B-4DE2-AC7F-D5710E4C5E0A");
$config->setTestMode(true);

return $config;
