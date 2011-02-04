<?php
/**************************
 * /|/ Code (c) Stephen
 * /|/ "Rixius" Middleton 2010-2011
 *    Licensed under the MIT License
 *    <http://www.opensource.org/licenses/mit-license.html>
 * 
 * Provides Static methods to determine the type on an inputted element.
 * Also exposes functions nessicary to test if [[Type]].
 * 
 * Usage::
 * if ( \rix\Is::_Array($arr) ){...}
 * if ( \rix\is($arr) ){...}
 * $typeof = \rix\is($variable);
 */
namespace rix{
  
  function is($var){
    return Is::_Test($var);
  }
  class Is {
    public static $calls = array(
      "array",   "string",
      "integer", "float",
      "object",  "boolean",
      "null"
    );
    public function _Test($inp){
      foreach (self::$calls as $val){
        $call = "_" . ucfirst($val);
        if (self::$call($inp)){
          return $val;
        }
      }
    }
    public function _Array($inp){
      if (is_object($inp)){
        return false;
      }
      return (bool)((array)$inp === $inp);
    }
    public function _String($inp){
      if (is_object($inp)){
        return false;
      }
      return (bool)((string)$inp === $inp);
    }
    public function _Integer($inp){
      if (is_object($inp)){
        return false;
      }
      return (bool)((int)$inp === $inp);
    }
    public function _Float($inp){
      if (is_object($inp)){
        return false;
      }
      return (bool)((float)$inp === $inp);
    }
    public function _Object($inp){
      return is_object($inp);
    }
    public function _Boolean($inp){
      if (is_object($inp)){
        return false;
      }
      return (bool)((bool)$inp === $inp);
    }
    public function _Null($inp){
      if (is_object($inp)){
        return false;
      }
      return (bool)((unset)$inp === $inp);
    }
  }
}