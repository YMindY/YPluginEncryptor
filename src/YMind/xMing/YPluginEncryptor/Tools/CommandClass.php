<?php
namespace YMind\xMing\YPluginEncryptor\Tools;

class CommandClass{
	public static function callCmd($sender,$command,$label,$args,$main){
	    	if($command=="ympe"){
			if(isset($args[0])){
				if(is_dir($main->getDataFolder().$args[0])){
					$ce=CodeEncryptor::EncryptPlugin($main->getDataFolder().$args[0].'/',$main);
					if($ce==="000"){
						$sender->sendMessage("Sourse code of Plugin $args[0] has been encrypted.");
						}else{						
						$sender->sendMessage("Encrypting ERROR!!!");
						switch($ce){
						  case "101":
						     $sender->sendMessage("Unknow ERROR");
						  break;
						  case "202":
	 					     $sender->sendMessage("Folder $args[0] is not a Plugin of PocketMine Server");
                      break;
                     default:
                         $sender->sendMessage("233");
                         //return true;
						  }
						}
						return true;
					}else{
					$sender->sendMessage("Folder $args[0] is not exists in ".$main->getDataFolder());
					 return false;
					}
				}else{
                 $sender->sendMessage("usage: /ympe [FolderName]");
                 return false;
             }
			}
      	}
	}
