<html>
	<body>
		<form action="index.php" method="POST">
			ASIN ID : <input type='text' name='txtSearch' value="B00OQVZDJM"/> <input type='submit' value="Search" />
		</form>
	</booy>
</html>
<?php
	if(isset($_POST["txtSearch"])){
		$ASIN_ID = $_POST["txtSearch"];
		require_once('AmazonAPI.php');

		$keyId      = 'AKIAIAT4M5PXLMBFEFDA';
		$secretKey  = '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';
		$associateId    = 'amawatlis-20';

		$amazonAPI = new AmazonAPI( $keyId, $secretKey, $associateId );
		$amazonAPI->SetSSL(true);
		$amazonAPI->SetLocale( 'us' );
		$amazonAPI->SetRetrieveAsArray(true);

		$items = $amazonAPI->ItemLookUp($ASIN_ID, true);
		foreach ($items as $key) {
			echo $key['title'];
			$img = $key['mediumImage'];
			echo "<br><img src=$img>";
		}
		//echo $items[0]->;

		// $timestamp = gmdate("Y-m-d\TH:i:s\Z");
		// $webService = "http://webservices.amazon.com/onca/xml?"
		// 				. "Service=AWSECommerceService"
		// 				. "&AWSAccessKeyId=$keyId"
		// 				. "&Operation=ItemLookup"
		// 				. "&ItemId=$ASIN_ID";
		// 				. "&Timestamp=$timestamp"
		// 				. "Signature=[Request Signature]";
		// echo $webService;
		
		
		// $request = "http://webservices.amazon.com/onca/xml?Service=AWSECommerceService&AWSAccessKeyId=AKIAITJQRVV5IREOXBVA&Operation=ItemLookup&ItemId=B00OQVZDJM&Timestamp=$Timestamp&Signature=[Request Signature]";

		// GET
		// webservices.amazon.com
		// /onca/xml
		// AWSAccessKeyId=AKIAITJQRVV5IREOXBVA&ItemId=B00OQVZDJM&Operation=ItemLookup&Service=AWSECommerceService&Timestamp=$Timestamp


	}
?>