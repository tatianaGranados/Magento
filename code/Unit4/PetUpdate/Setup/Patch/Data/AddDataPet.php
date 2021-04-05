<?php


namespace Unit4\PetUpdate\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class AddDataPet implements DataPatchInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(\Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup)
    {

        $this->moduleDataSetup = $moduleDataSetup;
    }

    //aqui add el path
    public function apply()
    {
        //desabilita las validaciones de las llaves foraneas (opcional) para que no te moleste mysql
        $this->moduleDataSetup->startSetup();
        //contendra arreglos con los mismos nombres de las tablas
        $petList= [
                    ['pet_name'=>'sisi','pet_type'=>'Cat', 'customer_id'=>1],
                    ['pet_name'=>'nene','pet_type'=>'Dog', 'customer_id'=>1],
                    ['pet_name'=>'nene'],
                    ['pet_name'=>'Dodo', 'customer_id'=>1],
                  ];
        //realizamos la conexion para subir los datos
        $conection = $this->moduleDataSetup->getConnection();
        //obtenemos el nombre de la tabla
        $petTbl= $conection->getTableName('pet');

        //iteramos la lista de mascotas para crearlas
        foreach ($petList as $pet){
            $conection->insertForce($petTbl,$pet);
        }
    }

    public static function getDependencies()
    {
        // TODO: no tiene dependencias este patch por eso es vacio
        return [];
    }

    public function getAliases()
    {
        // TODO: tampoco tiene alias
        return [];
    }


}
