<?php


namespace Unit4\PetModel\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    //necesitamos el contex, model, resources models y collection
    /**
     * @var \Unit4\PetModel\Model\ModelPetFactory
     */
    private $petModelFactory;
    /**
     * @var \Unit4\PetModel\Model\ResourceModel\Pet
     */
    private $petResourceModel;
    /**
     * @var \Unit4\PetModel\Model\ResourceModel\Pet\CollectionFactory
     */
    private $petCollection;
    /**
     * @var  PageFactory
     */
    private $resultPageFactory;

    public function __construct(Context $context,
                                \Unit4\PetModel\Model\ModelPetFactory $petModelFactory,
                                \Unit4\PetModel\Model\ResourceModel\Pet $petResourceModel,
                                \Unit4\PetModel\Model\ResourceModel\Pet\CollectionFactory $petCollection,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory )
    {
        parent::__construct($context);
        $this->petModelFactory = $petModelFactory;
        $this->petResourceModel = $petResourceModel;
        $this->petCollection = $petCollection;

        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {

        //var_dump(__METHOD__); die;
        //$this->testCollection();
        //die;
        $resultPageFactory = $this->resultPageFactory->create();
        return $resultPageFactory;

    }

    protected function testCollection()
    {
        /** @var \Unit4\PetModel\Model\ResourceModel\Pet\Collection  $collection */
        $collection =$this->petCollection->create();
        //filtraremos por el tipo de pet -> por dog y el tamaño de resultados
        $collection->addFieldToSelect(['pet_id','pet_name'])
                    ->addFilter('pet_type','Dog')
                    ->setPageSize(2)
                    ->setCurPage(1)
                    ->setOrder('pet_type','desc');
        //obtengo la version del arreglo
        $data=$collection->getData();
        echo "<pre>";
        var_export($data);
        echo "<pre>";
    }

    protected function testModelCRUD()
    {
        /** @var \Unit4\PetModel\Model\ModelPet $petModel */
        $petModel= $this->petModelFactory->create();
        $this->petResourceModel->load($petModel,1);
        $petData =$petModel->getData();
        echo "<pre>";
        var_export($petData);

        /** @var \Unit4\PetModel\Model\ModelPet $newPet */
        $newPet =$this->petModelFactory->create();
        $newPet->setData('pet_name', 'cucu')
                ->setDate('pet_type','Dog')
                ->setData('customer_id',1);

        $this->petResourceModel->save($newPet);
        $newPetData=$newPet->getData();
        var_export($newPetData);
    }

}
