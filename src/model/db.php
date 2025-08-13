<?php
function getConnexion()
{
    return new PDO(
        'mysql:host=localhost; dbname=job_tracker; charset=UTF8',
        'root',
        ''
    );
}