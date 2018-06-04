<?php 


class dataBase {
    
    const CONNECT_TIMEOUT = 5; //in seconds
    
    /**
     * Variável caminho BD
     * 
     * @var string
     */
    private $dsn;
    
    /**
     * Username BD
     * 
     * @var string
     */
    private $username;
    
    /**
     * password BD
     * 
     * @var string
     */
    private $password;
    
    /**
     *lIGAÇºAO bd
     * 
     * @var object
     */
    private $connection;
    
    /**
     * @var array
     */
    private $pdoOptions
        
    
    
    /**
     * Construtor da Classe
     * 
     * @param string $dsn Host da ligação
     * @param string $username Username da Bd
     * @param string $password Password da Bd
     * 
     * @return void
     */
    public function __construct($dsn,  $username, $password) {
        
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        
        $this->pdoOptions = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_TIMEOUT => self::CONNECT_TIMEOUT
        ];
        
        $this->makeConnection();
    }
    
    /**
     * Criar ligação
     * 
     * @return object
     */
    protected function makeConnection(){
        
        $this->connection = new PDO($this->dsn, $this->username, $this->password, $this->pdoOptions);
        
        
        return $this->connection;
    }

    /**
     * verifica a ligação à bd
     * 
     * @return boolean
     */
    public function isConnected(){
        
        return (boolean) $this->connection;
        
    }
    
}