<?php
require_once './src/model/home.php';

function homePage()
{

    require './src/view/home.php';
}

function displayJobs()
{
    return getJobs();
}
