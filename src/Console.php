<?php

declare(strict_types = 1);

namespace mepihindeveloper\components;

use mepihindeveloper\components\interfaces\ConsoleInterface;

/**
 * Класс Console
 *
 * Класс реализует считываем и записью в консоль
 *
 * @package mepihindeveloper\components
 */
class Console implements ConsoleInterface {
	
	/**
	 * Константы для определения цвета текста
	 */
	public const FG_WHITE = 0;
	public const FG_RED = 31;
	public const FG_GREEN = 32;
	/**
	 * Константы для определения толщины шрифта
	 */
	public const FONT_NORMAL = 0;
	public const FONT_BOLD = 1;
	
	/**
	 * @inheritDoc
	 */
	public static function clearScreen(): void {
		echo "\033[2J";
	}
	
	/**
	 * @inheritDoc
	 */
	public static function writeLine(string $text, int $color = 0): void {
		static::write($text . PHP_EOL, $color);
	}
	
	/**
	 * @inheritDoc
	 */
	public static function write(string $text, int $color = 0): void {
		fwrite(STDOUT, "\033[0;{$color}m{$text}\033[0m");
	}
	
	/**
	 * Выводит сообщение о подтверждении действия
	 *
	 * @param string $text Сообщение вопроса
	 * @param bool $default Значение по умолчанию
	 *
	 * @return bool
	 */
	public static function confirm(string $text, bool $default = false): bool {
		while (true) {
			static::write($text . ' (y|n) [' . ($default ? 'y' : 'n') . ']: ');
			$input = strtolower(trim(static::readLine()));
			
			if (empty($input)) {
				return $default;
			}
			
			if (!strcasecmp($input, 'y')) {
				return true;
			}
			
			if (!strcasecmp($input, 'n')) {
				return false;
			}
		}
	}
	
	/**
	 * @inheritDoc
	 */
	public static function readLine(): string {
		return rtrim(fgets(STDIN), PHP_EOL);
	}
}