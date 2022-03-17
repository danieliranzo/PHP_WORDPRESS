<?php

class Imagen {
    
    //Esta es la url de la API del wordpress
    private $url = 'http://wordpres.daniel/../v2';
    private $image_path = ''; //Esto creo que es el c:/Xam .../
    
    public function crear() {
        $uploaded_image = upload_image( $$this->image_path.'/f.txt');
        /*
         * Aquí intentaria crea o hacer los pruebas que quieras
         * Puesto que se llama crear y estaría ordenado y fácil de entender incluso para ti
        */
    }
    
    
    /* Casas ques estas haciendo */
    
    public function upload_image( $path ) {
        $username="danielwp";
        $password="wiskyW.11";

        //$request_url = 'http:///wordpress.daniel/wp/v2/media';
        $request_url = 'http://wordpress.daniel/wp-admin/upload.php/';
        $api = curl_init();
        $image = file_get_contents( $path );
        $mime_type = mime_content_type( $path );

        //set the url, POST data
        curl_setopt( $api, CURLOPT_URL, $request_url );
        curl_setopt( $api, CURLOPT_POST, 1 );
        curl_setopt( $api, CURLOPT_POSTFIELDS, $image );
        curl_setopt( $api, CURLOPT_HTTPHEADER, array( 'Content-Type: ' . $mime_type, 'Content-Disposition: attachment; filename="' . basename($path) . '"' ) );
        curl_setopt( $api, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $api, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
        curl_setopt( $api, CURLOPT_USERPWD, $username . ':' . $password );

        //execute post
        $result = curl_exec( $api );

        //close connection
        curl_close( $api );

        return json_decode( $result );
    }

    public function post () {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "");
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        echo $data;
    }
    
}




