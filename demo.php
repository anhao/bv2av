<?php
/**
 * @author Alone88
 */

require 'Bilibili.php';

$bz = new Bilibili();

echo $bz->dec('BV1iQ4y1M7EH'); //710089998

echo PHP_EOL;

echo $bz->enc(710089998);  //BV1iQ4y1M7EH
