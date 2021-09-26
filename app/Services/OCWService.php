<?php

namespace App\Services;

use App\Models\Saml;
use Illuminate\Support\Facades\Config;

class OCWService {

	public function getSAML($kukiFile) 
	{
		$saml = Saml::first();
	if(!$saml) {
		$url="https://ocw.uns.ac.id/saml/login";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow Reditect
		curl_setopt($ch, CURLOPT_COOKIEJAR, $kukiFile); // Using Cookie
		curl_setopt($ch, CURLOPT_COOKIEFILE, $kukiFile); // Using Cookie
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = "<noscript>".curl_exec($ch)."</noscript>";
		// dd($response);
		// $response = dd("<noscript>".curl_exec($ch)."</noscript>");

		$response = $this->loginSSO($kukiFile, $ch);
		$saml = substr($response, strpos($response, 'SAMLResponse" value="') + 21);
		$saml = explode('" />',$saml)[0];
		Saml::create([
			'saml' => $saml
		]);
		} 

		
		return Saml::first()->saml;
	
	}
	

	public function loginSSO($kukiFile, $ch) 
	{
		$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
		$parseUrl = parse_url($url);
		$authState =str_replace("AuthState=","",$parseUrl['query']);
		// LOGIN SSO
		$post = [
			'username' => Config::get('values.anu'),
			'password' => Config::get('values.anu2'),
			'AuthState'   => urldecode($authState),
		];
		$ch = curl_init('https://sso.uns.ac.id/module.php/core/loginuserpass.php?');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_USERAGENT, "test");
		curl_setopt($ch, CURLOPT_COOKIEJAR, $kukiFile);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $kukiFile); // Using Cookie
		return curl_exec($ch);
	}

	public function setSAML($kukiFile,$SAMLResponse) {
		$post = [
			'SAMLResponse' => $SAMLResponse,
			'RelayState' => 'https://ocw.uns.ac.id/saml/login',
		];
		
		$ch = curl_init('https://ocw.uns.ac.id/saml/acs');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow Reditect
		curl_setopt($ch, CURLOPT_USERAGENT, "test");
		curl_setopt($ch, CURLOPT_COOKIEJAR, $kukiFile);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $kukiFile); // Using Cookie
		$response = curl_exec($ch);
		$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
		curl_close($ch);
	}

	function getDataOCW($kukiFile, $nguerel){
		$ch = curl_init($nguerel);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow Reditect
		curl_setopt($ch, CURLOPT_USERAGENT, "test");
		curl_setopt($ch, CURLOPT_COOKIEJAR, $kukiFile);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $kukiFile); // Using Cookie
		$responsexixixi = curl_exec($ch);
		return $responsexixixi;
		die('akowawkook');
		curl_close($ch);
		
		$myfile = fopen("cache/".base64_encode($nguerel), "a") or die("Unable to open file!");
		fwrite($myfile, $responsexixixi);
		fclose($myfile);
	}
	
	public function checkLink($link) 
	{
		$logged = false;
		while ($logged == false) {
			$path = public_path('/cookie/cookie.txt');
			$ocwService = new OCWService;
			$saml = $ocwService->getSAML($path);
			$ocwService->setSAML($path, Saml::first()->saml);
			$html = $ocwService->getDataOCW($path,$link);
			if(strpos($html,'Masukkan email dan password anda')){
				Saml::first()->delete();
			} else {
				$logged = true;
			}
		}
		
		return $html;
	}
}