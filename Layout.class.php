<?php
/** op-unit-layout:/Layout.class.php
 *
 * @creation  2017-05-09
 * @updation  2019-02-23 Separate from NewWorld.
 * @version   1.0
 * @package   op-unit-layout
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
use OP\UNIT_LAYOUT;

/** Layout
 *
 * @created   2017-02-14
 * @updated   2019-11-21  Separate to UNIT_LAYOUT trait.
 * @version   1.0
 * @package   op-unit-layout
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Layout implements IF_UNIT
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_UNIT, UNIT_LAYOUT;
}
