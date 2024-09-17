<?php

namespace App\Services;

class Config
{
	protected static $data = [];

	public static function load($file)
	{
		if (!file_exists($file)) {
			throw new \Exception('Config file not found: ' . $file);
		}

		$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($lines as $line) {
			if (strpos(trim($line), '#') === 0) {
				continue;
			}

			list($key, $value) = explode('=', $line, 2);
			self::$data[trim($key)] = trim($value);
		}
	}

	public static function get($key, $default = null)
	{
		return self::$data[$key] ?? $default;
	}
}