<?php
namespace  YMind\xMing\YPluginEncryptor\Tools;

use YMind\xMing\YPluginEncryptor\Tools\Ways\way1;

class CodeEncryptor{
     private function hasYml($dir){
   $v=file_exists($dir."plugin.yml") ? true : false;
   return $v;
   }
  private function Run($id,$file){
         switch($id){
            case "1":
            way1($file);
            }
       }
  private function getPHPfiles(){
        $pfs=array();
        foreach($this->dirs as $ds){
         foreach(glob($ds."*.php") as $ps){
         array_push($pfs,$ps);
          }
        }
      return $pfs;
      }
   private function saveDirs($url){
      $this->dirs=array();
    foreach(glob($url."*") as $g){
       if(is_dir($g)){
       array_push($this->dirs,$g);
      $this->getDirs($g);
             }
            }
           }
  public static function EncryptPlugin($dir){
   $self= new CodeEncryptor();
         if($self->hasYml($dir)){
              $self->saveDirs($dir);
              $pfs=$self->getPHPfiles();
              foreach($pfs as $s){
                $self->Run("1",$s);            
              }
            unset($self);
            return "000";   
            }else{
            unset($self);
            return "202";
            }
             }
           }
  