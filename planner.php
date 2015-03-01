<?php

	$results = array();

	$states = fopen("files/states.csv","r");
	$zipcodes = fopen("files/zipcodes.csv", "r");
	fclose($states);
	fclose($zipcodes);

	$city_textfield = $_GET["city_textfield"];
	$state_textfield = $_GET["state_textfield"];
	$job_textfield = $_GET["job_textfield"];
	$debt_textfield = $_GET["debt_textfield"];

	$city_textfield = str_replace(" ", "", $city_textfield);
	$state_textfield = str_replace(" ", "", $state_textfield);
	$job_textfield = str_replace(" ", "", $job_textfield);
	$debt_textfield = str_replace(" ", "", $debt_textfield);

	$job_endpoint = "http://api.glassdoor.com/api/api.htm?t.p=30822&t.k=vxCwTl1xrg&userip=216.59.196.8&useragent=chrome&format=json&v=1&action=jobs-prog&countryId=1&jobTitle=".$job_textfield;

	foreach($zipcodes as $city) {
		if(strtolower($city[1]) == strtolower($city_textfield)) {
			$zipcode = $city[0];
		}
	}
	$housing_endpoint = "http://www.zillow.com/webservice/GetMonthlyPayments.htm?zws-id=X1-ZWz1ay4jy8mi2z_17jma&price=190000&down=15&zip=".$zipcode;

	foreach($states as $theState) {
		if(strtolower($theState[0]) == strtolower($state_textfield)) {
			$stateCode = $theState[1];
		}
	}
	$costofliving_endpoint = "http://api.glassdoor.com/api/api.htm?v=1&format=json&t.p=30822&t.k=vxCwTl1xrg&action=employers&q=".$job_textfield."&userip=172.19.2.0&useragent=Mozilla/%2F35.0&state=".$stateCode."&radius=1&admLevelRequested=1&City=".strtolower($city_textfield);



	$session1 = curl_init($job_endpoint);
	$session2 = curl_init($housing_endpoint);
	$session3 = curl_init($costofliving_endpoint);

	curl_setopt($session1, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session2, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session3, CURLOPT_RETURNTRANSFER, true);

	// $data = curl_exec($session);
	array_push($results, json_decode(curl_exec($session1), true));
	curl_close($session1);

	array_push($results, json_decode(json_encode(simplexml_load_string(curl_exec($session2)))));
	curl_close($session2);

	array_push($results, json_decode(curl_exec($session3), true));
	curl_close($session3);

	// zillow is xml

	// $contents = json_decode($data, true);

	// echo $contents['weather'][0]['description'];
	// $payAverage = $contents['response']['payHigh'] - $contents['response']['payLow'];
	echo $results;

?>
