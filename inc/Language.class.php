<?php
class Language
{
	public $code;
	public $languageList = array
		(
		 'en' => 'English',
		 'es' => 'Español',
		 'ca' => 'Català',
		 'ru' => 'русский',
		 'zh' => '中國',
		 'ko' => '한국인',
		);

	public function __construct()
	{
		if(isset($_COOKIE['lang']))
			$this->code = $_COOKIE['lang'];
		else
			$this->code = 'en';
	}
	public function ReturnDefinitions($code = false)
	{
		if(!$code)
		{
			$code = $this->code;
		}

		$base = dirname(dirname(__FILE__));

		$langFile = $base.'/lang/'.$code.'/definitions.inc.php';

		$defs = require($langFile);

		return $defs;
	}
	public function ChangeLanguage($code)
	{
		if(!array_key_exists($code, $this->languageList))
			return false;
		$this->code = $code;
		setcookie('lang', $code, 0, '/');
	}
}
$lang = new Language();

if(isset($_REQUEST['selectLanguage']['code']))
{
	$lang->ChangeLanguage($_REQUEST['selectLanguage']['code']);
	unset($_REQUEST['selectLanguage']);
}

$allLanguageList = array
(
 'ab' => 'Abkhazian',
 'aa' => 'Afar',
 'af' => 'Afrikaans',
 'sq' => 'Albanian',
 'am' => 'Amharic',
 'ar' => 'Arabic',
 'hy' => 'Armenian',
 'as' => 'Assamese',
 'ay' => 'Aymara',
 'az' => 'Azerbaijani',
 'ba' => 'Bashkir',
 'eu' => 'Basque',
 'bn' => 'Bengali, Bangla',
 'dz' => 'Bhutani',
 'bh' => 'Bihari',
 'bi' => 'Bislama',
 'br' => 'Breton',
 'bg' => 'Bulgarian',
 'my' => 'Burmese',
 'be' => 'Byelorussian',
 'km' => 'Cambodian',
 'ca' => 'Catalan',
 'zh' => 'Chinese',
 'co' => 'Corsican',
 'hr' => 'Croatian',
 'cs' => 'Czech',
 'da' => 'Danish',
 'nl' => 'Dutch',
 'en' => 'English, American',
 'eo' => 'Esperanto',
 'et' => 'Estonian',
 'fo' => 'Faeroese',
 'fj' => 'Fiji',
 'fi' => 'Finnish',
 'fr' => 'French',
 'fy' => 'Frisian',
 'gd' => 'Gaelic (Scots Gaelic)',
 'gl' => 'Galician',
 'ka' => 'Georgian',
 'de' => 'German',
 'el' => 'Greek',
 'kl' => 'Greenlandic',
 'gn' => 'Guarani',
 'gu' => 'Gujarati',
 'ha' => 'Hausa',
 'iw' => 'Hebrew',
 'hi' => 'Hindi',
 'hu' => 'Hungarian',
 'is' => 'Icelandic',
 'in' => 'Indonesian',
 'ia' => 'Interlingua',
 'ie' => 'Interlingue',
 'ik' => 'Inupiak',
 'ga' => 'Irish',
 'it' => 'Italian',
 'ja' => 'Japanese',
 'jw' => 'Javanese',
 'kn' => 'Kannada',
 'ks' => 'Kashmiri',
 'kk' => 'Kazakh',
 'rw' => 'Kinyarwanda',
 'ky' => 'Kirghiz',
 'rn' => 'Kirundi',
 'ko' => 'Korean',
 'ku' => 'Kurdish',
 'lo' => 'Laothian',
 'la' => 'Latin',
 'lv' => 'Latvian, Lettish',
 'ln' => 'Lingala',
 'lt' => 'Lithuanian',
 'mk' => 'Macedonian',
 'mg' => 'Malagasy',
 'ms' => 'Malay',
 'ml' => 'Malayalam',
 'mt' => 'Maltese',
 'mi' => 'Maori',
 'mr' => 'Marathi',
 'mo' => 'Moldavian',
 'mn' => 'Mongolian',
 'na' => 'Nauru',
 'ne' => 'Nepali',
 'no' => 'Norwegian',
 'oc' => 'Occitan',
 'or' => 'Oriya',
 'om' => 'Oromo, Afan',
 'ps' => 'Pashto, Pushto',
 'fa' => 'Persian',
 'pl' => 'Polish',
 'pt' => 'Portuguese',
 'pa' => 'Punjabi',
 'qu' => 'Quechua',
 'rm' => 'Rhaeto-Romance',
 'ro' => 'Romanian',
 'ru' => 'Russian',
 'sm' => 'Samoan',
 'sg' => 'Sangro',
 'sa' => 'Sanskrit',
 'sr' => 'Serbian',
 'sh' => 'Serbo-Croatian',
 'st' => 'Sesotho',
 'tn' => 'Setswana',
 'sn' => 'Shona',
 'sd' => 'Sindhi',
 'si' => 'Singhalese',
 'ss' => 'Siswati',
 'sk' => 'Slovak',
 'sl' => 'Slovenian',
 'so' => 'Somali',
 'es' => 'Spanish',
 'su' => 'Sudanese',
 'sw' => 'Swahili',
 'sv' => 'Swedish',
 'tl' => 'Tagalog',
 'tg' => 'Tajik',
 'ta' => 'Tamil',
 'tt' => 'Tatar',
 'te' => 'Tegulu',
 'th' => 'Thai',
 'bo' => 'Tibetan',
 'ti' => 'Tigrinya',
 'to' => 'Tonga',
 'ts' => 'Tsonga',
 'tr' => 'Turkish',
 'tk' => 'Turkmen',
 'tw' => 'Twi',
 'uk' => 'Ukrainian',
 'ur' => 'Urdu',
 'uz' => 'Uzbek',
 'vi' => 'Vietnamese',
 'vo' => 'Volapuk',
 'cy' => 'Welsh',
 'wo' => 'Wolof',
 'xh' => 'Xhosa',
 'ji' => 'Yiddish',
 'yo' => 'Yoruba',
 'zu' => 'Zulu',
 );
