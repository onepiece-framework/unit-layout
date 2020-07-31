<?php
/**
 * unit-layout:/LAYOUT.trait.php
 *
 * @created   2017-05-09
 * @updated   2019-02-23  Separate from NewWorld.
 * @updated   2019-11-21  Change to trait from class.
 * @version   1.0
 * @package   unit-layout
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2018-04-13   OP\UNIT
 * @updated   2019-11-21   OP
 */
namespace OP;

/** Used class.
 *
 */
use Exception;
use function OP\ConvertPath;

/** UNIT_LAYOUT
 *
 * @created   2017-02-14
 * @updated   2019-11-21  Change to trait from class.
 * @version   1.0
 * @package   unit-layout
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait UNIT_LAYOUT
{
	/**
	 *
	 * @var string
	 */
	private $_content;

	/** Automatically layout.
	 *
	 * @param	 string 	$content
	 * @throws	 Exception
	 */
	function __LAYOUT()
	{
		//	...
		$config = Env::Get('layout');

		//	...
		if( empty($config['execute']) ){
			echo $this->_content;
			return;
		}

		//	...
		if(!file_exists( $path = ConvertPath($config['directory']) ) ){
			throw new Exception("Layout directory has not been exists. ($path)");
		};

		//	...
		if(!file_exists( $path = $path.$config['name'] ) ){
			throw new Exception("Layout has not been exists. ($path)");
		}

		//	...
		if(!file_exists( $path = $path.'/index.php' ) ){
			throw new Exception("Layout controller has not been exists. ($path)");
		};

		//	...
		echo $this->__TEMPLATE($path);
	}

	/** Set/Get layout config.
	 *
	 * <pre>
	 * Boolean : Layout execute flag.
	 * String  : Layout name.
	 * </pre>
	 *
	 * @created  2019-10-11
	 * @param    boolean|string  $value
	 */
	static function __LAYOUT_CONFIG($value=null)
	{
		//	Get
		if( $value === null ){
			//	...
			$config = Env::Get('layout');

			//	...
			if( $config['execute'] ?? null ){
				//	...
				$name = $config['name'];
				$path = ConvertPath($config['directory']).$name;

				//	...
				RootPath('layout', $path);
			}

			//	...
			return empty($config['execute']) ? false: ($config['name'] ?? null);
		}

		//	Set
		switch( $type = gettype($value) ){
			case 'boolean':
				$key = 'execute';
				break;

			case 'string':
				$key = 'name';
				break;

			default:
				throw new \Exception("Has not been support this type. ($type)");
		}

		//	...
		Env::Set('layout', [$key=>$value]);
	}
}
