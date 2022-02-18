<?php
function is_blank($value): bool{
    return !isset($value) || trim($value) === '';
}