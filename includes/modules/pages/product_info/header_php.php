<?php
/**
 * product_info header_php.php
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 Feb 20 Modified in v2.0.0-beta1 $
 */

// This should be first line of the script:
$zco_notifier->notify('NOTIFY_HEADER_START_PRODUCT_INFO');

require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));

$product_info = new Product($products_id_current = (!empty($_GET['products_id']) ? (int)$_GET['products_id'] : 0));
if ($current_page !== $product_info->get('info_page')) {
    zen_redirect(zen_href_link($product_info->get('info_page'), zen_get_all_get_params()));
}

zen_product_set_header_response($products_id_current, $product_info);

// ensure navigation snapshot is set in order to "go back" in case must-be-logged-in-for-price is enabled
if (!zen_is_logged_in()) {
    $_SESSION['navigation']->set_snapshot();
}

// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_PRODUCT_INFO');
