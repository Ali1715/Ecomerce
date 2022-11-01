<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            switch ($message):
                case "Promociones":
                    $botman->reply("Promociones disponibles:");
                    break;
                case "Descuentos":
                    $botman->reply("Descuentos disponibles:");
                    break;
                case "Contacto":
                    $botman->reply("Contacta con un asesor.");
                    break;
                default:
                    $botman->reply("Escribe una opcion:" . "<br>" . "Promociones" . "<br>" . "Descuentos" . "<br>" . "Contacto");
            endswitch;
        });

        $botman->listen();
    }
}
