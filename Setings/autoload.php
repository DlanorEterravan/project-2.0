<?php    
    function autoload($clase){
        include_once ("Class/" .$clase. ".php");
    }
    spl_autoload_register("autoload");

?>