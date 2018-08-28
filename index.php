<?php
date_default_timezone_set("America/Toronto");

$HUE_IP = "192.168.1.102";
$SERVER_IP = $_SERVER['SERVER_ADDR'];
$REQUEST = $_SERVER['REQUEST_URI'];
$HUE_USER_STR = "eNeGbvVN-BSB8t1gzYCv-9Gako1PPqI9P36D6641";
$PROTOCOL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$MAC_SHIFT = "85";
$FAKE_BRIDGE_USER = "hue_app#bren1818";

error_log("");
error_log("");
error_log("" . date("Y-m-d H:i:s") );
error_log("Request Type: ". $_SERVER['REQUEST_METHOD'] . " | URI : " . $_SERVER['REQUEST_URI'] . " over : ".strtoupper($PROTOCOL) );
error_log("This Server IP: ". $_SERVER['SERVER_ADDR'] . " | Remote Device IP: ".$_SERVER['REMOTE_ADDR'] );

/*Access-Control-Allow-Credentials: true
Access-Control-Allow-Headers: Content-Type
Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE, HEAD
Access-Control-Allow-Origin: *
Access-Control-Max-Age: 3600
Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0
*/


if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
	//error_log("Post Request = " . $_REQUEST['path'] );
	//error_log("Remote Posted ... ". print_r($_REQUEST, true)  );
	if( $REQUEST == "/api/" ){
		$response = array(array(
			"success" => array("username" => $HUE_USER_STR)
		));
		ob_clean();
		header('Content-Type: application/json');
		echo json_encode ($response);
		exit;
	}
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'PUT'){
	$put = file_get_contents('php://input');
	$jput = (array)json_decode( $put );
	
	//1 is light number
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/lights/1/state"){
	
	}
	
	//1 is group number
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/groups/1/action"){
	
	}
	
	
	error_log( $put . " " . print_r($jput,true) );
	exit;
	//Turn on Group of lights
	//Request URI: /api/HNeGbvVN-BSB8t1gzYCv-9Gako1PPqI9P36D66JJ/groups/1/action
	
	//Turn on light
	//Request URI: /api/HNeGbvVN-BSB8t1gzYCv-9Gako1PPqI9P36D66JJ/lights/1/state

}

