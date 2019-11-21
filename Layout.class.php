<?php
/**
 * unit-layout:/index.php
 *
 * @creation  2017-05-09
 * @updation  2019-02-23 Separate from NewWorld.
 * @version   1.0
 * @package   unit-layout
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2018-04-13
 */
namespace OP\UNIT;

/** Used class.
 *
 */
use OP\OP_CORE;
use OP\OP_UNIT;
use OP\IF_UNIT;
use OP\Env;
use Exception;
use function OP\ConvertPath;

/** Layout
 *
 * @creation  2017-02-14
 * @version   1.0
 * @package   unit-newworld
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Layout implements IF_UNIT
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_UNIT;

	/** Automatically.
	 *
	 * @param	 string 	$content
	 * @throws	 Exception
	 */
	function Auto(&$content)
	{
		//	...
		$config = Env::Get('layout');

		//	...
		if(!$config['execute'] ){
			echo $content;
			return;
		};

		//	...
		if(!file_exists( $path = ConvertPath($config['directory']) ) ){
			throw new Exception("Layout directory has not been exists. ($path)");
		};

		//	...
		if(!file_exists( $path = $path.$config['name'] ) ){
			throw new Exception("Layout directory has not been exists. ($path)");
		};

		//	...
		if(!file_exists( $path = $path.'/index.php' ) ){
			throw new Exception("Layout controller has not been exists. ($path)");
		};

		//	...
		$this->Unit('App')->Template($path, ['content'=>$content]);
	}
}
