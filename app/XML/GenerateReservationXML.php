<?php

namespace App\XML;

use App\Models\Reservation;

class GenerateReservationXML {

    public function __construct() {

        $reservations = Reservation::all();

        if ($reservations != null) {
            $xmlFile = self::createXMLfile($reservations);
            echo "<a href='" . $xmlFile . "'>" . $xmlFile . "</a> has been successfully created";
        }
    }

    function createXMLfile($reservations) {
        $filePath = 'reservation.xml';
        $dom = new \DOMDocument('1.0', 'utf-8');
        $root = $dom->createElement('reservations');

        foreach ($reservations as $reservation) {
            $reserveXML = $dom->createElement('reservation');
            $reserveXML->setAttribute('id', $reservation->id);
            $reserveCheckIn = $dom->createElement('checkInDate', $reservation->checkInDate);
            $reserveXML->appendChild($reserveCheckIn);
            $reserveCheckOut = $dom->createElement('checkOutDate', $reservation->checkOutDate);
            $reserveXML->appendChild($reserveCheckOut);
            
            $reserveNumOfGuests = $dom->createElement('numOfGuests', $reservation->numOfGuests);
            $reserveXML->appendChild($reserveNumOfGuests);
          
            $createdAt = $dom->createElement('created_at', $reservation->created_at);
            $reserveXML->appendChild($createdAt);
            $updatedAt = $dom->createElement('updated_at', $reservation->updated_at);
            $reserveXML->appendChild($updatedAt);
            
            $reserveRoomType = $dom->createElement('roomType', $reservation->roomType);
            $reserveXML->appendChild($reserveRoomType);
             $reserveUser_id = $dom->createElement('user_id', $reservation->user_id);
            $reserveXML->appendChild($reserveUser_id);
             $reservePaymentStatus = $dom->createElement('paymentStatus', $reservation->paymentStatus);
            $reserveXML->appendChild($reservePaymentStatus);
             $reserveTotalMealCost = $dom->createElement('totalMealCost', $reservation->totalMealCost);
            $reserveXML->appendChild($reserveTotalMealCost);
            
            $root->appendChild($reserveXML);
        }

        $dom->appendChild($root);

        if ($dom->save($filePath)) {
            return $filePath;
        } else {
            return false;
        }
    }

}
