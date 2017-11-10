<?php
require_once __DIR__ . '/config.php';
if (is_file(__DIR__ . '/config.real.php')) {
	require_once __DIR__ . '/config.real.php';
} elseif (is_file(__DIR__ . '/config.local.php')) {
	require_once __DIR__ . '/config.local.php';
}