//HTTPS
if( $PROTOCOL == "https" ){
	
	//lights
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/lights"){
		error_log("Requesting /api/.../lights");
		ob_clean();
		header('Content-Type: application/json');
		?>
	{
		"1": {
			"state": {
				"on": false,
				"bri": 254,
				"hue": 14974,
				"sat": 140,
				"effect": "none",
				"xy": [
					0.457,
					0.4098
				],
				"ct": 362,
				"alert": "select",
				"colormode": "xy",
				"mode": "homeautomation",
				"reachable": true
			},
			"swupdate": {
				"state": "noupdates",
				"lastinstall": "2017-12-10T01:13:38"
			},
			"type": "Extended color light",
			"name": "Living Room TV",
			"modelid": "LCT007",
			"manufacturername": "Philips",
			"productname": "Hue color lamp",
			"capabilities": {
				"certified": true,
				"control": {
					"mindimlevel": 2000,
					"maxlumen": 800,
					"colorgamuttype": "B",
					"colorgamut": [
						[
							0.675,
							0.322
						],
						[
							0.409,
							0.518
						],
						[
							0.167,
							0.04
						]
					],
					"ct": {
						"min": 153,
						"max": 500
					}
				},
				"streaming": {
					"renderer": true,
					"proxy": true
				}
			},
			"config": {
				"archetype": "sultanbulb",
				"function": "mixed",
				"direction": "omnidirectional"
			},
			"uniqueid": "00:17:88:01:10:31:c1:a7-0b",
			"swversion": "5.105.0.21536"
		}
	}
		<?php
		exit;
	}

	
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/lights/new"){
		error_log("Requesting /api/.../lights/new");
		ob_clean();
		header('Content-Type: application/json');
		?>
{
"lastscan": "2018-08-26T20:25:31"
}
	<?php
	}

	//sensors
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/sensors"){
		error_log("Requesting /api/.../sensors");
		ob_clean();
		header('Content-Type: application/json');
		?>
	{
	}	
		<?php
		exit;
	}

	if( $REQUEST == "/api/" . $HUE_USER_STR . "/sensors/new"){
		error_log("Requesting /api/.../sensors/new");
		ob_clean();
		header('Content-Type: application/json');
		?>
{
"lastscan": "2018-08-26T20:25:31"
}
		<?php
		exit;
	}
	
	//groups
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/groups"){
		error_log("Requesting /api/.../groups");
		ob_clean();
		header('Content-Type: application/json');
		?>
	{
	"1": {
		"name": "Living Room",
		"lights": [
			"1"
		],
		"type": "Room",
		"state": {
			"all_on": true,
			"any_on": true
		},
		"recycle": false,
		"class": "Kitchen",
		"action": {
			"on": true,
			"bri": 254,
			"hue": 8418,
			"sat": 140,
			"effect": "none",
			"xy": [
				0.4573,
				0.41
			],
			"ct": 366,
			"alert": "select",
			"colormode": "ct"
		}
	}
}
		<?php
		exit;
	}
	
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/groups/1/"){
		error_log("Requesting /api/.../groups/1/");
		ob_clean();
		header('Content-Type: application/json');
	?>
{
	"name": "Living Room",
	"lights": [
		"1"
	],
	"type": "Room",
	"state": {
		"all_on": false,
		"any_on": false
	},
	"recycle": false,
	"class": "Kitchen",
	"action": {
		"on": false,
		"bri": 254,
		"hue": 8418,
		"sat": 140,
		"effect": "none",
		"xy": [
			0.4573,
			0.41
		],
		"ct": 366,
		"alert": "select",
		"colormode": "ct"
	}
}
	<?php
	exit;
	}
	
	
	//config
	if( $REQUEST == "/api/" . $HUE_USER_STR . "/config"){
		error_log("Requesting /api/.../config");
		ob_clean();
		header('Content-Type: application/json');
		?>
	{
		"name": "Fake hue",
		"zigbeechannel": 15,
		"bridgeid": "<?php echo "001788FFFE2537".$MAC_SHIFT; ?>",
		"mac": "<?php echo "c8:2a:14:1c:cf:".$MAC_SHIFT; ?>",
		"dhcp": false,
		"ipaddress": "<?php echo $_SERVER['SERVER_ADDR']; ?>",
		"netmask": "255.255.255.0",
		"gateway": "192.168.1.1",
		"proxyaddress": "none",
		"proxyport": 0,
		"UTC": "2018-08-27T22:18:09",
		"localtime": "2018-08-27T18:18:09",
		"timezone": "America/Toronto",
		"modelid": "BSB002",
		"datastoreversion": "71",
		"swversion": "1806051111",
		"apiversion": "1.26.0",
		"swupdate": {
			"updatestate": 0,
			"checkforupdate": false,
			"devicetypes": {
				"bridge": false,
				"lights": [],
				"sensors": []
			},
			"url": "",
			"text": "",
			"notify": true
		},
		"swupdate2": {
			"checkforupdate": false,
			"lastchange": "2018-08-26T22:12:42",
			"bridge": {
				"state": "noupdates",
				"lastinstall": "2018-07-02T06:25:25"
			},
			"state": "noupdates",
			"autoinstall": {
				"updatetime": "T02:00:00",
				"on": true
			}
		},
		"linkbutton": false,
		"portalservices": true,
		"portalconnection": "connected",
		"portalstate": {
			"signedon": true,
			"incoming": false,
			"outgoing": true,
			"communication": "disconnected"
		},
		"internetservices": {
			"internet": "connected",
			"remoteaccess": "connected",
			"time": "connected",
			"swupdate": "connected"
		},
		"factorynew": false,
		"replacesbridgeid": null,
		"backup": {
			"status": "idle",
			"errorcode": 0
		},
		"starterkitid": "",
		"whitelist": {
			"<?php echo $HUE_USER_STR; ?>": {
				"last use date": "2018-08-27T22:18:09",
				"create date": "2018-08-27T21:34:44",
				"name": "<?php echo $FAKE_BRIDGE_USER; ?>"
			}
		}
	}
		<?php
		exit;
	}

}

