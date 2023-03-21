<?php

class NetSuiteConfig
{
    const URL = 'https://webservices.netsuite.com';
    const ACCOUNT = '671309';
    const USERNAME = 'pts.webservice@gmail.com';
    const PASSWORD = 'Webservice00';
    const ROLE_ID = 1018;

    public static function toArray() {
        return APP::getClassConstants("NetSuiteConfig");
    }
}

class RakutenConfig
{
    const SHIPMENT_FEED = 'https://system.netsuite.com/core/media/media.nl?id=1586736&c=671309&h=102c210419d8aeeff49f&_xt=.txt';
    public static $INVENTORY_FEEDS = array(
        'https://system.netsuite.com/core/media/media.nl?id=1586837&c=671309&h=455c10b0c1d5ccd93852&_xt=.txt',
        'https://system.netsuite.com/core/media/media.nl?id=1606030&c=671309&h=6c34411467e7666e2a21&_xt=.txt',
        'https://system.netsuite.com/core/media/media.nl?id=1625014&c=671309&h=e47eb9ced8fa04078dc6&_xt=.txt',
        'https://system.netsuite.com/core/media/media.nl?id=1625748&c=671309&h=7b6fb85f1a203d23bcc7&_xt=.txt',
        'https://system.netsuite.com/core/media/media.nl?id=1629539&c=671309&h=46f4c619dc91410fcaf1&_xt=.txt',
        'https://system.netsuite.com/core/media/media.nl?id=1629540&c=671309&h=595c96928cad59f57073&_xt=.txt',
    );

    public static $FTP = array(
        'host' => 'trade.marketplace.buy.com',
        'username' => 's.tang@protherapysupplies.com',
        'password' => 'ProTsuup1',
    );

    public static function getFTP() {
        if (PDEBUG::USE_LOCAL_FTP) {
            $config['FTP_HOST'] = 'localhost';
            $config['FTP_USERNAME'] = 'user';
            $config['FTP_PASSWORD'] = 'pass';
            return $config;
        }
        return self::$FTP;
    }


};

class EMailConfig
{
    public static $URI_EMAIL_TEMPLATE = array(__DIR__,  '/email-template.htm');

    public static $RAKUTEN = array(
        'from' => 'haircapi@elastogels.com',
	'tos' => array(
		'orders' => array(
			'pts.eowen@gmail.com',
			),
		'inventory' => array(
			'pts.eowen@gmail.com',
			),
		'shipments' => array(
			'pts.eowen@gmail.com',
			),
		),
	);

};

