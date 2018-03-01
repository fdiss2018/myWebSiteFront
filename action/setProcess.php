<?php

traceSessionStart("setProcess", "");

$s = $this->getSession();

$process = $s['SITE']->getCurrentPage()->getProcess();
$process->traitementAction();

$this->setResultAction($process->getResultAction());

$this->setSession($s);
traceSessionEnd();

 
?>