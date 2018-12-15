<?php
namespace  YMind\xMing\YPluginEncryptor\Tools;
function listdir($dir){
   $pathfiles = array_merge(array_diff(scandir($dir),array('..','.')));
   //var_dump($pathfiles);
   //sleep(1);
   for($i=0;$i<count($pathfiles);$i++)
   {
     $pathfiles[$i]=$dir.'/'.$pathfiles[$i];
   }
   $files = $pathfiles;
   foreach($pathfiles as $index=>$pathfile){
     // var_dump($pathfile);
      
      if(is_dir($pathfile)){
         clearstatcache();
         $pathfiles = array_merge($pathfiles,listdir($pathfile));
      }
   }
   foreach($pathfiles as $index=>$file){
      if(is_dir($file)){
         unset($pathfiles[$index]);
      }
   }
   return array_merge($pathfiles);
}
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
            EncryptWays::run("1",$file);
            }
       }
  private function getPHPfiles($dir){
        $pfs=array();
        foreach(listdir($dir) as $ps){
         if(preg_match('/\.php$/',$ps)){
         array_push($pfs,$ps);
         $this->main->getLogger()->info("Getting file $ps");
          }
        }
      return $pfs;
      }
  public static function EncryptPlugin($dir,$main){
   $self= new CodeEncryptor();
   $self->main=$main;
         if($self->hasYml($dir)){
              $pfs=$self->getPHPfiles($dir);
              //var_dump($pfs);
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
  
