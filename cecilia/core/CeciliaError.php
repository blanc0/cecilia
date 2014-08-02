<?php
namespace cecilia\core;
/**
 *
 * The CeciliaError class.
 *
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */
class CeciliaError extends \Exception
{
    public function __construct($message = null, $code = null, $previous = null)
    {
        parent::__construct($message,$code,$previous);
    }
}
