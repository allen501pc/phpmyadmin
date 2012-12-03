<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 *
 * @package PhpMyAdmin
 */

/**
 *
 */
require_once 'libraries/common.inc.php';

/**
 * Runs common work
 */
$response = PMA_Response::getInstance();
$header   = $response->getHeader();
$scripts  = $header->getScripts();
$scripts->addFile('makegrid.js');
$scripts->addFile('sql.js');

require 'libraries/tbl_common.inc.php';
// Allen: Replace '&amp;' with PMA_get_arg_separator('html').
$url_query .= PMA_get_arg_separator('html').'goto=tbl_sql.php'.PMA_get_arg_separator('html').'back=tbl_sql.php';

require_once 'libraries/sql_query_form.lib.php';

$err_url   = 'tbl_sql.php' . $err_url;
// After a syntax error, we return to this script
// with the typed query in the textarea.
$goto = 'tbl_sql.php';
$back = 'tbl_sql.php';

/**
 * Get table information
 */
require_once 'libraries/tbl_info.inc.php';

/**
 * Query box, bookmark, insert data from textfile
 */
PMA_sqlQueryForm(
    true, false,
    isset($_REQUEST['delimiter']) ? htmlspecialchars($_REQUEST['delimiter']) : ';'
);

?>
