<?php
/**
  *name:  YPluginEncryptor
  *author: xMing
  *date:    2017.12.23 13:00 P.M.
**/
namespace YMind\xMing\YPluginEncryptor;
//基本引用
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
//指令引用
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
//配置文件引用
use pocketmine\utils\Config;
//插件内部引用
use YMind\xMing\YPluginEncryptor\Tools\CommandClass;
use YMind\xMing\YPluginEncryptor\Tools\CodeEncryptor;
//主类
class Main extends PluginBase implements Listener{
    public function onEnable(){
     if(!is_dir($this->getDataFolder())){
        $this->getLogger()->Warning('Loading the FIRST time , initialization...');
        @mkdir($this->getDataFolder(),0777,true);
        }
    $this->getLogger()->info('YPluginEncryptor is loading by xMing...');
    }
    public function onDisable(){
           $this->getLogger()->info('YPluginEncryptor turned off');
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
           CommandClass::callCmd($sender,$command,$label,$args,$this);
        }
    }