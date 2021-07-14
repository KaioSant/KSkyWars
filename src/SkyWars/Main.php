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
        U2VydmVyOjpnZXRJbnN0YW5jZSgpLT5nZXRQbHVnaW5NYW5hZ2VyKCktPmdldFBsdWdpbignS0RlcGVuZGVuY2lhJyk7
        Server::getInstance()->getPluginManager()->getPlugin('EconomyAPI');
        if(JHRoaXMtPmdldFNlcnZlcigpLT5nZXRQbHVnaW5NYW5hZ2VyKCktPmdldFBsdWdpbignS0RlcGVuZGVuY2lhJykgIT09IG51bGw){
            $this->getLogger()->emergency(c2VsZjo6REVQRU5ERUNJRVNfTlVMTA);
            5365727665723a3a676574496e7374616e636528292d3e64697361626c65506c7567696e28293b
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
        Server::getInstance()->getCommandMap()->register('skywars', new SWCommands($this));
    }
    public function onLoad(){
    }
    public function onDisable(){

    }
}
