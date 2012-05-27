<?php
namespace cecilia\util;
/**
 * 
 * Just a list of 2-letter country codes to corresponding country names. No Big Deal.
 * Based on list at http://www.iso.org/iso/list-en1-semic-3.txt
 * 
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @see 	http://www.iso.org/iso/list-en1-semic-3.txt
 * @namespace cecilia\util 
 * @package cecilia
 * @subpackage util
 * 
 */
class CountryMappings{
	
 protected static $SUPPORTED_SPOTIFY_COUNTRIES=array(
 	'US','AU'
 );
	
  protected static $COUNTRIES = array(
	"AD"=>"Andorra", 
	"AE"=>"United Arab Emirates", 
	"AF"=>"Afghanistan", 
	"AG"=>"Antigua and Barbuda", 
	"AI"=>"Anguilla", 
	"AL"=>"Albania", 
	"AM"=>"Armenia", 
	"AN"=>"Netherlands Antilles", 
	"AO"=>"Angola", 
	"AQ"=>"Antarctica", 
	"AR"=>"Argentina", 
	"AS"=>"American Samoa", 
	"AT"=>"Austria", 
	"AU"=>"Australia", 
	"AW"=>"Aruba", 
	"AX"=>"?", 
	"AZ"=>"Azerbaijan", 
	"BA"=>"Bosnia and Herzegovina", 
	"BB"=>"Barbados", 
	"BD"=>"Bangladesh", 
	"BE"=>"", 
	"BF"=>"", 
	"BG"=>"", 
	"BH"=>"", 
	"BI"=>"", 
	"BJ"=>"", 
	"BM"=>"", 
	"BN"=>"", 
	"BO"=>"", 
	"BR"=>"", 
	"BS"=>"", 
	"BT"=>"", 
	"BV"=>"", 
	"BW"=>"", 
	"BY"=>"", 
	"BZ"=>"", 
	"CA"=>"", 
	"CC"=>"", 
	"CD"=>"", 
	"CF"=>"", 
	"CG"=>"", 
	"CH"=>"", 
	"CI"=>"", 
	"CK"=>"", 
	"CL"=>"", 
	"CM"=>"", 
	"CN"=>"", 
	"CO"=>"", 
	"CR"=>"", 
	"CU"=>"", 
	"CV"=>"", 
	"CX"=>"", 
	"CY"=>"", 
	"CZ"=>"", 
	"DE"=>"", 
	"DJ"=>"", 
	"DK"=>"", 
	"DM"=>"", 
	"DO"=>"", 
	"DZ"=>"", 
	"EC"=>"", 
	"EE"=>"", 
	"EG"=>"", 
	"EH"=>"", 
	"ER"=>"", 
	"ES"=>"", 
	"ET"=>"", 
	"FI"=>"", 
	"FJ"=>"", 
	"FK"=>"", 
	"FM"=>"", 
	"FO"=>"", 
	"FR"=>"", 
	"GA"=>"", 
	"GB"=>"", 
	"GD"=>"", 
	"GE"=>"", 
	"GF"=>"", 
	"GG"=>"", 
	"GH"=>"", 
	"GI"=>"", 
	"GL"=>"", 
	"GM"=>"", 
	"GN"=>"", 
	"GP"=>"", 
	"GQ"=>"", 
	"GR"=>"", 
	"GS"=>"", 
	"GT"=>"", 
	"GU"=>"", 
	"GW"=>"", 
	"GY"=>"", 
	"HK"=>"", 
	"HM"=>"", 
	"HN"=>"", 
	"HR"=>"", 
	"HT"=>"", 
	"HU"=>"", 
	"ID"=>"", 
	"IE"=>"", 
	"IL"=>"", 
	"IN"=>"", 
	"IO"=>"", 
	"IQ"=>"", 
	"IR"=>"", 
	"IS"=>"", 
	"IT"=>"", 
	"JM"=>"", 
	"JO"=>"", 
	"JP"=>"", 
	"KE"=>"", 
	"KG"=>"", 
	"KH"=>"", 
	"KI"=>"", 
	"KM"=>"", 
	"KN"=>"", 
	"KP"=>"", 
	"KR"=>"", 
	"KW"=>"", 
	"KY"=>"", 
	"KZ"=>"", 
	"LA"=>"", 
	"LB"=>"", 
	"LC"=>"", 
	"LI"=>"", 
	"LK"=>"", 
	"LR"=>"", 
	"LS"=>"", 
	"LT"=>"", 
	"LU"=>"", 
	"LV"=>"", 
	"LY"=>"", 
	"MA"=>"", 
	"MC"=>"", 
	"MD"=>"", 
	"ME"=>"", 
	"MG"=>"", 
	"MH"=>"", 
	"MK"=>"", 
	"ML"=>"", 
	"MM"=>"", 
	"MN"=>"", 
	"MO"=>"", 
	"MP"=>"", 
	"MQ"=>"", 
	"MR"=>"", 
	"MS"=>"", 
	"MT"=>"", 
	"MU"=>"", 
	"MV"=>"", 
	"MW"=>"", 
	"MX"=>"", 
	"MY"=>"", 
	"MZ"=>"", 
	"NA"=>"", 
	"NC"=>"", 
	"NE"=>"", 
	"NF"=>"", 
	"NG"=>"", 
	"NI"=>"", 
	"NL"=>"", 
	"NO"=>"", 
	"NP"=>"", 
	"NR"=>"", 
	"NU"=>"", 
	"NZ"=>"", 
	"OM"=>"", 
	"PA"=>"", 
	"PE"=>"", 
	"PF"=>"", 
	"PG"=>"", 
	"PH"=>"", 
	"PK"=>"", 
	"PL"=>"", 
	"PM"=>"", 
	"PN"=>"", 
	"PR"=>"", 
	"PS"=>"", 
	"PT"=>"", 
	"PW"=>"", 
	"PY"=>"", 
	"QA"=>"", 
	"RE"=>"", 
	"RO"=>"", 
	"RS"=>"", 
	"RU"=>"", 
	"RW"=>"", 
	"SA"=>"", 
	"SB"=>"", 
	"SC"=>"", 
	"SD"=>"", 
	"SE"=>"", 
	"SG"=>"", 
	"SH"=>"", 
	"SI"=>"", 
	"SJ"=>"", 
	"SK"=>"", 
	"SL"=>"", 
	"SM"=>"", 
	"SN"=>"", 
	"SO"=>"", 
	"SR"=>"", 
	"ST"=>"", 
	"SV"=>"", 
	"SY"=>"", 
	"SZ"=>"", 
	"TC"=>"", 
	"TD"=>"", 
	"TF"=>"", 
	"TG"=>"", 
	"TH"=>"", 
	"TJ"=>"", 
	"TK"=>"", 
	"TL"=>"", 
	"TM"=>"", 
	"TN"=>"", 
	"TO"=>"", 
	"TR"=>"", 
	"TT"=>"", 
	"TV"=>"", 
	"TW"=>"", 
	"TZ"=>"", 
	"UA"=>"", 
	"UG"=>"", 
	"UM"=>"", 
	"US"=>"", 
	"UY"=>"", 
	"UZ"=>"", 
	"VA"=>"", 
	"VC"=>"", 
	"VE"=>"", 
	"VG"=>"", 
	"VI"=>"", 
	"VN"=>"", 
	"VU"=>"", 
	"WF"=>"", 
	"WS"=>"", 
	"YE"=>"", 
	"YT"=>"", 
	"ZA"=>"", 
	"ZM"=>"", 
	"ZW"=>"", 
	"ZZ"=>""); 
  
  
  public static function get_country_name($key){
  	if(array_key_exists($key,self::$COUNTRIES)){
  		return self::$COUNTRIES[$key];
  	}else{
  		return false;
  	}
  }
  
  public static function get_countries(){
  	return self::$COUNTRIES;
  }
}