<?php

namespace SkyWars\Commands;

use pocketmine\command\Command as CommandAlias;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use SkyWars\Main;

class SWCommands implements CommandAlias{
    private $mapas = [];
    const NULL_MAPS = '§akSkyWars§7> §aNão possuem mapas ainda.';
    const PERMISSION_NULL = '§aKSkyWars§7> §cvocê não possui permissão para executar este comando!';
    pulic function __construct(Main $own){
        $this->own = $own;
        parent::__construct(Main, $own);
    }
    /**
     * @param Main $own
     */
    public function setOwn($own)
    {
        $this->own = $own;
    }
    public function onCommand(CommandSender $sender, CommandAlias $command, $label, array $args)
    {
        switch (strtolower($command->getName())) {
            case 'skywars':
                if($sender instanceof Player && isset($args[0])) {
                    $message = [
                      '§r',
                      '§aKSkyWars§7>§f digite /skywars help',
                    ];
                    foreach($message as $index) {
                        $sender->sendMessage($index);
                        return false;
                    }
                    switch($args[0]) {
                        case 'help':
                            $help = [
                                '§r'
                                '§aKSkyWars§7> §fLISTA DE COMANDOS',
                                '§a/skywars entrar | sair | lista',
                                '§r',
                            ];
                            $operador = [
                                '§r'
                                '§aKSkyWars§7> §fLISTA DE COMANDOS OPERADORES',
                                '§a/skywars entrar | sair | lista | criar | deletar',
                                '§r',
                            ];
                            foreach($help as $ajuda){
                                $sender->sendMessage($ajuda);
                                return false;
                            }
                            if($sender->isOp()) {
                                foreach($operador as $op) {
                                    $sender->sendMessage($op);
                                    return false;
                                }
                            }
                    }
                    default:
                        case 'lista':
                            if($sender->hasPermission('skywars.lista')){
                                foreach ($mapas as $mapa) {
                                    $sender->sendMessage("§aKSkyWars§7> §eTodos os mapas\n{$mapa}");
                                }
                            }else{
                                $sender->sendMessage(self::PERMISSION_NULL);$sender->sendMessage(self::PERMISSION_NULL);
                            }
                }
        }
    }
}