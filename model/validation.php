<?php

function validForm()
{
    global $f3;

    $name = $f3->get('name');
    $options = $f3->get('options');

    $isValid = true;

    if (!validField($name))
    {
        $f3->set("errors['name']", '  Please enter your name');
        $isValid = false;
    }

    if (!validField($options))
    {
        $f3->set("errors['options']", '  Please check at least one option');
        $isValid = false;
    }

    return $isValid;
}

function validField($field)
{
    return !empty($field);
}