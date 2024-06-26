<?php

class UDataAccess 
{
    protected $curl_req = NULL;
    protected $form_data = array('action' => '', 'args' => array('' => ''));

    protected $req_url = 'https://animated-broccoli-g5vqj6qv9wqfwx5p-3001.app.github.dev/admin.php';
    //protected $req_url = 'https://localhost:3001/admin.php';
    
    function __construct ()
    {
        $this->curl_req = curl_init();

        curl_setopt($this->curl_req, CURLOPT_URL, $this->req_url);
        curl_setopt($this->curl_req, CURLOPT_POST, TRUE);
        curl_setopt($this->curl_req, CURLOPT_RETURNTRANSFER, TRUE);
    }

    function __destruct ()
    {
        $this->close();
    }

    function set_action ($value): void
    {
        $this->form_data['action'] = $value;
    }

    function add_param ($key, $value): void
    {
        $this->form_data['args'][$key] = $value;
    }

    function send (): string
    {
        $this->form_data['args'] = json_encode($this->form_data['args']);
        
        curl_setopt($this->curl_req, CURLOPT_POSTFIELDS, http_build_query($this->form_data));
        
        $response = curl_exec($this->curl_req);

        //echo print_r(curl_getinfo($this->curl_req));

        if($response === FALSE)
        {
            echo "Error: ".curl_error($this->curl_req);
        }

        return $response;
    }

    function close (): void
    {
        if(!is_null($this->curl_req))
        {
            curl_close($this->curl_req);
            $this->curl_req = NULL;
        }
    }
}

?>