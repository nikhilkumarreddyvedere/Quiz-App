
<?php
$accessKey = 'u$r9170e774879ad57ee9bef667f549351e';
$secretKey = '4406947c3dbfd9bf8aeeea21b6429acddaec98bd';
$api_url_base = 'https://api.leadsquared.com/v2/LeadManagement.svc';
$url = $api_url_base . '/Lead.Create?accessKey=' . $accessKey . '&secretKey=' . $secretKey;	
/*
	Lead values that you would save in LeadSquared
*/
$FirstName = $_POST['name1'];
$email = $_POST['email1'];
$data_string = '[
					{"Attribute":"FirstName", "Value": "'.$FirstName.'"},
					{"Attribute":"EmailAddress", "Value": "'.$email.'"}
					]';
try
{
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
												'Content-Type:application/json',
												'Content-Length:'.strlen($data_string)
												));
	$json_response = curl_exec($curl);
	curl_close($curl);
} catch (Exception $ex) { 
	curl_close($curl);
}
?>