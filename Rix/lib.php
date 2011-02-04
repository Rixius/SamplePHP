<?php


namespace rix\lib{
  /**************************
   * Function: dump
   * Params: list of args to inspect
   * Return: HTML String of var_dumped vars in <pre><code>
   */
  function dump(){
    ob_start();
      echo "<pre><code>";
      call_user_func_array(
        'var_dump',
        func_get_args()
      );
      echo "</code></pre><br>";
    $oPut = ob_get_contents();
    ob_end_clean();
    return $oPut;
  }
}