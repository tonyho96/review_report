<?php

namespace App\Services;


use App\Settings;

class SettingService {
	public static function getAllSettings() {
		$settingsDb = Settings::all();
		$settingRes = [];
		foreach ($settingsDb as $settingDb) {
			$settingRes[$settingDb->key] = $settingDb->value;
		}

		return $settingRes;
	}
}