<?php

namespace App\Http\Controllers\API;

use App\Models\Saml;
use App\Jobs\CrawlOcw;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Services\OCWService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class PresensiController extends Controller
{
	
	public function getPresensiBerlangsung() 
	{
		$pesan = "";
		$this->getPresensiBerkala();
		$nowDate = date("Y-m-d");
		$nowTime = date("H:i:s");
		$jadwal = Jadwal::with('matkul')->where([
			['tanggal', DB::raw("'$nowDate'")],
			['jam_awal','<',DB::raw("'$nowTime'")],
			['jam_akhir','>',DB::raw("'$nowTime'")]
			])->get();

		foreach ($jadwal as $perJadwal) {
			if($perJadwal->is_send != 1 || $perJadwal->is_send == NULL) {
				$pesan .= "
					matkul : {$perJadwal->matkul->nama}
					pertemuan : $perJadwal->pertemuan
					tanggal : $perJadwal->tanggal
					waktu : $perJadwal->jam_awal - $perJadwal->jam_akhir
					$perJadwal->status
					=======================
				";
				$perJadwal->is_send = 1;
				$perJadwal->save();
			}
		}

		if($pesan != '') {
			return Redirect::to("https://api.callmebot.com/whatsapp.php?phone=+6281239466830&text=". urlencode($pesan) ."&apikey=323471");
		}
		// return response()->json($jadwal);
	}

	public function getPresensiBerkala() 
	{
		$matkul = Matkul::get();

		foreach ($matkul as $perMatkul) {
			$this->cekPresensiMatkul($perMatkul);
		}
	}

	public function getPresensiMatkul($codename) 
	{
		$matkul = Matkul::where('codename',$codename)->first();
		if($matkul) {
			dispatch(new CrawlOcw($matkul));
			return response()->json(Jadwal::where('matkul_id', $matkul->id)->get());
		}
	}

    public function cekPresensiMatkul(Matkul $matkul) 
	{
		dispatch(new CrawlOcw($matkul))
			->onConnection('database')
			->onQueue('default');
	}
}
