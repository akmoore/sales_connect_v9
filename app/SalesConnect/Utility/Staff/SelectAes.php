<?php

namespace App\SalesConnect\Utility\Staff;

class SelectAes {

    public function execute($user){
        $roles = $user->myRoles();
        return $this->fetchAes($roles, $user);
    }

    private function fetchAes($roles, $user){
        if($this->determineAe($roles)) return $this->determineAe($roles);
        return $this->notAe($roles, $user);
    }

    private function determineAe($roles){
        if(is_string($roles)){
            if($roles === 'ae') return [];
        }

        return [];
    }

    private function determineLSM($roles, $user){
        $array = ['lsm'];
        if(
            is_string($roles) && collect($array)->contains($roles) ||
            collect($array)->intersect($roles)->count() > 0
        ){
            return $user->aes()->get();          
        }
    }

    private function determineOtherAccess($roles){
        $array = ['admin', 'csm', 'gsm', 'csp'];
        if(
            is_string($roles) && collect($array)->contains($roles) ||
            collect($array)->intersect($roles)->count() > 0
        ){
            return \App\User::get()->filter(function($value){
                return $value->roles()->get()->contains('name', 'ae');
            })->flatten()->all();
        }
    }

    private function notAe($roles, $user){
        if($this->determineLSM($roles, $user)) return $this->determineLSM($roles, $user);
        if($this->determineOtherAccess($roles)) return $this->determineOtherAccess($roles);
        return [];
    }
}