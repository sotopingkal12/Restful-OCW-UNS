<?php

namespace App\Jobs;

use App\Models\Jadwal;
use App\Models\Matkul;
use App\Services\OCWService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CrawlOcw implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	private $matkul;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Matkul $matkul)
    {
		// dd($matkul);
        $this->matkul = $matkul;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $html = (new OCWService)->checkLink($this->matkul->link);
		preg_match_all(
			'/<div class="panel-body">.*?<small>(.*?)<\/small>.*?<p>(.*?)<\/p>.*?<small>(.*?)<\/small>.*?<p style="font-size: 20px; font-weight: 700">.*?<\/p>.*?<p>.*?<\/p>.*?<p>(.*?)<\/p>.*?<a class="btn btn-default" href="(.*?)">.*?<\/a>.*?<\/div>/s',
			$html,
			$data,
			PREG_SET_ORDER // memngubah data menjadi array
		);

		for ($i=0; $i < 1; $i++) { 
			$pertemuan = intval(str_replace("Pertemuan ke-",'',$data[$i][2]));
			if(!Jadwal::where('matkul_id',$this->matkul->id)->where('pertemuan',$pertemuan)->first()) {
				Jadwal::create([
					'matkul_id' => $this->matkul->id,
					'pertemuan' => $pertemuan,
					'tanggal' => $data[$i][1],
					'jam_awal' => explode(' - ',$data[$i][3])[0],
					'jam_akhir' => explode(' - ',$data[$i][3])[1],
					'status' => $data[$i][4],
					'link' => $data[$i][5],
				]);
			}
		}

		return;
    }
}
