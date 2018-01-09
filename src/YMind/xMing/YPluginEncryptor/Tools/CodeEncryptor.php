<?php
namespace  YMind\xMing\YPluginEncryptor\Tools;

use YMind\xMing\YPluginEncryptor\Tools\Ways;

class CodeEncryptor{
   private $main;
   private $dirs=array();
   private function hasYml($dir){
   $v=file_exists($dir."plugin.yml") ? true : false;
   return $v;
   }
  private function Run($id,$file){
         switch($id){
            case "1":
            Ways::run("1",$file);
            }
       }
  private function getPHPfiles(){
        $pfs=array();
        foreach($this->dirs as $ds){
         foreach(glob($ds."*.php") as $ps){
         array_push($pfs,$ps);
         $this->main->getLogger()->info("Getting file $ps");
          }
        }
      return $pfs;
      }
   private function saveDirs($url){
    foreach(glob($url."*") as $g){
       if(is_dir($g)){
         $g=$g."/";
       array_push($this->dirs,$g);
      $this->saveDirs($g);
      $this->main->getLogger()->info("Getting folder $g");
             }
            }
           }
  public static function EncryptPlugin($dir,$main){
   $self= new CodeEncryptor();
   $self->main=$main;
         if($self->hasYml($dir)){
              $self->saveDirs($dir);
              $pfs=$self->getPHPfiles();
              foreach($pfs as $s){
                $self->Run("1",$s);
                $self->main->getLogger()->info("Encryptored $s");
              }
            unset($self);
            return "000";   
            }else{
            unset($self);
            return "202";
            }
            unset($this->dirs);
             }
           }
  