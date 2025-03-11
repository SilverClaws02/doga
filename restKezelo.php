<?php
class RestKezelo {

    private $httpVersion = "HTTP/1.1";

    public function setHttpFejlec($statusKod): void {

        $statusUzenet = $this -> gethttpStatusUzenet($statusKod);

        header(header: $this->httpVersion. " " . $statusKod . " " . $statusUzenet);
        header(header: "Content-Type: Application/json; charset=utf-8");
    }

    public function gethttpStatusUzenet($statusKod): string{
        $httpStatus = array(
            200 => 'OK', 
            400 => 'Bad Request',
            404 => 'Not Found'
        );
        return $httpStatus[$statusKod];
    }
}
?>
