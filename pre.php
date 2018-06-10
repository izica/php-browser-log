<?
require_once 'PhpBrowserLog.php';

function pre(){
    $arBt = debug_backtrace();
    $arCaller = array_shift($arBt);
    $arArgsNames = PhpBrowserLog::getVarsNames($arCaller);

    PhpBrowserLog::script('[' . $arCaller['line'] . '] ' . $arCaller['file'], 'console.groupCollapsed');
    foreach ($arCaller['args'] as $nKey => $anyArg) {
        PhpBrowserLog::script($anyArg, 'console.log', $arArgsNames[$nKey]);
    }
    PhpBrowserLog::script('', 'console.groupEnd');
}
