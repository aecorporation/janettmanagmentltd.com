<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_services;

use aeCorp\aec_Core\ServiceCrud;
use aeCorp\aec_src\aec_modules\aec_errors\NotDataConformException;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models\ImagevideopubModel;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_entities\Messagerie;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_events\MessageSendReceiveEvent;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_models\MessagerieModel;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;
use Exception;
use stdClass;

class MessagerieService extends ServiceCrud{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model=$this->container->get(MessagerieModel::class);
        $this->modelImgVdPub = $container->get(ImagevideopubModel::class);
    }

    
    public function createMessage(array $data){

        $validator = Create::factory(Validator::class, [$data]);

        $validator->noEmpty("expediteur_messagerie")
        ->noEmpty("email_messagerie")
        ->noEmpty("contacts_messagerie")
        ->noEmpty("objet_messagerie")
        ->noEmpty("contenu_messagerie")
        ->noEmpty("date_at_messagerie")
        ->noEmpty("compagnie_messagerie")
        ->noEmpty("type_messagerie");

        if(empty($validator->getErrors()))
            throw new NotDataConformException("Renseigner correctement les champs");
        
        $message = Create::factory(Messagerie::class, [$data]);

        $message->setDate_at_messagerie(date("Y-m-d H:i:s"))
        ->setDestinataire_messagerie("ADMIN")
        ->setType_messagerie("contact");

        try{

            $this->model->save($message);

            $data = new stdClass();
            $data->notify = $this->notifyContent(
                "Vous avez recu un nouveau message de :<br/> <b>".$message->getExpediteur_messagerie()."</b>",
                "Messagerie",
                "ADMIN"
            );

            $data->sms = [
                "message"=>
                "<b>Expéditeur :</b> ".$message->getExpediteur_messagerie()."</br>".
                "<b>Email :</b> ".$message->getEmail_messagerie()."</br>".
                "<b>Compagnie :</b> ".$message->getCompagnie_messagerie()."</br>".
                "<b>Contact(s) :</b> ".$message->getContacts_messagerie()."</br>".
                "<b>Message :</b> ".$message->getContenu_messagerie()
    
            ];
            
            $this->eventManager->emit(Create::factory(MessageSendReceiveEvent::class, [$data]));

        }catch(OperationFailException $e){

            throw new OperationFailException("Opération échouée...");
    
        }catch(Exception $e){
    
            throw new Exception($e->getMessage());
    
        }

    

    }


}
