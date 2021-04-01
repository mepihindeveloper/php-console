<?php

declare(strict_types = 1);

namespace mepihindeveloper\components\interfaces;

/**
 * Interface ConsoleInterface
 *
 * Декларирует методы обязательные для реализации компонента Console
 *
 * @package mepihindeveloper\components\interfaces
 */
interface ConsoleInterface {
	
	/**
	 * Получает (читает) введенную строку
	 *
	 * @return string
	 */
	public static function readLine(): string;
	
	/**
	 * Очищает экран консоли
	 */
	public static function clearScreen(): void;
	
	/**
	 * Записывает строку без переноса
	 *
	 * @param string $text Строка для записи
	 * @param int $color Цвет шрифта
	 */
	public static function write(string $text, int $color = 0): void;
	
	/**
	 * Записывает строку с переносом
	 *
	 * @param string $text Строка для записи
	 * @param int $color Цвет шрифта
	 */
	public static function writeLine(string $text, int $color = 0): void;
}