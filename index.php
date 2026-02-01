<?php
/**
 * Fallback front controller for subfolder installs (XAMPP /htdocs/project).
 *
 * If Apache is not configured to use /public as the DocumentRoot,
 * this file allows hitting /tuk_sports_web/ and still boot Laravel.
 *
 * Note: For clean URLs like /tuk_sports_web/about, Apache must still have
 * mod_rewrite enabled and AllowOverride enabled for this directory.
 */

require __DIR__ . '/public/index.php';

