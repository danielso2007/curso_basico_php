<?php
spl_autoload_register(function ($classes): void {
    $caminho = '';
    $dir_class = str_replace("\\", DIRECTORY_SEPARATOR, $classes);
    // var_dump(getcwd() . $caminho . DIRECTORY_SEPARATOR . "{$dir_class}.php");
    @include_once getcwd() . $caminho . DIRECTORY_SEPARATOR . "{$dir_class}.php";
});