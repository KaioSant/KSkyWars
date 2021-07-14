<?php

namespace SkyWars;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

use SkyWars\Commands\SWCommands;

class Main extends PluginBase implements Listener{
    const MESSAGE_ENABLED_PLUGIN = '§aKSkyWars§7>§a actived sucefull!';
    const MESSAGE_DISABLE_PLUGIN = '§aKSkyWars§7>§a plugin disabled sucefull!';
    const DEPENDECIES_NULL = '§aKSkyWars§7>§c as dependencias do plugin nao estão em seu servidor! desligando o plugin...';
    const ECONOMYAPI_NULL = '§aKSKyWars§7> §aNão estamos encontrando seu EconomyAPI!';
    const RELOAD_PLUGIN = '§aKSkyWars§7> §eO Plugin esta sendo recarregador.';

    public function onEnable(){
        Server::getInstance()->getPluginManager()->getPlugin('KDependencia');
        Server::getInstance()->getPluginManager()->getPlugin('EconomyAPI');
        if($this->getServer()->getPluginManager()->getPlugin('KDependencia') !== null){
            $this->getLogger()->emergency(self::DEPENDECIES_NULL);
            Server::getInstance()->disablePlugin();
            return false;
        }
        if(Server::getInstance()->getPluginManager()->getPlugin('EconomyAPI')) {
            //aqui ele ta ativo
        }else{
            Server::getInstance()->getLogger()->info(self::ECONOMYAPI_NULL);
            return false;
        }
        @mkdir($this->getDataFolder());
        $this->kits = new Config($this->getDataFolder(), 'kits.yml' . CONFIG::YAML);
        $this->sw->save();
    }
    public function onLoad(){
    }
    public function onDisable(){

    }
}