<?php

class PhpBrowserLog
{
    public static function script($data, $command = 'console.log', $variable = false)
    {
        echo '<script>';
        if ($variable === false) {
            echo $command . '(' . json_encode($data) . ')';
        } else {
            echo $command . '("' . trim($variable) . '",' . json_encode($data) . ')';
        }
        echo '</script>';
    }

    public static function getVarsNames($arCaller)
    {
        $sFile = file_get_contents($arCaller['file']);
        $arFile = explode("\n", $sFile);
        $arArgsNames = explode('(', $arFile[$arCaller[line] - 1])[1];
        $arArgsNames = explode(')', $arArgsNames)[0];
        return explode(',', $arArgsNames);
    }

    public static function log()
    {
        $arBt = debug_backtrace();
        $arCaller = array_shift($arBt);
        $arArgsNames = self::getVarsNames($arCaller);

        self::script('[' . $arCaller['line'] . '] ' . $arCaller['file'], 'console.groupCollapsed');
        foreach ($arCaller['args'] as $nKey => $anyArg) {
            self::script($anyArg, 'console.log', $arArgsNames[$nKey]);
        }
        self::script('', 'console.groupEnd');
    }

    public static function pre()
    {
        $arBt = debug_backtrace();
        $arCaller = array_shift($arBt);
        $arArgsNames = self::getVarsNames($arCaller);

        self::script('[' . $arCaller['line'] . '] ' . $arCaller['file'], 'console.groupCollapsed');
        foreach ($arCaller['args'] as $nKey => $anyArg) {
            self::script($anyArg, 'console.log', $arArgsNames[$nKey]);
        }
        self::script('', 'console.groupEnd');
    }
}