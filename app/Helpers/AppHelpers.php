<?php

namespace App\Helpers;

class AppHelpers{

	public static function urlThreadForum($id, $judul){

		//
		return route('thread.show.detail', [base64_encode(config('app.salt').$id), strtolower(str_replace(' ', '-', $judul))]);
	}
}