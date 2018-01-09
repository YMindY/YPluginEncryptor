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
      $this->main->getLogger()->info("sd1");
    foreach(glob($url."*") as $g){
      $this->main->getLogger()->info("sd2");
       if(is_dir($g)){
         $this->main->getLogger()->info("sd3");
         $g=$g."/";
       array_push($this->dirs,$g);
      $this->main->getLogger()->info($g);
      $this->saveDirs($g);
      $this->main->getLogger()->info("Getting folder $g");
             }
            }
           }
  public static function EncryptPlugin($dir,$main){
   $self= new CodeEncryptor();
   $self->main=$main;
         if($self->hasYml($dir)){
            $self->main->getLogger()->info("saved");
              $self->saveDirs($dir);
            $self->main->getLogger()->info("getf");
              $pfs=$self->getPHPfiles();
            $self->main->getLogger()->info("forrun");
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
  