if( $REQUEST == "/api/" . $HUE_USER_STR . "/lights/1/"){
		error_log("Requesting /api/.../lights");
		ob_clean();
		header('Content-Type: application/json');
		?>
{
	"state": {
		"on": false,
		"bri": 254,
		"hue": 14974,
		"sat": 140,
		"effect": "none",
		"xy": [
			0.457,
			0.4098
		],
		"ct": 362,
		"alert": "select",
		"colormode": "xy",
		"mode": "homeautomation",
		"reachable": true
	},
	"swupdate": {
		"state": "noupdates",
		"lastinstall": "2017-12-10T01:13:38"
	},
	"type": "Extended color light",
	"name": "Living Room TV",
	"modelid": "LCT007",
	"manufacturername": "Philips",
	"productname": "Hue color lamp",
	"capabilities": {
		"certified": true,
		"control": {
			"mindimlevel": 2000,
			"maxlumen": 800,
			"colorgamuttype": "B",
			"colorgamut": [
				[
					0.675,
					0.322
				],
				[
					0.409,
					0.518
				],
				[
					0.167,
					0.04
				]
			],
			"ct": {
				"min": 153,
				"max": 500
			}
		},
		"streaming": {
			"renderer": true,
			"proxy": true
		}
	},
	"config": {
		"archetype": "sultanbulb",
		"function": "mixed",
		"direction": "omnidirectional"
	},
	"uniqueid": "00:17:88:01:10:31:c1:a7-0b",
	"swversion": "5.105.0.21536"
}
		<?php
}

