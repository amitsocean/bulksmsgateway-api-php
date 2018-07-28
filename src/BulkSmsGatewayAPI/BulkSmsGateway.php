<?php
/**
 * SMS Api for the bulksmsgateway
 * Author: Mrunal Podjale
 * Date: 28/7/18
 */

namespace BulkSmsGatewayAPI;

class BulkSmsGateway {

    private $username,$password,$message,$sender,$receiver,$url; //Declare private variables


    /**Setting variables**/
    public function setConfig($data){

        if(isset($data['username'],$data['password'],$data['receiver'],$data['message'],$data['sender'])){
            
            $this->username=$data['username'];              // Set username

            $this->password=$data['password'];              // Set Password

            $this->receiver=urlencode($data['receiver']);   //Set Message for the Event

            $this->message=urlencode($data['message']);     //Set Mobile Number of the Message receiver 

            $this->sender=$data['sender'];                  // Set the Sender

        }
    }


    //Send Api
    public function send(){

        $url="http://login.bulksmsgateway.in/sendmessage.php?";

        $url .= "user=".$this->username;

        $url .= "&password=".$this->password;

        $url .= "&mobile=".$this->receiver;

        $url .= "&message=".$this->message;

        $url .= "&sender=".$this->sender."&type=3";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curl_scraped_page = curl_exec($ch);

        curl_close($ch);

        return $curl_scraped_page;

    }
}