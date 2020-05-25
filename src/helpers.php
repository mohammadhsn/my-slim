<?php


function app_env($key, $default = null)
{
    $result = getenv($key);

    if ($result === false) {
        return $default;
    }

    if ($result === 'true') {
        return true;
    }

    if ($result === 'false') {
        return false;
    }

    if ($result === 'null') {
        return null;
    }

    return $result;
}
