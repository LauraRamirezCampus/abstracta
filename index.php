

<?php
/** 
 Desafío: Crea una clase abstracta llamada CuentaBancaria con los siguientes atributos y métodos:

 Atributos:
 
 $saldo: representa el saldo disponible en la cuenta.
 Métodos:
 
 depositar($monto): recibe un monto y lo agrega al saldo de la cuenta.
retirar($monto): recibe un monto y lo resta del saldo de la cuenta. Asegúrate de validar que el saldo sea suficiente antes de realizar el retiro.
Luego, crea dos clases hijas, CuentaCorriente y CuentaAhorros, que extiendan la clase CuentaBancaria. Cada clase hija debe implementar su propia lógica para los métodos depositar() y retirar().

La clase CuentaCorriente debe permitir retiros incluso si el saldo es insuficiente, pero aplicando un cargo por sobregiro del 10% del monto retirado.

La clase CuentaAhorros debe permitir retiros solo si el saldo es suficiente y no aplicar ningún cargo adicional.*/

abstract class CuentaBancaria{
    public function __construct(protected int $saldo){
        $this->saldo=$saldo;
    }

    public function retirar($monto){

    }
    public function depositar($monto) {

    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function setSaldo($saldo){
        $this->saldo = $saldo;

    }
    
}
class CuentaCorriente extends CuentaBancaria{
    public function retirar($monto){
        return $this->saldo-=$monto+($monto*0.10);
    }
    public function depositar($monto){
        return $this->saldo+=$monto;
    }

}
class CuentaAhorros extends CuentaBancaria{

    public function __construct(protected int $saldo){

        parent::__construct($saldo);
    }

    public function retirar($monto){
        return $this->saldo-=$monto;
    }
    public function depositar($monto){
        return $this->saldo+=$monto;
    }

}


$cuenta = new CuentaCorriente(100);
echo "el total es:" .$cuenta->retirar(500);

?>