if( $REQUEST == "/api/" . $HUE_USER_STR ){
	error_log("Returning list of lights ");
	ob_clean();
	header('Content-Type: application/json');
	?>
{
	"lights": {
		"1": {
			"state": {
				"on": false,
				"bri": 254,
				"hue": 14974,
				"sat": 140,
				"effect": "none",
				"xy": [
					0.457,
					0.4098
				],
				"ct": 362,
				"alert": "select",
				"colormode": "xy",
				"mode": "homeautomation",
				"reachable": true
			},
			"swupdate": {
				"state": "noupdates",
				"lastinstall": "2017-12-10T01:13:38"
			},
			"type": "Extended color light",
			"name": "Living Room TV",
			"modelid": "LCT007",
			"manufacturername": "Philips",
			"productname": "Hue color lamp",
			"capabilities": {
				"certified": true,
				"control": {
					"mindimlevel": 2000,
					"maxlumen": 800,
					"colorgamuttype": "B",
					"colorgamut": [
						[
							0.675,
							0.322
						],
						[
							0.409,
							0.518
						],
						[
							0.167,
							0.04
						]
					],
					"ct": {
						"min": 153,
						"max": 500
					}
				},
				"streaming": {
					"renderer": true,
					"proxy": true
				}
			},
			"config": {
				"archetype": "sultanbulb",
				"function": "mixed",
				"direction": "omnidirectional"
			},
			"uniqueid": "00:17:88:01:10:31:c1:a7-0b",
			"swversion": "5.105.0.21536"
		}
	},
	"groups": {
		"1": {
			"name": "Living Room",
			"lights": [
				"1"
			],
			"type": "Room",
			"state": {
				"all_on": false,
				"any_on": false
			},
			"recycle": false,
			"class": "Kitchen",
			"action": {
				"on": false,
				"bri": 254,
				"hue": 8418,
				"sat": 140,
				"effect": "none",
				"xy": [
					0.4573,
					0.41
				],
				"ct": 366,
				"alert": "select",
				"colormode": "ct"
			}
		}
	},
	"config": {
		"name": "Fake hue",
		"zigbeechannel": 15,
		"bridgeid": "<?php echo "001788FFFE2537".$MAC_SHIFT; ?>",
		"mac": "<?php echo "c8:2a:14:1c:cf:".$MAC_SHIFT; ?>",
		"dhcp": true,
		"ipaddress": "<?php echo $_SERVER['SERVER_ADDR']; ?>",
		"netmask": "255.255.255.0",
		"gateway": "192.168.1.1",
		"proxyaddress": "none",
		"proxyport": 0,
		"UTC": "2018-08-27T21:35:18",
		"localtime": "2018-08-27T17:35:18",
		"timezone": "America/Toronto",
		"modelid": "BSB002",
		"datastoreversion": "71",
		"swversion": "1806051111",
		"apiversion": "1.26.0",
		"swupdate": {
			"updatestate": 0,
			"checkforupdate": false,
			"devicetypes": {
				"bridge": false,
				"lights": [],
				"sensors": []
			},
			"url": "",
			"text": "",
			"notify": true
		},
		"swupdate2": {
			"checkforupdate": false,
			"lastchange": "2018-08-26T22:12:42",
			"bridge": {
				"state": "noupdates",
				"lastinstall": "2018-07-02T06:25:25"
			},
			"state": "noupdates",
			"autoinstall": {
				"updatetime": "T02:00:00",
				"on": true
			}
		},
		"linkbutton": true,
		"portalservices": true,
		"portalconnection": "connected",
		"portalstate": {
			"signedon": true,
			"incoming": false,
			"outgoing": true,
			"communication": "disconnected"
		},
		"internetservices": {
			"internet": "connected",
			"remoteaccess": "connected",
			"time": "connected",
			"swupdate": "connected"
		},
		"factorynew": false,
		"replacesbridgeid": null,
		"backup": {
			"status": "idle",
			"errorcode": 0
		},
		"starterkitid": "",
		"whitelist": {
			"<?php echo $HUE_USER_STR; ?>": {
				"last use date": "2018-08-27T21:35:18",
				"create date": "2018-08-27T21:34:44",
				"name": "<?php echo $FAKE_BRIDGE_USER; ?>"
			}
		}
	},
	"schedules": {
	},
	"scenes": {	
	},
	"rules": {
	},
	"sensors": {
	},
	"resourcelinks": {
	}
}
	<?php
	exit;
}




if( $REQUEST == "/hue/linkbutton" ){
	error_log("Link Button");
}

if( $REQUEST == "/description.xml" ){
	error_log("Fetching Description");
	$curl = curl_init($HUE_IP . "/description.xml");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);
	if( $result != "" ){
		ob_clean();
		header("Content-type: text/xml");
		echo str_replace($HUE_IP, $SERVER_IP, $result);
	}else{
		ob_clean();
		header("Content-type: text/xml");
		?>
		<root xmlns="urn:schemas-upnp-org:device-1-0">
		<specVersion>
		<major>1</major>
		<minor>0</minor>
		</specVersion>
		<URLBase>http://<?php echo $SERVER_IP; ?>:80/</URLBase>
		<device>
		<deviceType>urn:schemas-upnp-org:device:Basic:1</deviceType>
		<friendlyName>Philips hue (<?php echo $SERVER_IP; ?>)</friendlyName>
		<manufacturer>Royal Philips Electronics</manufacturer>
		<manufacturerURL>http://www.philips.com</manufacturerURL>
		<modelDescription>Philips hue Personal Wireless Lighting</modelDescription>
		<modelName>Philips hue bridge 2015</modelName>
		<modelNumber>BSB002</modelNumber>
		<modelURL>http://www.meethue.com</modelURL>
		<serialNumber>0017882537ef</serialNumber>
		<UDN>uuid:2f402f80-da50-1818-9b23-0017882537ef</UDN>
		<presentationURL>index.html</presentationURL>
		<iconList>
		<icon>
		<mimetype>image/png</mimetype>
		<height>48</height>
		<width>48</width>
		<depth>24</depth>
		<url>hue_logo_0.png</url>
		</icon>
		</iconList>
		</device>
		</root>
		<?php
		exit;
	}
}

