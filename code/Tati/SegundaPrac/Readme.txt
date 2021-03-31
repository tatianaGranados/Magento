plugin after example with user login
use 2 files:
* 1: di.xml  -> create dependece inyection , lo modifica no sobreescribe
                <type name= "ruta metodo a modificar">
                    <plugin name="nombre_que_desee" type="ruta de controlador que modificara el metodo" />
                </type>

* clase controller.php -> modifica el metodo

    public function after[nombreMetodo con la 1° letra mayus] (\ruta del metodo $subject, $result, $var1, var2){
        return $result;
    }
    $var1,2, n-> si es que necesitas llamar alguna var para mostrar.

    ej: public function afterLogin(\Magento\Backend\Model\Auth $subject, $result, $username)
