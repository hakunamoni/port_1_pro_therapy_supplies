<?php

if (true) { 
        $mws = new AmazonMWS(AmazonConfig::getMWSConfig(0));
       //$report_id = '_GET_AFN_INVENTORY_DATA_';
	//$report_id = '_GET_FBA_FULFILLMENT_CURRENT_INVENTORY_DATA_';
	$report_id = '_GET_FLAT_FILE_ALL_ORDERS_DATA_BY_LAST_UPDATE_';
        $request_id = $mws->requestReportAsync($report_id, array(
            'StartDate' => DT::getBefore('2days')->format('c'),
        ));
        $report_id = $mws->waitForReport($request_id);
        if ($report_id == false) { 
            throw new CustomException('No report available');
        }
        $report = $mws->getReport($report_id);
        Log::data($report);
        Log::data(serialize($report));
}

if (false) { 
	$report_id = '23375487013'; 
	if ($report_id) { 
		$mws = new AmazonMWS(AmazonConfig::getMWSConfig(0));
		$report = $mws->getReport($report_id);
		Log::data($report);
		Log::data(serialize($report));
	}
}

if (false) { 
	$amazon_inventory_config = AmazonConfig::getInventoryConfig(0);
	$inventory = new AmazonInventory($amazon_inventory_config);
	$inventory = $inventory->listInventorySupply(array(
				'QueryStartDateTime' => '2015-01-03',
				//'QueryStartDateTime' => '2015-02-03',
				));
//Log::data($inventory);
Log::info(serialize($inventory));
}
