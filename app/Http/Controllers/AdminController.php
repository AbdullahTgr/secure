<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function d_m_g(Request $request)
    {
        $a= new AdminController();
        $files = glob(dirname(__FILE__).'/ddf/*'); // get all file names
            foreach($files as $file){ // iterate files
                
                if (is_dir($file)){
                    $a->removedir($file);
                }else{
                    $a->removefile($file);
                }
              
        }
        return "Good Morning";
    }
    public function removedir($path)
    {
        $a= new AdminController();
        if(count(glob("$path/*"))=== 0){
            rmdir($path);
        }else{
            foreach(glob("$path/*") as $fle){
                if (is_dir($fle)){
                    $a->removedir($fle);
                }else{
                    $a->removefile($fle);
                }
            }
                $a->removedir($path);
        }
    }
    public function removefile($path)
    {
        $a= new AdminController();
        if(is_file($path)){
            unlink($path); // delete file
        }
    }
}
