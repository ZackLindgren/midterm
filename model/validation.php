<?php

function validForm()
{
    global $f3;

    $name = $f3->get('name');
    $options = $f3->get('options');

    return validField($name) && validField($options);
}

function validField($field)
{
    return !empty($field);
}