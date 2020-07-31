<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

require ('../Model/Usuario.php');
require ('../Model/Mensaje.php');


class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        echo "Server inicio correcto";
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        //
        $data = json_decode($msg, true);
        $objMensaje = new \Mensaje;
        $objMensaje->setUsuario_id($data['usuarioId']);
        $objMensaje->setSala_id($data['canalId']);
        $objMensaje->setMensaje($data['msg']);
        $objMensaje->setFecha(date('d-m-Y h:m'));
        if ($objMensaje->guardarmensaje()) {
            $objUsuario = new \Usuario;
        
            $objUsuario->setId($data['usuarioId']);
            $usuario = $objUsuario->userXid();

            $data['from']= $usuario['nom_ape'];
            $data['msg'] = $data['msg'];
            $data['fecha'] = date('d/m/Y h:i:s A');    
        }
        
        


        //

        foreach ($this->clients as $client) {
            if ($from == $client) {
                $data['from'] = 'Yo';
            }else{
                $data['from'] = $usuario['nom_ape'];
            }
            $client->send(json_encode($data));
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}