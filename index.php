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

		$keyId      = '';
		$secretKey  = '';
		$associateId    = '';

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
	}
?>
