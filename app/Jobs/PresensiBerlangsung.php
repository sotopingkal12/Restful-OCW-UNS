<?php

namespace App\Jobs;

use App\Services\OCWService;
use Illuminate\Bus\Queueable;
use App\Services\WhatsappService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class PresensiBerlangsung implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
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
        
        
        echo $pesan;
		if($pesan) {
			(new WhatsappService)->sendMessage($pesan);
		}
    }
}
