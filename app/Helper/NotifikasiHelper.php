<?php
/**
 * Created by PhpStorm.
 * User: rahmad
 * Date: 4/20/20
 * Time: 4:40 PM
 */

namespace App\Helper;


class NotifikasiHelper
{
    private $content_message = "Selamat datang";

    private $receivers = array();

    private $tokens = array();


    public function setContent($content = NULL)
    {
        if (!empty($content)) {
            $this->content_message = $content;
        }
        return $this;
    }

    public function addReceiver($receiver = NULL)
    {
        if (!empty($receiver)) {
            $this->receivers[] = $receiver;
            $this->tokens[] = $receiver;
        }
        return $this;
    }

    public function send()
    {
        $receivers          = $this->receivers;
        $receivers_topics   = "";
        foreach ($receivers as $key => $receiver) {
            $receivers_topics .= " '{$receiver}' in topics " . (((sizeof($receivers) - 1) === $key) ? "" : "||");
        }

        $receivers_topics = empty($receivers_topics) ? "'ALL' in topics" : $receivers_topics;
        $content_message  = empty($this->content_message) ? "Selamat datang" : $this->content_message;

        try {
            $this->send_notification($content_message, $receivers_topics);
            return ["error" => FALSE, "message" => "Berhasil mengirim notifikasi"];
        } catch (\Exception $e) {
            return ["error" => TRUE, "message" => $e->getMessage];
        }
    }

    private function send_notification($content, $receivers)
    {
        $access_key = "AAAAb7VDZaE:APA91bEif2kt5DfGPJ5d0-UiyU7iZI6F2RpZLYJRlxeWHc0NJoR0VprJIMpKRfq5vE2ZZ9_Nn8RtXNVsfVy7Qnj8L9bDkYZqzChO7aGY_1vXHwJZbQv4EoOTrWRn6NBa4w8XH9ISyyTl";

        $data_message = array(
            "title"   => "Sipekat Kab. Jember",
            "body"    => $content
        );

        $fields = array(
            "condition" => $receivers, // "'token1' in topics || 'token2' in topics" ~ default: "'ALL' in topics"
            "data"      => $data_message,
        );

        $headers = array(
            'Authorization: key=' . $access_key,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        curl_close($ch);
    }
}