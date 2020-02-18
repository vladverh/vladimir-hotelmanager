<?php
namespace App\Service;

use Bramus\Router\Router;
use PDO;
use Twig\Environment;
use Twig\Error\Error;
use Twig\Loader\FilesystemLoader;

class ServiceContainer {

    private $configuration;
    private $router;
    private $pdo;
    private $roomManager;
    private $userManager;
    private $locationManager;
    private $twig;

    public function __construct(array $configuration) {
        $this->configuration = $configuration;
    }

    public function getRouter() {
        if ($this->router === null) {
            $this->router = new Router;
        }

        return $this->router;
    }

    public function getPdo() {
        if ($this->pdo === null)
        {
            $this->pdo = new PDO(
                    $this->configuration['db']['dsn'],
                    $this->configuration['db']['username'],
                    $this->configuration['db']['password'],
                );
        }
        return $this->pdo;
    }

    public function getRoomManager() {
        if ($this->roomManager === null)
        {
            $this->roomManager = new RoomManager($this->getPdo());
        }

        return $this->roomManager;
    }

    public function getTwig() {

        if ($this->twig === null) {
            try {

                $loader = new FilesystemLoader(__DIR__ . '/../../template');
                $twig = new Environment($loader);
                $twig->addGlobal('env', $this->configuration['env']);

                $this->twig = $twig;
            }
            catch(Error $e) {
                dd($e);
            }
        }
        return $this->twig;

    }
}