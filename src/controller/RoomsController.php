<?php

namespace App\Controller;

class RoomsController extends AbstractController {

    
    public function index() {
        $rooms = $this->container->getRoomManager()->findAll();

        
        echo $this->container->getTwig()->render('/rooms/index.html.twig', [
            'rooms'      => $rooms,
        ]);

    }

    /**
     * Afficher la page de 1 room
     * Route: GET /rooms/:id
     */
    public function show(int $id) {
        // 1. Récupérer le car par son id
        $room = $this->container->getRoomManager()->findOneById($id);

        //2. Afficher la room
        echo $this->container->getTwig()->render('rooms/show.html.twig', [
            'room' => $room
        ]);
        
    }

    public function neww() {
        echo $this->container->getTwig()->render('rooms/form.html.twig');
    }

    public function create() {
        $this->container->getRoomManager()->create($_POST);

        header('Location: ' . $this->configuration['env']['base_path'] );
    }

        public function edit(int $id)
    {

        $room = $this->container->getRoomManager()->findOneById($id);

        echo $this->container->getTwig()->render('rooms/form.html.twig', ['room' => $room]);
    }


    public function update(int $id)
    {
        $this->container->getRoomManager()->update($id, $_POST);
        $this->index();
    }
}