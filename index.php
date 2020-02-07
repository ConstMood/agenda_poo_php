<?php
    require_once 'lib/.php';
    require_once 'lib/people.php';

$getPeople = People::findAll(['name' => 'People Big Name']);