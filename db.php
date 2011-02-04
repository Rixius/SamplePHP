<?php
/**************************
 * /|/ Code by Stephen
 * /|/ "Rixius" Middleton
 *     Liscensed under the MIT Liscense
 *     <http://www.opensource.org/licenses/mit-license.html>
 * 
 * This was more of a skill test, but is potentially usefull
 * Provides a Filesystem JSON-store to store information in a document Fashion
 * See <http://www.json.org> for more information on the JSON format.
 * 
 * Usage::
 * $foo = new Db("path/to/filename");
 * $data = $foo->get();
 * $data['new_key'] = 123123;
 * $foo->set($data)->write();
 */
 
class Db{
  private $fName;
  public $fArr;
  
  public function __construct($fn){
    $this->fName = $fn;
    $this->reload();
  
  }
  public function get(){
    return $this->fArr;
  
  }
  public function set($inp){
    $this->fArr = $inp;
    return $this;
  
  }
  public function reload(){
    $temp = file_get_contents($this->fName);
    $this->fArr = $this->inflate($temp);
    
  }
  public function write(){
    $temp = fopen($this->fName, 'w+');
    fwrite($temp, $this->deflate($this->fArr));
    
  }
  public function ecrypt($inp){
    $oput = array();
    foreach($inp as $a=>$b){
      $oput[ base64_encode($a) ] = (is_array($b))?$this->ecrypt($b):base64_encode($b);
    }
    return $oput;
  }
  private function dcrypt($inp){
    $oput = array();
    $inp = (array)$inp;
    foreach($inp as $a=>$b){
      $oput[ base64_decode($a) ] = (is_array($b))?$this->dcrypt($b):base64_decode($b);
    }
    return $oput;
  }
  private function inflate($inp){
    return $this->dcrypt(json_decode($inp, true));
  }
  private function deflate($inp){
    return json_encode($this->ecrypt($inp));
  }
}
