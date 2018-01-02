<?php
class DataHora {

    /**
     * DataHora constructor.
     */
    public function __construct(){
    }

    //Retorna a hora do servidor NTP.
    public function getDataHora(){
        $socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
        if ($socket) {
            if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0))) {
                stream_set_timeout($socket, 1);
                $unpack0 = unpack("N12", fread($socket, 48));
                fclose($socket);
                return (string) date('d-m-Y H:i:s', $unpack0[7]);
            }

        }
    }
}
?>