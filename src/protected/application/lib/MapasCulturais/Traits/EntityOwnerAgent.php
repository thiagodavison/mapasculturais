<?php
namespace MapasCulturais\Traits;
use MapasCulturais\App;

trait EntityOwnerAgent{
    
    function usesOwnerAgent(){
        return true;
    }
    
    /**
     * Returns the owner of this entity
     * 
     * @return \MapasCulturais\Entities\Agent
     */
    function getOwner(){
        if(!$this->id) return App::i()->user->profile;

        return $this->owner;
    }

    /**
     * Set the owner by providing the agent id
     * 
     * @param int $owner_id the agent id
     * 
     * 
     */
    function setOwnerId($owner_id){
        $owner = App::i()->repo('Agent')->find($owner_id);
        
        $this->setOwner($owner);
    }
    
    /**
     * Set the owner by providing the agent
     * 
     * @param \MapasCulturais\Entities\Agent $owner
     */
    function setOwner(\MapasCulturais\Entities\Agent $owner){
        $this->checkPermission('changeOwner');
        $this->owner = $owner;
    }
    
    /**
     * Verify if the user can change the entity owner
     * 
     * @param type $user
     * 
     * @return boolean
     */
    protected function canUserChangeOwner($user){
        if($user->is('guest'))
            return false;
        
        
        // only admins or the owner of the entity can change the owner
        return ($user->is('admin') || $user->id == $this->getOwnerUser()->id);
    }
}