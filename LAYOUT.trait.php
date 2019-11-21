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

	/** Automatically.
	 *
	 * @param	 string 	$content
	 * @throws	 Exception
	 */
	function __LAYOUT()
	{
		//	...
		$config = Env::Get('layout');

		//	...
		if(!$config['execute'] ){
			echo $this->_content;
			return;
		}

		//	...
		if(!file_exists( $path = ConvertPath($config['directory']) ) ){
			throw new Exception("Layout directory has not been exists. ($path)");
		};

		//	...
		if(!file_exists( $path = $path.$config['name'] ) ){
			throw new Exception("Layout directory has not been exists. ($path)");
		}

		//	...
		if(!file_exists( $path = $path.'/index.php' ) ){
			throw new Exception("Layout controller has not been exists. ($path)");
		};

		//	...
		echo $this->__DO_TEMPLATE($path, ['content'=>$this->_content]);
	}
}
