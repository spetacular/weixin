<?php
/**
 * Useage
 * weixin.class.php is the main class. It  encloses all functions that weixin  supplies.
 * You need to inherit this class (example: defaultweixin.php), and then rewrite the
 * processRequest method
 */

require 'defaultweixin.php';
$weixin = new DefaultWeixin();
$weixin->run();
exit(0);
