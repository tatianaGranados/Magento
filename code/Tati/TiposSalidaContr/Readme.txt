Los tipos de salida en los controladores: existen 6:
* type_json: mediante un request que hacemos por medio de un patch, ajax, o solicitud viasualizamos por array
* type-raw: mostrar cadenas de texto plano
* type-redirect: redirecciona a paginas
* type-forward: redirecciona de un controlador a otro
* type_layout and type_page : redireccionan paginas o bloques


para ellos:
1° se crea un constructor
2° que llame a la clase context y el type de salida
ej:  public function __construct(Context $context, JsonFactory $jsonResult)
         {
             parent::__construct($context);
         }
puede ser: todos de frameworl
- JsonFactory
- RawFactory
-RedirectFactory


3° inicializamos sus dependencia del json (click alt + enter)


