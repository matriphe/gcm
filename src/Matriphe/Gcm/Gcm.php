<?php 
namespace Matriphe\Gcm;

use Config;
use GuzzleHttp\Client;

class Gcm
{
    protected $client;
    
    public function __construct(Client $client, Config $config)
    {
        $this->client = $client;
        $this->config = $config;
    }
    
    public function push($device_id, $gcm_id, $subject = null, $message = null, $extras = [])
    {
        $headers = [ 
			'Authorization' => 'key=' . $this->config->get('gcm.apiKey'),
			'Content-Type' => 'application/json',
		];
		
		$messages = [
		    'subject' => $subject,
			'messages' => $message,
			'device_id' => $device_id,
			'gcm_id' => $gcm_id,
        ];
        
        if (is_array($extras) && !empty($extras)) {
            $messages = array_merge($extras, $messages);
        }
        
        $body = [
            'registration_ids' => $gcm_id,
            'data' => $messages,
        ];
        
        $request = $this->client->post($this->config->get('gcm.url'),
		[
    		'headers' => $headers,
    		'json' => $body,
		]);
		
		$json = $request->getBody();
		$data = json_decode($json);
		
		return $data;
    }
}