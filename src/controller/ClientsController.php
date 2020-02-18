<?php

namespace App\Controller;

class ClientsController extends AbstractController {

    
    public function index() {
        $clients = $this->container->getClientManager()->findAll();

        
        
        echo $this->container->getTwig()->render('/clients/index.html.twig', [
            'clients'      => $clients,
        ]);

    }

    /**
     * Afficher la page de 1 client
     * Route: GET /clients/:id
     */
    public function show(int $id) {
        // 1. Récupérer le car par son id
        $client = $this->container->getClientManager()->findOneById($id);

        //2. Afficher la client
        echo $this->container->getTwig()->render('clients/show.html.twig', [
            'client' => $client
        ]);
    }

    public function neww() {
        echo $this->container->getTwig()->render('clients/form.html.twig');
    }

    public function create() {
        $this->container->getClientManager()->create($_POST);

        header('Location: ' . $this->configuration['env']['base_path'] );
    }
    public function delete(int $id) {
        
        $this->container->getClientManager()->delete($id);
        $this->index();
    }


    public function edit(int $id)
    {

        $client = $this->container->getClientManager()->findOneById($id);

        echo $this->container->getTwig()->render('clients/form.html.twig', ['client' => $client]);
    }


    public function update(int $id)
    {
        $this->container->getclientManager()->update($id, $_POST);
        $this->index();
    }
}