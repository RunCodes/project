<?php

namespace app\admin\controller;

use think\Controller;
use think\Config;
use think\Db;
use think\Model;

use  order\src\MarketplaceWebServiceOrders\Client;


class Index extends Controller{


    public  function index(){


    	vendor('order.src.MarketplaceWebServiceOrders.Client');
    	$logistics = new \MarketplaceWebServiceOrders_Client('AKIAJ5AC6CAJBSQJZYXA','yShNDF4ZL2dFsyaX7RRIFjqk+H67U9A/fCTlKrNS','Amazon Sellercentral Manager','1.0');

    	 $res = $logistics->listOrders([
    		'MarketplaceId'=>'ATVPDKIKX0DER',
    		'serviceUrl'=>"https://mws.amazonservices.com/Orders/2013-09-01",
    		'CreatedAfter'=>'2020-06-01',
    		'SellerId'=>'ACN2V0SCDZRHS',
    		'MWSAuthToken'=>'amzn.mws.e0b964ae-8583-2d38-8a9b-e5f8e3250fb5',
    		'AWSAccessKeyId'=>'AKIAJ5AC6CAJBSQJZYXA',
    		'SecretKey'=>'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',
    		'timestamp'=>gmdate("Y-m-d\TH:i:s\Z"),
    	]);

    	echo json_encode($res);die;


    // 	https://mws.amazonservices.jp/Orders/2013-09-01
  		// ?AWSAccessKeyId=0PB842EXAMPLE7N4ZTR2
  		// &Action=ListOrders
  		// &MWSAuthToken=amzn.mws.4ea38b7b-f563-7709-4bae-87aeaEXAMPLE
  		// &MarketplaceId.Id.1=A1VC38T7YXB528
  		// &FulfillmentChannel.Channel.1=MFN
  		// &PaymentMethod.1=COD
  		// &PaymentMethod.2=Other
  		// &OrderStatus.Status.1=Unshipped
  		// &OrderStatus.Status.2=PendingAvailability
  		// &SellerId=A2NEXAMPLETF53
  		// &Signature=ZQLpf8vEXAMPLE0iC265pf18n0%3D
  		// &SignatureVersion=2
  		// &SignatureMethod=HmacSHA256
  		// &LastUpdatedAfter=2013-08-01T18%3A12%3A21
  		// &Timestamp=2013-09-05T18%3A12%3A21.687Z
  		// &Version=2013-09-01

    	// $logistics->invokeListOrders();


    
    }  


}