<?php
/**
 * Created by PhpStorm.
 * User: lkaybob
 * Date: 20/03/2018
 * Time: 18:42
 */

namespace phpFCMv1;


class Notification extends Base {

    public function setNotification($title, $message, $data = null) {
        $this -> validateCurrent($title, $message);

        $payload = array(
            'notification' => array(
                'title' => $title,
                'body' => $message
            ),
            'android' => array(
                'notification' => array(
                    'sound' => 'default',
                    'notification_count' => 1,
                )
            ),
            'apns' => array(
                'payload' => array(
                    'aps' => array(
                        'sound' => 'default',
                        'badge' => 1
                    )
                )
            )
        );

        if (is_array($data) && count($data)>0){
            $payload['data'] = $data; 
       }
           
        $this -> setPayload($payload);     
    }

    /**
     * @return array
     * @throws \UnderflowException
     */
    public function __invoke() {
        return parent ::__invoke();
    }
}
