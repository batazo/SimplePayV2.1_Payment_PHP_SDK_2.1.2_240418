<?php

/**
 *  Copyright (C) 2024 OTP Mobil Kft.
 *
 *  PHP version 8.3
 *
 *  This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  SDK
 * @package   SimplePayV2
 * @author    SimplePay IT Support <itsupport@otpmobil.com>
 * @copyright 2024 OTP Mobil Kft.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html  GNU GENERAL PUBLIC LICENSE (GPL V3.0)
 * @link      http://simplepartner.hu/online_fizetesi_szolgaltatas.html
 */

//Optional error riporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

 //Import config data
require_once 'src/config.php';

//Import SimplePayment class
require_once 'src/SimplePayV21.php';

$trx = new SimplePayRefund;

$trx->addConfig($config);


//add merchant transaction ID
//-----------------------------------------------------------------------------------------
if (isset($_REQUEST['orderRef'])) {
    $trx->addData('orderRef', $_REQUEST['orderRef']);
}


//add SimplePay transaction ID
//-----------------------------------------------------------------------------------------
if (isset($_REQUEST['transactionId'])) {
    $trx->addData('transactionId', $_REQUEST['transactionId']);
}


//add merchant account ID
//-----------------------------------------------------------------------------------------
if (isset($_REQUEST['merchant'])) {
    $trx->addConfigData('merchantAccount', $_REQUEST['merchant']);
}


// amount to refund
//-----------------------------------------------------------------------------------------
$trx->addData('refundTotal', 5);


// add currency
//-----------------------------------------------------------------------------------------
$trx->addData('currency', 'HUF');


// start refund
//-----------------------------------------------------------------------------------------
$trx->runRefund();


// test data
//-----------------------------------------------------------------------------------------
print "API REQUEST";
print "<pre>";
print_r($trx->getTransactionBase());
print "</pre>";

print "API RESULT";
print "<pre>";
print_r($trx->getReturnData());
print "</pre>";
