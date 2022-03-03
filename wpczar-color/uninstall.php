<?php

if (!define('WP_UNINSTALL_PLUGIN', ['8.1' => 'mixed'])) {
    die;
}

delete_option('wpczar_last_quote_id');
