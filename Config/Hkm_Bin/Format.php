<?php

namespace Hkm_Config\Hkm_Bin;

use Hkm_code\Vezirion\BaseVezirion;
use Hkm_code\Format\FormatterInterface;

class Format extends BaseVezirion
{
	/**
	 * --------------------------------------------------------------------------
	 * Available Response Formats
	 * --------------------------------------------------------------------------
	 *
	 * When you perform content negotiation with the request, these are the
	 * available formats that your application supports. This is currently
	 * only used with the API\ResponseTrait. A valid Formatter must exist
	 * for the specified format.
	 *
	 * These formats are only checked when the data passed to the respond()
	 * method is an array.
	 *
	 * @var string[]
	 */
	public static $supportedResponseFormats = [
		'application/json',
		'application/xml', // machine-readable XML
		'text/xml', // human-readable XML
	];

	/**
	 * --------------------------------------------------------------------------
	 * Formatters
	 * --------------------------------------------------------------------------
	 *
	 * Lists the class to use to format responses with of a particular type.
	 * For each mime type, list the class that should be used. Formatters
	 * can be retrieved through the getFormatter() method.
	 *
	 * @var array<string, string>
	 */
	public static $formatters = [
		'application/json' => 'Hkm_code\Format\JSONFormatter',
		'application/xml'  => 'Hkm_code\Format\XMLFormatter',
		'text/xml'         => 'Hkm_code\Format\XMLFormatter',
	];

	/**
	 * --------------------------------------------------------------------------
	 * Formatters Options
	 * --------------------------------------------------------------------------
	 *
	 * Additional Options to adjust default formatters behaviour.
	 * For each mime type, list the additional options that should be used.
	 *
	 * @var array<string, int>
	 */
	public static $formatterOptions = [
		'application/json' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
		'application/xml'  => 0,
		'text/xml'         => 0,
	];

	//--------------------------------------------------------------------

	/**
	 * A Factory method to return the appropriate formatter for the given mime type.
	 *
	 * @param string $mime
	 *
	 * @return FormatterInterface
	 *
	 * @deprecated This is an alias of `\Hkm_code\Format\Format::getFormatter`. Use that instead.
	 */
	public static function getFormatter(string $mime)
	{
		return ServicesSystem::FORMAT()->getFormatter($mime);
	}
}
