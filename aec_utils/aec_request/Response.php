<?php

namespace aeCorp\aec_utils\aec_request;

/**
 * Response envoyée au client.
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9 Decembre  2019.
 * @global
 */
class Response implements ResponseInterface{

    private static ?int $status = null;
    private ?string $path = null;
    private ?array $message = null;

    /**
     * @var		mixed	$resquest
     */
    private $resquest;

    private static $phrases = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Switch Proxy',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Large',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        451 => 'Unavailable For Legal Reasons',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        511 => 'Network Authentication Required',
    ];


    /**
     * Envoyer au navigateur.
     *
     * @access	public
     * @return	void
     */
    public static function send(?int $status=null, ?string $path) : void{
        self::status($status);
        echo $path;
    }

    public static function sendJson(?int $status = null, ?array $path): void
    {
        self::status($status);
        echo \json_encode($path);
    }


    /**
     * status de redirection.
     *
     * @access	public
     * @param	int	$taus	
     * @return	void
     */
    public static function status(?int $status): ResponseInterface
    {
        $protocol= "HTTP/1.1";
        self::$status=$status;
        header($protocol. $status. self::$phrases[$status]);
        $class= new self();
        
        return clone($class);
    }


    /**
     * Rediriger le client vers une url.
     *
     * @access	public
     * @param	string	$path	
     * @return	void
     */
     public static function redirect(string $path): void{
         header("location:".$path);
     }
        
}