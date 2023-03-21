<?php

///////////////////////////////////////////////////////////////////////////////////////////////////

class AmazonConfig
{
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static $MARKETPLACE_IDS = array(
        'US' => 'ATVPDKIKX0DER',
        'UK' => 'A1F83G8C2ARO7P',
        'DE' => 'A1PA6795UKMFR9',
        'FR' => 'A13V1IB3VIYZZH',
        'IT' => 'APJ6JRA9NG5V4',
        'ES' => 'A1RKKUPIHCS9HS',
    );

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static $ENDPOINTS = array(
        'US' => 'https://mws.amazonservices.com',
        'UK' => 'https://mws.amazonservices.co.uk',
        'DE' => 'https://mws.amazonservices.de',
        'FR' => 'https://mws.amazonservices.fr',
        'IT' => 'https://mws.amazonservices.it',
        'ES' => 'https://mws.amazonservices.es',
        'JP' => 'https://mws.amazonservices.jp',
        'CN' => 'https://mws.amazonservices.com.cn',
        'CA' => 'https://mws.amazonservices.ca',
        'IN' => 'https://mws.amazonservices.in',
    );

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static $MWS = array(
        array(
            'marketplace_code' => 'US',
            'merchant_id' => 'A1L9NKXDNACY0J',
            'access_key' => 'AKIAIX6VHGTN6I56S4AQ',
            'secret_key' => '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',
        ),
        array(
            'marketplace_code' => 'US',
            'merchant_id' => 'A3B5SVZFOPDH8A',
            'access_key' => 'AKIAJIPXEZZFUL3DWRTQ',
            'secret_key' => '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',
        ),
    );

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static function getMWSConfig($path = null) { 
        if (isset(self::$MWS[0]) == false) { 
            self::$MWS = array(self::$MWS);
        }
        foreach(self::$MWS as & $mws) { 
            $mws['marketplace_id'] = self::$MARKETPLACE_IDS[$mws['marketplace_code']];
            $mws['endpoint'] = self::$ENDPOINTS[$mws['marketplace_code']];
        }
        if (is_null($path) == false) { 
            return self::$MWS[$path];
        }
        return self::$MWS;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static function getInventoryConfig($path = null) { 
        return array_merge_ex(array(
            'url' => 'https://mws.amazonservices.com/FulfillmentInventory/2010-10-01',
        ), self::getMWSConfig($path));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////

}

///////////////////////////////////////////////////////////////////////////////////////////////////

class NetSuiteConfig
{
    const URL = 'https://webservices.netsuite.com';
    const ACCOUNT = '671309';
    const USERNAME = 'pts.webservice@gmail.com';
    const PASSWORD = 'Webservice00';
    const ROLE_ID = 1018;

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static $CUSTOM_FIELDS = array(
        array(
            'fba_30_days_sold' => 'custitem_fba30daysold',
            'fba_qty' => 'custitem_fbaqty',        
            'fba' => 'custitemamazonfba',
        ),
        array(
            'fba_30_days_sold' => 'custitem_fba2_30daysold',
            'fba_qty' => 'custitem_fba2qty',
            'fba' => 'custitemamazonfba2',
        ),
   );

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static $USE_INTERNAL_IDS = false;

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    const RETRY = false;

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static function toArray($path = null) {
        $config = array(
            'url' => self::URL,
            'account' => self::ACCOUNT,
            'username' => self::USERNAME,
            'password' => self::PASSWORD,
            'role_id' => self::ROLE_ID,
            'custom_fields' => self::$CUSTOM_FIELDS,
            'use_internal_ids' => self::$USE_INTERNAL_IDS,
        );
        if (is_null($path) == false) { 
            $config['custom_fields'] = $config['custom_fields'][$path];
        }
        return $config;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////

}

///////////////////////////////////////////////////////////////////////////////////////////////////

class Config
{
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    const PHP_LIB = '/home/haircapi/public_html/amazon/PHPLib.php';

    ///////////////////////////////////////////////////////////////////////////////////////////////////

	public static $USE_AMAZON_SKUS = array(
'CLEARLY-MD-KIT1-FBA',
'CLEARLY-MD-KIT1-FBA',
);

    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public static function init() { 
        APP::init(array(
            'mode' => 'development',
            'log' => array(
                'level' => Log::LEVEL_ALL,
                'limit' => 50,
                'append' => true,
            ),
            'curl' => array(
                'log' => true,
                'retries' => 3,
            ),
        ));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////

}

///////////////////////////////////////////////////////////////////////////////////////////////////

class PDEBUG
{
    const USE_FIDDLER = false;
}

///////////////////////////////////////////////////////////////////////////////////////////////////

