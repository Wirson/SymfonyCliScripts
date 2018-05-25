#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application,
    Console\EvaluateString;

$application = new Application();

$application->add(new EvaluateString());

$application->run();