//1
if( $REQUEST == "/api/nouser/config" ){
	
	$curl = curl_init($HUE_IP . "/api/nouser/config");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);

	$return = "";

	//get Mac Address on Windows machine -- https://gist.github.com/taiar/4732398
	ob_start(); // Turn on output buffering
	system('ipconfig /all'); //Execute external program to display output
	$mycom=ob_get_contents(); // Capture the output into a variable
	ob_clean(); // Clean (erase) the output buffer
	$findme = "Physical";
	$pmac = strpos($mycom, $findme); // Find the position of Physical text
	$mac=substr($mycom,($pmac+36),17); // Get Physical Address

	$mac = preg_replace("/[-]/", ":", $mac);
	$mac = strtolower( $mac );

	if( $result != "" ){
		
		$bridge = (array)json_decode( $result );
		
		error_log("Real Bridge info: ".json_encode($bridge) );
		
		//create fake bridge object
		$return = array(
			"name" => $bridge["name"],
			"datastoreversion" => $bridge["datastoreversion"],
			"swversion" => $bridge["swversion"],
			"apiversion" => $bridge["apiversion"],
			"mac" =>  substr($mac, 0, -2).$MAC_SHIFT,
			"bridgeid" => substr( $bridge["bridgeid"], 0, -2).$MAC_SHIFT,
			"factorynew" => $bridge["factorynew"],
			"replacesbridgeid" => $bridge["replacesbridgeid"],
			"modelid" =>  $bridge["modelid"],
			//"linkbutton"=>true,
			"starterkitid" => $bridge["starterkitid"]
		);
		error_log( "Fake Bridge resp: ".json_encode($return) );
	}else{
		$return = array(
			"name" => "",
			"datastoreversion" => "",
			"swversion" => "",
			"apiversion" => "",
			"mac" => $mac,
			"bridgeid" => "1818"."FFFFFEFFFFEF",
			"factorynew" => false,
			"replacesbridgeid" => null,
			"modelid" => "BSB002",
			"starterkitid" => ""
		);
		error_log( "Code Bridge resp: ".json_encode($return) );
	}
	ob_clean();
	header('Content-Type: application/json');
	echo json_encode($return);
	exit;
}

if( $REQUEST == "/api/newdeveloper" ){
	$response = array(array(
		"error" => array("type" => 1, "address" => "/", "description" => "unauthorized user")
	));
	ob_clean();
	header('Content-Type: application/json');
	echo json_encode ($response);
}

if( $REQUEST == "/api/".$HUE_USER_STR."/config" ){
	$response = array(array(
		"success" => array("config/linkbutton" => true)
	));
	ob_clean();
	header('Content-Type: application/json');
	echo json_encode ($response);
	exit;
}





if( $REQUEST == "/"){
	error_log("/ - No Request");
	exit;
}

if( $REQUEST == "/api/"){
	if( $PROTOCOL == "https" ){

	}else{
		$response = array(array(
			"error" => array("type" => 4, "address" => "/", "description" => "method, GET, not available for resource, /")
		));
		ob_clean();
		header('Content-Type: application/json');
		echo json_encode ($response);
		error_log(json_encode ($response));
		exit;
	}
}

error_log("Unknown Request");
exit;
?>