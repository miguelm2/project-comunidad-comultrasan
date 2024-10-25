<?php

class RestCall
{
    private array $http_params = [];
    private string $endpoint;
    private string $host;
    private string $key;
    private string $user;
    private array $result = [];

    public function __construct() {}

    public function add(string $name, string $value): void
    {
        $this->http_params[$name] = $value;
    }

    public function setEndpoint(string $value): void
    {
        if (!empty($value)) {
            $this->endpoint = $value;
        } else {
            throw new InvalidArgumentException("Endpoint cannot be empty");
        }
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setHost(string $value): void
    {
        if (!empty($value)) {
            $this->host = $value;
        } else {
            throw new InvalidArgumentException("Host cannot be empty");
        }
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setKey(string $value): void
    {
        if (!empty($value)) {
            $this->key = $value;
        } else {
            throw new InvalidArgumentException("Key cannot be empty");
        }
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setUser(string $value): void
    {
        if (!empty($value)) {
            $this->user = $value;
        } else {
            throw new InvalidArgumentException("User cannot be empty");
        }
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function get(string $key): ?string
    {
        return $this->result[$key] ?? null;
    }

    public function run($cedula)
    {
      
        self::setHost("https://fcappshlab.comultrasan.com.co:8080/validador");
        self::setEndpoint("/shareppy/tx_validator.Proxy/executeProxy/923e6b7g-4048-5e8d-b818-8695c27e1ee3");

        self::setKey("8TfxinxvlVTlhs7wgR8CZ/haijQzsZay/4hrnU6uo0UGU43PyZINMH5N9/zG+MiJ8pnhDEpbV1h8ZpDtXUdxzQ==");
        self::setUser('KONDORY_LAB');

        self::add('CEDULA', $cedula);



        $key_bytes = base64_decode($this->key);
        $enc = 'UTF-8';
        $hmac = hash_hmac('sha512', '', $key_bytes, true);

        $qs = http_build_query($this->http_params);

        $ticks = (time() * 1000);

        $request = curl_init($this->host . $this->endpoint);
        if (!$request) {
            throw new RuntimeException("Failed to initialize cURL");
        }

        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_POSTFIELDS, $qs);

        $textToSign = "POST\n" . $this->endpoint . "\nShareppy-Timestamp:$ticks\nUser-Agent:Shareppy Node\nContent-Type:application/x-www-form-urlencoded\n?$qs";

        $sign = base64_encode(hash_hmac('sha512', $textToSign, $key_bytes, true));

        $authSh = $this->user . ":" . $sign;
        curl_setopt($request, CURLOPT_HTTPHEADER, [
            "Shareppy-Timestamp: $ticks",
            "User-Agent: Shareppy Node",
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: HMAC $authSh"
        ]);

        $response = curl_exec($request);
        $text = "RESPONSE API COMULTRASAN " . $response;
        Log::setLog($text);
        if ($response === false) {
            throw new RuntimeException("cURL request failed: " . curl_error($request));
        }

        $http_code = curl_getinfo($request, CURLINFO_HTTP_CODE);

        if ($http_code === 200) {
            $data = json_decode($response, true);
            $texto = "RESPONSE API: " . $response . " ----> API de comultrasan";

            $this->result = $data;
        } else {
            throw new RuntimeException("Error occurred: HTTP Code $http_code");
        }

        curl_close($request);
        return $request;
    }
}
