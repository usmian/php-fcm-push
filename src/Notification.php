<?php
/**
 * Created by PhpStorm.
 * User: lkaybob
 * Date: 20/03/2018
 * Time: 18:42
 */

namespace phpFCMv1;


class Notification extends Base {

    public function setNotification(string $title, string $message, ?array $data = null, string $image = '') {
        $this->validateCurrent($title, $message);

        $payload = [
            'notification' => [
                'title' => $title,
                'body' => $message,
                'image' => $image,
            ],
            'android' => [
                'notification' => [
                    'sound' => 'default',
                    'notification_count' => 1,
                ]
            ],
            'apns' => [
                'payload' =>[
                    'aps' => [
                        'sound' => 'default',
                        'badge' => 1
                    ]
                ]
            ]
        ];

        if (is_array($data) && count($data)>0){
            $payload['data'] = $data; 
       }
           
        $this->setPayload($payload);
    }

    /**
     * @return array
     * @throws \UnderflowException
     */
    public function __invoke() {
        return parent ::__invoke();
    }
}
