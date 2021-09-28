<?php

namespace App\Http\Controllers\API;

use App\Jobs\CronJob;
use App\Services\OCWService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WhatsappService;

class CronJobController extends Controller
{
    public function runCron() 
	{
		$html = (new OCWService)->checkLink("https://ocw.uns.ac.id/presensi-online-mahasiswa/kuliah-berlangsung");
		preg_match_all(
			'/<div class="panel-body">.*?<p>.*?<b>(.*?)<\/b>.*?<\/p>.*?<small>(.*?)<\/small>.*?<small>(.*?)<\/small>.*?<p>(.*?)<\/p>.*?<\/div>/s',
			$html,
			$data,
			PREG_SET_ORDER // memngubah data menjadi array
		);
		
		$pesan = '';
		foreach ($data as $row) {
			if(strpos($row[4], 'Anda Belum Presensi') !== false) {
				$link = "https://ocw.uns.ac.id". explode('">',substr($row[4], strpos($row[4], 'href="') + 6))[0];
				$link = str_replace('&amp;', '&', $link);
				$pesan .= "
				Matkul : $row[1]
				Waktu : $row[2]
				Dosen : $row[3]
				Link : $link
				=======================
				";
			}
		}

		if($pesan) {
			(new WhatsappService)->sendMessage($pesan);
			echo $pesan;
		}
	}
}
