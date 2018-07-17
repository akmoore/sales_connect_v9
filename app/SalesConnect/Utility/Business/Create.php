<?php

namespace App\SalesConnect\Utility\Business;

use App\Business;
use App\Location;
use App\Contact;

class Create {
    protected $business;
    protected $location;
    protected $contact;

    public function __construct(Business $business, Location $location, Contact $contact){
        $this->business = $business;
        $this->location = $location;
        $this->contact = $contact;
    }

    public function execute($request){
        $business = $this->newBusiness($request);
        $this->newLocation($request, $business);
        $this->newPrimaryClient($request, $business);
        return $business;
    }

    private function newBusiness($request){
        $this->business->create([
            'name' => $request->name,
            'type' => $request->type,
            'url'  => $request->url 
        ]);
    }

    private function newLocation($request, $business){
        if($request->add_location){
            $location = $this->location->create([
                'street' => $request->location['street'],
                'city' => $request->location['city'], 
                'state' => $request->location['state'], 
                'postal_code' => $request->location['postal'], 
                'phone' => '', 
                'fax' => ''
            ]);

            $business->locations()->attach($location);
        }
    }

    private function newPrimaryClient($request, $business){
        if($request->add_primary_contact){
            $contact = $this->contact->create([
                'primary_contact' => true,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'work_phone' => $request->work_phone,
                'cell_phone' => $request->cell_phone
            ]);

            $business->contacts()->attach($contact);
        }
    }
}